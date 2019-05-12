<?php

namespace App;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class ItemIndexConfigurator extends IndexConfigurator
{
    use Migratable;

    /**
     * @var array
     */
    protected $settings = [
        'analysis' => [
            'analyzer' => [
                'en_std' => [
                    'type' => 'standard',
                    'stopwords' => '_english_'
                ]
            ]    
        ]
    ];
}