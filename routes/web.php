<?php

Route::feeds();

Route::group(['namespace' => 'TravellersInn'], function () {
//Admin Routes
    Route::group(['middleware' => ['auth', 'access.control']], function () {
        /*
         * user stats routes
         */
        Route::get('admin/home', ['as' => 'admin.index', 'uses' => 'AdminController@Index']);
        Route::get('user/list', ['as' => 'user.list', 'uses' => 'AdminController@userIndex']);
        Route::get('admin/user/show/{id}', ['as' => 'admin.user.show', 'uses' => 'AdminController@userShow']);
        Route::get('user/country/{country_id}', ['as' => 'user.country', 'uses' => 'AdminController@countryShow']);
        Route::get('user/country', ['as' => 'user-countries', 'uses' => 'AdminController@getCountries']);
        Route::get('country/users', ['as' => 'country-users', 'uses' => 'AdminController@getUsers']);
        Route::post('role/attach/{user_id}', ['as' => 'role.attach', 'uses' => 'AdminController@roleAttach']);
        Route::post('resource/attach/{role_id}', ['as' => 'resource.attach', 'uses' => 'AdminController@resourceAttach']);
        Route::get('posts/pending', ['as' => 'post.pending', 'uses' => 'AdminController@postsShow']);
        Route::get('posts/approve/{id}', ['as' => 'post.approve', 'uses' => 'AdminController@approvePost']);
        Route::get('posts/reject/{id}', ['as' => 'post.reject', 'uses' => 'AdminController@rejectPost']);
        Route::get('posts/reject', ['as' => 'reject.list', 'uses' => 'AdminController@getRejectPost']);
        Route::get('posts/feature/', ['as' => 'posts.feature', 'uses' => 'AdminController@featuredPostShow']);
        Route::get('posts/feature/{id}', ['as' => 'post.feature', 'uses' => 'AdminController@featuredPost']);
        Route::get('posts/removeFeature/{id}', ['as' => 'remove.feature', 'uses' => 'AdminController@removeFeaturedPost']);
        /*
         * Sliders routes
         */
        Route::resource('slider', 'SliderController', ['except' => ['create, update']]);
        Route::put('slider/update', ['as' => 'slider.update', 'uses' => 'SliderController@update']);
        Route::get('slider/post/{slider_id}/{post_id}', 'SliderController@attachPost')->name('slider.post.attach');
        Route::get('slider/post/detach/{slider_id}/{post_id}', 'SliderController@detachPost')->name('slider.post.detach');

        /**
        Google Analytics routes
         **/
        Route::get('page/views', ['as' => 'page.views', 'uses' => 'APIController@getMostVisited']);
        Route::get('unique/pages', ['as' => 'unique.page', 'uses' => 'APIController@getUniquePages']);

        /**
         * Roles & Resource routes
         */
        Route::resource('role', 'RoleController', ['except' => ['update']]);
//    Route::get('role-index', ['as' => 'role.index', 'uses' => 'TravellersInn\RoleController@index']);
//    Route::post('role-store', ['as' => 'role.store', 'uses' => 'TravellersInn\RoleController@store']);
        Route::put('role/update', ['as' => 'role.update', 'uses' => 'RoleController@update']);
//    Route::delete('role/delete/{id}', ['as' => 'role.delete', 'uses' => 'TravellersInn\RoleController@destroy']);
//    Route::get('role/{id}', ['as' => 'role.show', 'uses' => 'TravellersInn\RoleController@show']);
        Route::get('role/management/{id}', ['as' => 'role.management', 'uses' => 'RoleController@roleManagement']);
        Route::get('resource/management/{role_id}', ['as' => 'resource.management', 'uses' => 'ResourceController@resourceManagement']);
//        Route::get('resource/index', ['as' => 'resource.index', 'uses' => 'ResourceController@index']);
//        Route::get('resource/{id}', ['as' => 'resource.show', 'uses' => 'ResourceController@show']);
        Route::resource('resource', 'ResourceController');
        /**
         * feed Routes
         */
        Route::get('feed.all', ['as' => 'feed/all', 'uses' => 'PostController@getFeedItems']);
        Route::get('feed.tips', ['as' => 'feed/tips', 'uses' => 'PostController@getTipsFeed']);
        Route::get('feed.images', ['as' => 'feed/images', 'uses' => 'PostController@getImagesFeed']);
        Route::get('feed.videos', ['as' => 'feed/videos', 'uses' => 'PostController@getVideosFeed']);
        Route::get('feed.ebooks', ['as' => 'feed/ebooks', 'uses' => 'PostController@getEbooksFeed']);

        /**
         * Category Routes
         */
        Route::resource('category', 'CategoryController');
//        Route::get('category', ['as' => 'category.index', 'uses' => 'CategoryController@index']);
//        Route::get('category/create', ['as' => 'category.create', 'uses' => 'CategoryController@create']);
//        Route::get('category/{id}', ['as' => 'category.show', 'uses' => 'CategoryController@show']);
//        Route::post('category/store', ['as' => 'category-store', 'uses' => 'CategoryController@store']);
        Route::get('categories', ['as' => 'fetch-category', 'uses' => 'CategoryController@fetchCategories']);
        Route::get('category/delete/{id}', 'CategoryController@destroy')->name('category.delete');
        /**
         * Visitor Routes
         */
        Route::get('visitor/index', ['as' => 'visitor.show', 'uses' => 'VisitorController@index']);
        /**setting routes admin**/
        Route::get('setting', ['as' => 'admin.setting', 'uses' => 'AdminController@getSetting']);
        Route::delete('delete/post/{id}', ['as' => 'admin.posts.delete', 'uses' => 'AdminController@destroy']);

    });
    /**
     * Register User Routes
     */
    Route::group([],function () {
        /*
         * post routes
         */
        Route::resource('posts', 'PostController');

        Route::get('categories/state/list', ['as' => 'categories.state.list', 'uses' => 'PostController@getStatesList']);
        Route::post('posts/like', ['as' => 'posts.like', 'uses' => 'PostController@storeLike']);
        /*
         * Hash Tags routes
         */
        Route::resource('hash-tags', 'HashTagController', ['except' => ['create, update']]);
        Route::put('hash-tags', ['as' => 'hash-tags.update', 'uses' => 'HashTagController@update']);
        Route::get('hash-tag/{id}', ['as' => 'hash-tags.posts', 'uses' => 'HashTagController@getHashTagPosts']);

        Route::get('notifcation/{id}', ['as' => 'notification.view', 'uses' => 'PostController@notification']);
        /*
         * comment routes
         */
        Route::get('post/continent', ['as' => 'post.continent', 'uses' => 'CategoryController@fetchCategoryPostsById']);
        Route::post('comments/{post_id}', ['as' => 'comments.store', 'uses' => 'PostController@storeComment']);
        Route::put('comment-edit', ['as' => 'comment.update', 'uses' => 'PostController@updateComment']);
        Route::delete('delete/{id}', ['as' => 'comment.delete', 'uses' => 'PostController@deleteComment']);
        Route::post('comment/like', ['as' => 'comments.like', 'uses' => 'PostController@storeCommentLike']);
        /*
         * setting routes
         */
        Route::get('user/profile/{id}', ['as' => 'user.profile', 'uses' => 'UserController@getUserProfile']);
        Route::get('setting-page', ['as' => 'setting-page', 'uses' => 'PagesController@getSetting']);
        Route::post('password/update', ['as' => 'password.update', 'uses' => 'UserController@updatePassword']);
        Route::put('personal/update', ['as' => 'personal.update', 'uses' => 'UserController@updatePersonal']);
        /*
         * dairy routes
         */
        Route::resource('diary', 'DiaryController', ['except' => ['index']]);
        Route::get('diary/post/{diary_id}/{post_id}', 'DiaryController@attachPost')->name('diary.post.attach');
        Route::get('diary/post/detach/{diary_id}/{post_id}', 'DiaryController@detachPost')->name('diary.post.detach');
        Route::get('diaries/{diary_id?}', 'DiaryController@index')->name('diary.index');
        /*
         * follow users routes
         */
        Route::get('follow/user{id}', ['as' => 'user.follow', 'uses' => 'UserController@follow']);
        Route::get('unFollow/user{id}', ['as' => 'user.un.follow', 'uses' => 'UserController@unFollow']);
    });


    Route::group([],function () {
        /**
         * Pages Routes
         */
        Route::get('state/list', ['as' => 'state.list', 'uses' => 'APIController@getStatesList']);
        Route::get('/', ['as' => 'traveller-inn-home', 'uses' => 'HomeController@getIndex']);
        Route::get('about-us', ['as' => 'about-us', 'uses' => 'PagesController@getAboutUs']);
        Route::get('contact-us', ['as' => 'contact-us', 'uses' => 'PagesController@getContactUs']);
        Route::post('contact-us', ['as' => 'contact-us', 'uses' => 'PagesController@postContactUs']);
        Route::get('destination/{id}', ['as' => 'destination', 'uses' => 'PagesController@getDestination']);
        /**
         * search routes
         */
        Route::get('search-page', ['as' => 'search-page', 'uses' => 'HomeController@getSearch']);
        Route::post('search', ['as' => 'search', 'uses' => 'HomeController@Search']);
        Route::post('advance-search', ['as' => 'advance-search', 'uses' => 'HomeController@AdvanceSearch']);

        Route::get('content-post/{id}',['as'=> 'content-post', 'uses' => 'PagesController@getContentPosts']);
        Route::get('error/{code}', 'HomeController@error')->name('error');

    });
});


Route::group([],function () {
    /*
     * user login routes
     */
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    /*
     * reset password
     */
    Route::get('reset', ['as' => 'reset.password', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('email', ['as' => 'email.password', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
    Route::post('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@reset']);
    /*
     * social login
     */
//    Route::get('login/twitter', 'Auth\LoginController@redirectToProvider');
//    Route::get('login/twitter/callback', 'Auth\LoginController@handleProviderCallback');
    Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
    Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
    /**
     * Auth Register Routes
     */
    Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::get('verify/email', ['as' => 'first.verify.email', 'uses' => 'Auth\RegisterController@firstVerifyEmail']);
    Route::get('verify/{email}/{verify_token}', ['as' => 'send.email.done', 'uses' => 'Auth\RegisterController@sendEmailDone']);
    Route::post('register', 'Auth\RegisterController@register');

});

