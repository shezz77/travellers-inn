<?php

namespace App\Http\Controllers\TravellersInn;

use App\Http\Requests\CreateDiaryRequest;
use App\Repositories\Contracts\IDiaryRepo;
use App\Repositories\Contracts\IPostRepo;
use App\Utils\AuthWrapper;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Utils\Globals\AppGlobal;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class DiaryController extends Controller
{
    private $_diaryRepo;
    private $_postRepo;

    /**
     * DiaryController constructor.
     * @param IDiaryRepo $_diaryRepo
     * @param IPostRepo $_postRepo
     * @internal param IPostRepo $postRepo
     */
    public function __construct(IDiaryRepo $_diaryRepo, IPostRepo $_postRepo)
    {
        $this->_diaryRepo = $_diaryRepo;
        $this->_postRepo = $_postRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @param null $diary_id
     * @return \Illuminate\Http\Response
     */
    public function index($diary_id = null)
    {
        $diary = null;
        $diaries = null;
        $user = AuthWrapper::loggedInUser();

        if ($diary_id)
        {
            $diary = $this->_diaryRepo->find($diary_id);
            $diaries = $this->diariesToArray($user->diaries);
            return view('travellers-inn.diary.index', compact('diaries', 'diary'));
        }
        $diaries = $this->diariesToArray($user->diaries);
        $diaries = $this->paginate($diaries, AppGlobal::POST_DEFAULT_LIMIT);
        return view('travellers-inn.diary.index', compact('diaries', 'diary'));
    }

    public function diariesToArray($diaries){
        $diariesArray = [];
        foreach ($diaries as $diary){
            $diariesArray[] = $diary;
        }

        return $diariesArray;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateDiaryRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiaryRequest $request)
    {
        $inputRequest = $request->all();
        $user = AuthWrapper::loggedInUser();
        $newDiaryValues = array_add($inputRequest, 'user_id', $user->id);

        $result = $this->_diaryRepo->create($newDiaryValues);

        if ($result)
        {
            Session::flash('success', 'New Diary Successfully Created');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diary = $this->_diaryRepo->find($id);

        $postsArray = $this->diariesToArray($diary->posts);

        $posts = $this->paginate($postsArray, AppGlobal::POST_DEFAULT_LIMIT);


        return view('travellers-inn.diary.show', compact('posts','diary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->_diaryRepo->update($request->all(), ['id' => $id]);

        Session::flash('success', "Successfully Updated your Diary Info");

        return redirect()->route('diary.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ids = ['id' => $id];

        $result = $this->_diaryRepo->destroy($ids);

        if ($result)
        {
            Session::flash('success', 'Diary Successfully Deleted');
        }

        return redirect()->back();
    }

    public function attachPost($diary_id, $post_id)
    {
        $diary = $this->_diaryRepo->find($diary_id);
        $post = $this->_postRepo->find($post_id);

        $diary->posts()->attach($post);

        Session::flash('success', "$post->post_title successfully added in $diary->name");

        return redirect()->back();
    }

    public function detachPost($diary_id, $post_id)
    {
        $diary = $this->_diaryRepo->find($diary_id);
        $post = $this->_postRepo->find($post_id);

        $diary->posts()->detach($post);

        Session::flash('success', "$post->post_title successfully Removed in $diary->name");

        return redirect()->back();
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
