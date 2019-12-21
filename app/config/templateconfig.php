<?php

return [
    'template' => [
        'warpperstart' => TEMPLATE_PATH . 'wrapperstart.php',
        'nav'          => TEMPLATE_PATH . 'nav.php',
        'sidbar'       => TEMPLATE_PATH . 'sidbar.php',
        ':view'        => ':action_view',
        'warpperend'   => TEMPLATE_PATH . 'wrapperend.php'
    ],
    'header_resources' => [
        'css' => [
            'bootstrap'     => CSS . 'bootstrap.min.css',
            'font-awesome'  => CSS . 'font-awesome.min.css',
            'main'          => CSS . 'main' . $_SESSION['lang'] . '.css',
            'style3'        => CSS . 'style3.css',
            'shop-homepage' => CSS . 'shop-homepage.css',
            'normalize'     => CSS . 'normalize.css'
        ],
        'js'  => [
            'modernizr'   => JS . 'vendor/modernizr-2.8.3.min.js',
        ]
    ],
    'footer_resources' => [
        'jquery'            => JS . 'jquery.min.js',
        'bootstrap'         => JS . 'bootstrap.min.js',
        'helper'            => JS . 'helper.js',
        'datatables'        => JS . 'datatables' . $_SESSION['lang'] . '.js',
        'main'              => JS . 'main.js'
    ]
];