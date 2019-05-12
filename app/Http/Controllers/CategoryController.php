<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Service;
use App\Models\Category;


class CategoryController extends AppBaseController
{
    /** @var  CategoryRepository */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the Category.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->categoryRepository->pushCriteria(new RequestCriteria($request));
        $input = $request->all();

        if(isset($input['status'])){
            $categories = Category::where('status',$input['status'] )->paginate(20);

            if($input['status']){$statusParam='Enabled';}else{$statusParam='Disabled';}
            $searchParam="";
        }elseif(isset($input['search'])){
            $categories = Category::where('name', 'like' , '%'.$input['search'].'%' )->paginate(20);

            $statusParam='ALL';
            $searchParam=$input['search'];

        }else{
            $categories = Category::paginate(20);
            
            $statusParam='ALL';
            $searchParam="";
        }

        return view('categories.index',compact('statusParam','searchParam'))
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response
     */
    public function create()
    {
        $services = Service::where('status',1)->pluck('name', 'id');
        $services->prepend('Service', null);

        $sources=array(''=>'Select Source','RSS'=>'RSS','Crawling'=>'Crawling','API'=>'API');

        return view('categories.create',compact('services','sources'));
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param CreateCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all();

        
        if($input['status']='on'){$input['status']=1;}else{$input['status']=0;}

        $category = $this->categoryRepository->create($input);

        Flash::success('Category saved successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }
        $services = Service::where('status',1)->pluck('name', 'id');
        $services->prepend('Service', null);

        $sources=array(''=>'Select Source','RSS'=>'RSS','Crawling'=>'Crawling','API'=>'API');

        return view('categories.edit',compact('services','sources'))->with('category', $category);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param  int              $id
     * @param UpdateCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }
        $input=$request->all();

        if($input['status']='on'){$input['status']=1;}else{$input['status']=0;}

        $category = $this->categoryRepository->update($input, $id);

        Flash::success('Category updated successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function delete($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $this->categoryRepository->delete($id);

        Flash::success('Category deleted successfully.');

        return redirect(route('categories.index'));
    }
}
