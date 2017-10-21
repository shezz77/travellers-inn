<?php

return [

    'feeds' => [
        [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * '\App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['\App\Model@getAllFeedItems', 'argument']
             */
            'items' => 'App\Models\Post@getFeedItems',

            /*
             * The feed will be available on this url.
             */
            'url' => 'feed/all',

            'title' => 'My All feed',
        ],
        [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * '\App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['\App\Model@getAllFeedItems', 'argument']
             */
            'items' => 'App\Models\Post@getTipsFeed',

            /*
             * The feed will be available on this url.
             */
            'url' => 'feed/tips',

            'title' => 'My tips feed',
        ],
        [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * '\App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['\App\Model@getAllFeedItems', 'argument']
             */
            'items' => 'App\Models\Post@getImagesFeed',

            /*
             * The feed will be available on this url.
             */
            'url' => 'feed/images',

            'title' => 'My Images feed',
        ],

        [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * '\App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['\App\Model@getAllFeedItems', 'argument']
             */
            'items' => 'App\Models\Post@getVideosFeed',

            /*
             * The feed will be available on this url.
             */
            'url' => 'feed/videos',

            'title' => 'My videos feed',
        ],
        [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * '\App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['\App\Model@getAllFeedItems', 'argument']
             */
            'items' => 'App\Models\Post@getEbooksFeed',

            /*
             * The feed will be available on this url.
             */
            'url' => 'feed/ebooks',

            'title' => 'My ebook feed',
        ],
    ],

];
