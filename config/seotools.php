<?php
/**
 * @see https://github.com/artesaos/seotools
 */
use App\Category;
use App\City;

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => false, // set false to total remove
            'titleBefore'  => "CS", // Put defaults.title before page title, like 'Free classified Ads - Dashboard'
            'description'  => 'Buy and Sell anywhere and post your Ad free on ! ✓Used & New products ✓Cars, Phones, Electronics, Smartphones, Fashion, Real Estate, Jobs & More ✓Free Classified Ads Online ✓Find what you are looking or create your own ad for Free!', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => array_merge(Category::all()->pluck("name")->toArray(),City::all()->pluck("name")->toArray(),["url"]),
            'canonical'    => true, // Set null for using Url::current(), set false to total remove
            'robots'       => "follow,index", // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],

        'add_notranslate_class' => true,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'CS | Free classified Ads', // set false to total remove
            'description' => 'Buy and Sell anywhere and post your Ad free on ! ✓Used & New products ✓Cars, Phones, Electronics, Smartphones, Fashion, Real Estate, Jobs & More ✓Free Classified Ads Online ✓Find what you are looking or create your own ad for Free!', // set false to total remove
            'url'         => true, // Set null for using Url::current(), set false to total remove
            'type'        => "website",
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'CS | Free classified Ads', // set false to total remove
            'description' => 'Buy and Sell anywhere and post your Ad free on ! ✓Used & New products ✓Cars, Phones, Electronics, Smartphones, Fashion, Real Estate, Jobs & More ✓Free Classified Ads Online ✓Find what you are looking or create your own ad for Free!', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
