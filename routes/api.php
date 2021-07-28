<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/thongke/top3_sanpham_moinhat', [ApiController::class,  'thongke_top3_sanpham_moinhat'])->name('api.thongke.top3_sanpham_moinhat');
// Route::get('/sanpham/danhsach', [ApiController::class,  'danhsach_sanpham'])->name('api.sanpham.danhsach');

Route::get('/thongke/top3_sanpham_moinhat', [ApiController::class, 'thongke_top3_sanpham_moinhat'])->name('api.thongke.top3_sanpham_moinhat');

// Route::get('/v2/thongke/top3_sanpham_moinhat', [ApiController::class, 'thongke_top3_sanpham_moinhat_v2'])->name('api.thongke.v2.top3_sanpham_moinhat');

Route::get('/sanpham/timkiem', 'Api\ApiController@timkiemsanpham')->name('api.sanpham.timkiem');