<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// route Danh mục Loại Sản phẩm
// Hàm Route::resource() sẽ tạo toàn bộ các route CRUD theo tiêu chuẩn RestFul API
Route::resource('/admin/loai', 'Backend\LoaiController');

Route::get('/lien-he', 'Frontend\FrontendController@contact')->name('frontend.pages.contact');
Route::post('/lien-he/goi-loi-nhan', 'Frontend\FrontendController@sendMailContactForm')->name('frontend.pages.contact.sendMail');

Route::get('setLocale/{locale}', function ($locale) {
    if (in_array($locale, Config::get('app.locales'))) {
      Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('app.setLocale');

// báo cáo đơn hàng
Route::get('/admin/baocao/donhang', 'Backend\BaoCaoController@donhang')->name('backend.baocao.donhang');
Route::get('/admin/baocao/donhang/data', 'Backend\BaoCaoController@donhangData')->name('backend.baocao.donhangData');


Route::get('/thongke', 'Frontend\FrontendController@thongke')->name('frontend.pages.thongke');
Route::get('/thongke2', 'Frontend\FrontendController@thongke2')->name('frontend.pages.thongke2');