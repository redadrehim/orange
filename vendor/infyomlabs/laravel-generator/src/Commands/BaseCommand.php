<?php

namespace Layer\Base\Commands;

use Illuminate\Console\Command;
use Layer\Base\Common\CommandData;
use Layer\Base\Generators\API\APIControllerGenerator;
use Layer\Base\Generators\API\APIRequestGenerator;
use Layer\Base\Generators\API\APIRoutesGenerator;
use Layer\Base\Generators\API\APITestGenerator;
use Layer\Base\Generators\MigrationGenerator;
use Layer\Base\Generators\ModelGenerator;
use Layer\Base\Generators\RepositoryGenerator;
use Layer\Base\Generators\RepositoryTestGenerator;
use Layer\Base\Generators\Scaffold\ControllerGenerator;
use Layer\Base\Generators\Scaffold\MenuGenerator;
use Layer\Base\Generators\Scaffold\RequestGenerator;
use Layer\Base\Generators\Scaffold\RoutesGenerator;
use Layer\Base\Generators\Scaffold\ViewGenerator;
use Layer\Base\Generators\TestTraitGenerator;
use Layer\Base\Utils\FileUtil;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class BaseCommand extends Command
{
    /**
     * The command Data.
     *
     * @var CommandData
     */
    public $commandData;

    /**
     * @var Composer
     */
    public $composer;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->composer = app()['composer'];
    }

    public function handle()
    {
        $this->commandData->modelName = $this->argument('model');

        $this->commandData->initCommandData();
        $this->commandData->getFields();
    }

    public function generateCommonItems()
    {
        if (!$this->commandData->getOption('fromTable') and !$this->isSkip('migration')) {
            $migrationGenerator = new MigrationGenerator($this->commandData);
            $migrationGenerator->generate();
        }

        if (!$this->isSkip('model')) {
            $modelGenerator = new ModelGenerator($this->commandData);
            $modelGenerator->generate();
        }

        if (!$this->isSkip('repository')) {
            $repositoryGenerator = new RepositoryGenerator($this->commandData);
            $repositoryGenerator->generate();
        }
    }

    public function generateAPIItems()
    {
        if (!$this->isSkip('requests') and !$this->isSkip('api_requests')) {
            $requestGenerator = new APIRequestGenerator($this->commandData);
            $requestGenerator->generate();
        }

        if (!$this->isSkip('controllers') and !$this->isSkip('api_controller')) {
            $controllerGenerator = new APIControllerGenerator($this->commandData);
            $controllerGenerator->generate();
        }

        if (!$this->isSkip('routes') and !$this->isSkip('api_routes')) {
            $routesGenerator = new APIRoutesGenerator($this->commandData);
            $routesGenerator->generate();
        }

        if (!$this->isSkip('tests') and $this->commandData->getAddOn('tests')) {
            $repositoryTestGenerator = new RepositoryTestGenerator($this->commandData);
            $repositoryTestGenerator->generate();

            $testTraitGenerator = new TestTraitGenerator($this->commandData);
            $testTraitGenerator->generate();

            $apiTestGenerator = new APITestGenerator($this->commandData);
            $apiTestGenerator->generate();
        }
    }

    public function generateScaffoldItems()
    {
        if (!$this->isSkip('requests') and !$this->isSkip('scaffold_requests')) {
            $requestGenerator = new RequestGenerator($this->commandData);
            $requestGenerator->generate();
        }

        if (!$this->isSkip('controllers') and !$this->isSkip('scaffold_controller')) {
            $controllerGenerator = new ControllerGenerator($this->commandData);
            $controllerGenerator->generate();
        }

        if (!$this->isSkip('views')) {
            $viewGenerator = new ViewGenerator($this->commandData);
            $viewGenerator->generate();
        }

        if (!$this->isSkip('routes') and !$this->isSkip('scaffold_routes')) {
            $routeGenerator = new RoutesGenerator($this->commandData);
            $routeGenerator->generate();
        }

        if (!$this->isSkip('menu') and $this->commandData->config->getAddOn('menu.enabled')) {
            $menuGenerator = new MenuGenerator($this->commandData);
            $menuGenerator->generate();
        }
    }

    public function performPostActions($runMigration = false)
    {
        if ($this->commandData->getOption('save')) {
            $this->saveSchemaFile();
        }

        if ($runMigration) {
            if ($this->commandData->getOption('forceMigrate')) {
                $this->call('migrate');
            } elseif (!$this->commandData->getOption('fromTable') and !$this->isSkip('migration')) {
                if ($this->commandData->getOption('jsonFromGUI')) {
                    $this->call('migrate');
                } elseif ($this->confirm("\nDo you want to migrate database? [y|N]", false)) {
                    $this->call('migrate');
                }
            }
        }
        if (!$this->isSkip('dump-autoload')) {
            $this->info('Generating autoload files');
            $this->composer->dumpOptimized();
        }
    }

    public function isSkip($skip)
    {
        if ($this->commandData->getOption('skip')) {
            return in_array($skip, (array) $this->commandData->getOption('skip'));
        }

        return false;
    }

    public function performPostActionsWithMigration()
    {
        $this->performPostActions(true);
    }

    private function saveSchemaFile()
    {
        $fileFields = [];

        foreach ($this->commandData->fields as $field) {
            $fileFields[] = [
                'name'        => $field->name,
                'dbType'      => $field->dbInput,
                'htmlType'    => $field->htmlInput,
                'validations' => $field->validations,
                'searchable'  => $field->isSearchable,
                'fillable'    => $field->isFillable,
                'primary'     => $field->isPrimary,
                'inForm'      => $field->inForm,
                'inIndex'     => $field->inIndex,
            ];
        }

        foreach ($this->commandData->relations as $relation) {
            $fileFields[] = [
                'type'     => 'relation',
                'relation' => $relation->type.','.implode(',', $relation->inputs),
            ];
        }

        $path = config('infyom.laravel_generator.path.schema_files', base_path('resources/model_schemas/'));

        $fileName = $this->commandData->modelName.'.json';

        if (file_exists($path.$fileName) && !$this->confirmOverwrite($fileName)) {
            return;
        }
        FileUtil::createFile($path, $fileName, json_encode($fileFields, JSON_PRETTY_PRINT));
        $this->commandData->commandComment("\nSchema File saved: ");
        $this->commandData->commandInfo($fileName);
    }

    /**
     * @param $fileName
     * @param string $prompt
     *
     * @return bool
     */
    protected function confirmOverwrite($fileName, $prompt = '')
    {
        $prompt = (empty($prompt))
            ? $fileName.' already exists. Do you want to overwrite it? [y|N]'
            : $prompt;

        return $this->confirm($prompt, false);
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    public function getOptions()
    {
        return [
            ['fieldsFile', null, InputOption::VALUE_REQUIRED, 'Fields input as json file'],
            ['jsonFromGUI', null, InputOption::VALUE_REQUIRED, 'Direct Json string while using GUI interface'],
            ['plural', null, InputOption::VALUE_REQUIRED, 'Plural Model name'],
            ['tableName', null, InputOption::VALUE_REQUIRED, 'Table Name'],
            ['fromTable', null, InputOption::VALUE_NONE, 'Generate from existing table'],
            ['ignoreFields', null, InputOption::VALUE_REQUIRED, 'Ignore fields while generating from table'],
            ['save', null, InputOption::VALUE_NONE, 'Save model schema to file'],
            ['primary', null, InputOption::VALUE_REQUIRED, 'Custom primary key'],
            ['prefix', null, InputOption::VALUE_REQUIRED, 'Prefix for all files'],
            ['paginate', null, InputOption::VALUE_REQUIRED, 'Pagination for index.blade.php'],
            ['skip', null, InputOption::VALUE_REQUIRED, 'Skip Specific Items to Generate (migration,model,controllers,api_controller,scaffold_controller,repository,requests,api_requests,scaffold_requests,routes,api_routes,scaffold_routes,views,tests,menu,dump-autoload)'],
            ['datatables', null, InputOption::VALUE_REQUIRED, 'Override datatables settings'],
            ['views', null, InputOption::VALUE_REQUIRED, 'Specify only the views you want generated: index,create,edit,show'],
            ['relations', null, InputOption::VALUE_NONE, 'Specify if you want to pass relationships for fields'],
            ['softDelete', null, InputOption::VALUE_NONE, 'Soft Delete Option'],
            ['forceMigrate', null, InputOption::VALUE_NONE, 'Specify if you want to run migration or not'],
        ];
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['model', InputArgument::REQUIRED, 'Singular Model name'],
        ];
    }
}
