<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about',function () {
    return "Halaman About";
});

Route::get('profil',function(){
    return view('profil');
});

// route degan parameter 
Route::get('welcome/{salam}', function($salam){
    // return 'selamat ' . $salam;
    return view('salam')->with 
    ('viewsalam' , $salam);
});
// route tanpa parameter
// terdapat array $list
Route::get('listdata', function (){
    $list = ["sistem Informasi", "Informatika", "Manajemen"]; 
    $listmhs = [
        ["npm"=> "001","nama"=> "haloi"],
        ["npm"=> "002","nama"=> "bulan"]
    ];
    return view('listprodi')
        ->with('viewlist', $list)
        ->with('viewmhs', $listmhs);
});

Route::resource('fakultas', FakultasController::class);
Route::resource('prodi',ProdiController::class);