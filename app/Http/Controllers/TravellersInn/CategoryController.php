<?php

namespace App\Http\Controllers\TravellersInn;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\Contracts\ICategoryRepo;
use App\Utils\Globals\AppGlobal;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    private $_categoryRepo;

    public function __construct(ICategoryRepo $_categoryRepo)
    {
        $this->_categoryRepo = $_categoryRepo;
    }

    /**
     * Display a listing of the role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('travellers-inn.admin.category.index');
    }

    /**
     * Show the form for creating a new role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contents = $this->_categoryRepo->fetchCategoryWithAllChildByTitle(['title' => AppGlobal::CONTENT_TYPE_PARENT]);
        $continents = $this->_categoryRepo->fetchCategoryWithAllChildByTitle(['title' => AppGlobal::DESTINATION_PARENT]);
        return view('travellers-inn.admin.category.create2', compact('contents', 'continents'));
    }

    /**
     * Store a newly created role in storage.
     *
     * @param CreateCategoryRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $categoryInput = $request->all();
        $this->_categoryRepo->create($categoryInput);

        Session::flash('success', 'Category successfully created');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified role.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Category $category
     */
    public function show($id)
    {
        $category = $this->_categoryRepo->find($id);
        $posts = $this->_categoryRepo->fetchPostsByCategoryId(['id' => $id]);
        return view('travellers-inn.admin.category.show', compact('category', 'posts'));
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Category $category
     */
    public function edit($id)
    {
        $categoryName = "- Select Parent -";
        $category = $this->_categoryRepo->find($id);
        $categories = Category::all();
        $categoryID = null;

        $parent = $category->parent()->first();

        if($parent)
        {
            $categoryID = $parent->id;
            $categoryName = $this->_categoryRepo->fetchCategoryNameById($categoryID);
        }

        return view('travellers-inn.admin.category.edit', compact('categories','category', 'categoryName','categoryID'));
    }

    /**
     * Update the specified role in storage.
     *
     * @param UpdateCategoryRequest|UpdateRoleRequest|Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Category $category
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $categoryInput = $request->all();
        if ($categoryInput['parent_id'] == 0)
        {
            unset($categoryInput['parent_id']);
        }
        $ParentCategory = $this->_categoryRepo->find($request->parent_id);
        $currentCategory = $this->_categoryRepo->find($id);

        if ($ParentCategory)
        {
            $currentCategory->makeChildOf($ParentCategory);
        }


        $this->_categoryRepo->update($categoryInput, ['id' => $id]);
        Session::flash('success', 'Category successfully updated');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified role from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Category $category
     */
    public function destroy($id)
    {
        $category = Category::find($id);


//        $check = Category::with('childs')->where('parent_id', $id)->get();
//        dd($check);
        $category->delete();
        Session::flash('success', 'Category successfully deleted');
        return redirect()->route('category.index');
    }

    /**
     * @return mixed
     */
    public function fetchCategories()
    {
        $categoriesAll = Category::where('parent_id', '=', null)->get();

        $categories = null;
        $tree["data"] = array();
        foreach ($categoriesAll as $parentCategories) {

            $parentCategoriesAll = $parentCategories->getDescendantsAndSelf()->toHierarchy();
            foreach ($parentCategoriesAll as $category) {

                array_push($tree["data"], $category);
            }
        }
        return $response = $tree;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
//    public function fetchCategoryPostsById()
//    {
//        $postId = ['id' => 44];
//        $countryPost = $this->_categoryRepo->fetchPostsByCategoryId($postId);
////        dd($latestPosts);
//        return view('travellers-inn.home.index', compact('countryPost'));
//
//    }
}
