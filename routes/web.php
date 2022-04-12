<?php

use App\Http\Controllers\ProdukControler;
use Illuminate\Support\Facades\Route;
use app\Models\Produk;

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "desc" => "ini dari route",
        "Isi"  => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto, laudantium!"
    ]);
});


Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "namaCEO" => "Somo Supri",
        "namaCTO" => "Syaiful",
        "KeteranganCEO" => "CEO & Founder",
        "KeteranganCTO" => "CTO",
        "Kontak" => "Kontak"
    ]);
});

// Route::get('/pakai-promo/', function () {
//     return view('pakai-promo');
// });




Route::get('/promo', function () {
    $blog_post = [
        [
            "title" => 'Diskon spesial Bulan Ramadhan',
            "slug" => 'Diskon-Ramadhan1443',
            "author" => 'Admin',
            "body" => 'Diskon spesial hingga 30%, khusus 5 pembeli pertama'
        ],
        [
            "title" => 'Diskon spesial IdulAdha',
            "author" => 'Admin',
            "slug" => 'Diskon-iduladha1443',
            "body" => 'Diskon spesial hingga 40%, khusus 5 pembeli pertama'
        ]

    ];
    return view('promo', [
        'title' => 'Promo',
        "posts" => $blog_post
    ]);
});


Route::get('/pakai-promo/{slug}', function ($slug) {

    $blog_post = [
        [
            "title" => 'Diskon spesial Bulan Ramadhan',
            "slug" => 'Diskon-Ramadhan1443',
            "author" => 'Admin',
            "body" => 'Diskon spesial hingga 30%, khusus 5 pembeli pertama'
        ],
        [
            "title" => 'Diskon spesial IdulAdha',
            "author" => 'Admin',
            "slug" => 'Diskon-iduladha1443',
            "body" => 'Diskon spesial hingga 40%, khusus 5 pembeli pertama'
        ],

    ];

    $new_post = [];

    foreach ($blog_post as $post) {
        if ($post["slug"] == $slug) {
            $new_post = $post;
        }
    }

    return view('/pakai-promo', [
        "title" => "Single Post",
        "post" => $new_post
    ]);
});


Route::get('/produk', [ProdukControler::class, 'index']);
Route::get('/produk/{slug}', [ProdukControler::class, 'show']);


