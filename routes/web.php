<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index-pg1');
});

Route::get('/videos/search/sea', function (Request $request) {
    // Lấy giá trị của tham số 'pagi' từ URL, mặc định là 1 nếu không có.
    $page = $request->query('pg', 2);

    return view('index-pg2', ['pg' => $page]);
});
// Route::get('/videos/sea-wave-golden-sand-sunrise-4006', function () {
//     return view('details.sea-wave-golden-sand-sunrise-4006');
// });
// Route::get('/videos/sea-iceland-ocean-water-sky-33194', function () {
//     return view('details.sea-iceland-ocean-water-sky-33194');
// });
// Route::get('/videos/nature-waves-ocean-sea-rock-31377', function () {
//     return view('details.nature-waves-ocean-sea-rock-31377');
// });
Route::get('/videos/{videoName}', function ($videoName) {
    return view("details.$videoName");
});

