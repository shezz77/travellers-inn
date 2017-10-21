<?php

namespace App\Http\Controllers\TravellersInn;

use App\Http\Requests\CreateHashTagRequest;
use App\Http\Requests\UpdateHashTagRequest;
use App\Models\Post;
use App\Repositories\Contracts\IHashTagRepo;
use App\Repositories\Contracts\IPostRepo;
use App\Utils\JsonResult;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Utils\Globals\AppGlobal;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


class HashTagController extends Controller
{
    private $_hashTagRepo;
    private $_postRepo;

    /**
     * HashTagController constructor.
     * @param $_hashTagRepo
     */
    public function __construct(IHashTagRepo $_hashTagRepo, IPostRepo $_postRepo)
    {
        $this->_hashTagRepo = $_hashTagRepo;
        $this->_postRepo = $_postRepo;
    }


    /**
     * Display a listing of the role.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inputRequest = $request->all();
        $hashTags = $this->_hashTagRepo->all($inputRequest);
        if ($request->ajax()){
            return JsonResult::JSONSuccessResult('', $hashTags);
        }
        return view('travellers-inn.admin.hash-tags.index', ['hashTags'=>$hashTags]);
    }

    /**
     * Store a newly created role in storage.
     *
     * @param CreateHashTagRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateHashTagRequest $request)
    {
        $inputRequest = $request->all();
        $this->_hashTagRepo->create($inputRequest);

        Session::flash('success', "New Tag was successfully created!");
        return redirect()->route('hash-tags.index');
    }

    /**
     * Display the specified role.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param HashTag $hashTag
     */
    public function show($id)
    {
        $hashTag = $this->_hashTagRepo->find($id);
        return view('travellers-inn.admin.hash-tags.show', compact('hashTag'));
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param HashTag $hashTag
     */
    public function edit($id)
    {
        $errorAjaxResponse = ['success'=> false, 'error'=>true, 'errorCode'=>500, 'message'=>''];
        $hashTag = $this->_hashTagRepo->find($id);

        if(!$hashTag){
            return response()->json($errorAjaxResponse);
        }

        return JsonResult::JSONSuccessResult('', $hashTag);

    }

    /**
     * Update the specified role in storage.
     *
     * @param UpdateHashTagRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHashTagRequest $request)
    {
        $hashTagId = $request->id;
        $this->_hashTagRepo->update($request->all(), ['id' => $hashTagId]);

        Session::flash('success', "Successfully Updated your HashTag");

        return redirect()->route('hash-tags.show', $hashTagId);
    }

    /**
     * Remove the specified role from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param HashTag $hashTag
     */
    public function destroy($id)
    {
        $hashTag = [
            'id' => $id
        ];

        $this->_hashTagRepo->destroy($hashTag);
        Session::flash('success', 'Tag was deleted successfully');

        return redirect()->route('hash-tags.index');
    }


    public function getHashTagPosts($id)
    {
        $posts = Post::latest()->limit(AppGlobal::RECENT_POST_LIMIT)->get();

        $hashTagID = ['id' => $id];
        $hashTagPost = $this->_hashTagRepo->fetchPostsByHashTagId($hashTagID);


        $hashTagPosts = $this->paginate($hashTagPost, AppGlobal::POST_DEFAULT_LIMIT);
        return view('travellers-inn.hash-tags.show', compact('hashTagPosts', 'posts'));

    }

    /**
     * @param $items
     * @param $perPage
     * @return LengthAwarePaginator
     */
    function paginate($items, $perPage)
    {
        $pageStart           = request('page', 1);
        $offSet              = ($pageStart * $perPage) - $perPage;
        $itemsForCurrentPage = array_slice($items, $offSet, $perPage, TRUE);

        return new LengthAwarePaginator(
            $itemsForCurrentPage, count($items), $perPage,
            Paginator::resolveCurrentPage(),
            ['path' => Paginator::resolveCurrentPath()]
        );
    }
}
