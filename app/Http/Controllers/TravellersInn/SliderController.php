<?php

namespace App\Http\Controllers\TravellersInn;

use App\Models\Post;
use App\Models\Slider;
use App\Repositories\Contracts\IPostRepo;
use App\Http\Requests\UpdateSliderRequest;
use App\Repositories\Contracts\ISliderRepo;
use App\Repositories\Contracts\ICategoryRepo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Utils\Globals\AppGlobal;

class SliderController extends Controller
{
    private $_sliderRepo;
    private $_postRepo;
    private $_categoryRepo;

    /**
     * Display a listing of the slider.
     *
     * @param ICategoryRepo $_categoryRepo
     * @param SliderRepo|ISliderRepo $_sliderRepo
     * @param PostRepo|IPostRepo $_postRepo
     */
    public function __construct(ICategoryRepo $_categoryRepo, ISliderRepo $_sliderRepo, IPostRepo $_postRepo)
    {
        $this->_sliderRepo = $_sliderRepo;
        $this->_postRepo = $_postRepo;
        $this->_categoryRepo = $_categoryRepo;
    }

    public function index(Request $request)
    {
        $inputRequest = $request->all();
        $sliders = $this->_sliderRepo->all();

        $Continents = $this->_categoryRepo->fetchCategoryWithImmediateChildByTitle(['title' => AppGlobal::DESTINATION_PARENT]);


        // fetch all continents from category
        $ContinentsArray = array();
        foreach ($Continents as $Continent)
        {
            $ContinentsArray[$Continent->id] = $Continent->title;
        }

        //fetch all countries from category
        $CountriesArray = array();
        foreach ($Continents as $Continent) {
            $CountriesInContinent = $Continent->getImmediateDescendants();
            foreach ($CountriesInContinent as $country) {
                $CountriesArray[$country->id] = $country->title;
            }
        }

        // fetch all destination from category
        $allDestinations = [];
        foreach ($Continents as $Continent)
        {
            $allDestinations[] = ['id' => $Continent->id, 'title' => $Continent->title];
            $CountriesInContinent = $Continent->getImmediateDescendants();
            foreach ($CountriesInContinent as $country)
            {
                $allDestinations[] = ['id' => $country->id, 'title' => $country->title];
            }
        }
//dd($allDestinations[0]['id']);
//        $selectedDestiantion = $this->_categoryRepo->fetchCategoryNameById($slider->country_id);

        return view('travellers-inn.admin.slider.index', compact('sliders', 'allDestinations','CountriesArray', 'ContinentsArray'));
    }

    /**
     * Show the form for creating a new slider.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created slider in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $inputRequest = $request->all();
        $slider = $this->_sliderRepo->create($inputRequest);

        $category = $this->_categoryRepo->find($inputRequest['category_id']);

        $category->slider()->save($slider);
//        $slider->category()->save($category);

        Session::flash('success', "New Slider was successfully created!");
        return redirect()->route('slider.index');
    }

    /**
     * Display the specified slider.
     *
     * @param $id
     * @return Response
     * @internal param Slider $slider
     */
    public function show($id)
    {
        $slider = $this->_sliderRepo->find($id);


        $destination_id = ['id' => $slider->category_id] ;
        if($slider->category_id != 0)
        $posts = $this->_categoryRepo->fetchPostsByCategoryId($destination_id);
        else
            $posts = \App\Utils\PostWrapper::posts();
        return view('travellers-inn.admin.slider.show', compact('slider', 'posts'));
    }

    /**
     * Show the form for editing the specified slider.
     *
     * @param $id
     * @return Response
     * @internal param Slider $slider
     */
    public function edit($id)
    {
        $errorAjaxResponse = ['success'=>false,'error'=>true,'errorCode'=>402,'message'=>''];
        $slider = $this->_sliderRepo->find($id);

        $Continents = $this->_categoryRepo->fetchCategoryWithImmediateChildByTitle(['title' => AppGlobal::DESTINATION_PARENT]);
        $allDestinations = [];
        foreach ($Continents as $Continent)
        {
            $allDestinations[] = ['id' => $Continent->id, 'title' => $Continent->title];
            $CountriesInContinent = $Continent->getImmediateDescendants();
            foreach ($CountriesInContinent as $country)
            {
                $allDestinations[] = ['id' => $country->id, 'title' => $country->title];
            }
        }

        $sliderArray = $slider->toArray();
        $category = $this->_categoryRepo->find($sliderArray['category_id']);
        $sliderArray['category_name'] = $category->title;
        $sliderArray['all_destination'] = $allDestinations;
        if (!$slider){
            return response($errorAjaxResponse);
        }
        return response()->json(['success'=>true,'error'=>false, 'data'=> $sliderArray]);
    }

    /**
     * Update the specified slider in storage.
     *
     * @param Request|Request $request
     * @return Response
     * @internal param Slider $slider
     */
    public function update(Request $request)
    {
        $sliderId = $request->id;
        $this->_sliderRepo->update($request->all(), ['id' => $sliderId]);

//        Session::flash('success', "Successfully Updated your Slider");
//
//        return redirect()->route('slider.update', $sliderId);

//        $slider = ['id' => $request->id];
//        $this->_sliderRepo->update($request->all(), $sliderId);

        Session::flash('success', "Successfully Updated your Slider");

        return redirect()->route('slider.index', $sliderId);

    }

    /**
     * Remove the specified slider from storage.
     *
     * @param  Slider  $slider
     * @return Response
     */
    public function destroy($id)
    {
        $slider = [
            'id' => $id
        ];
        $this->_sliderRepo->destroy($slider);
        Session::flash('success', 'Slider was deleted successfully');

        return redirect()->route('slider.index');
    }

    public function attachPost($slider_id, $post_id)
    {
        $slider = $this->_sliderRepo->find($slider_id);
        $post = $this->_postRepo->find($post_id);

        $slider->posts()->attach($post);

        Session::flash('success', "$post->post_title successfully added in $slider->name");

        return redirect()->back();
    }

    public function detachPost($slider_id, $post_id)
    {
        $slider = $this->_sliderRepo->find($slider_id);
        $post = $this->_postRepo->find($post_id);

        $slider->posts()->detach($post);

        Session::flash('success', "$post->post_title successfully Removed in $slider->name");

        return redirect()->back();
    }
}
