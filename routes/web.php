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

Route::get('index',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);

Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);

Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienHe'
]);

Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioiThieu'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);

Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);
Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);

Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);

Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);
Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

Route::get('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@getSignin'
]);

Route::post('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@postSignin'
]);

Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@postLogout'
]);
Route::get('search',[
'as'=>'search',
'uses'=>'PageController@getSearch'
]);
Route::get('admin/login','NguoiDungController@getLogin');
Route::post('admin/login','NguoiDungController@postLogin');

Route::get('admin/logout','NguoiDungController@getLogout');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	//lay danh sach loai hang
	Route::group(['prefix'=>'theloai'],function(){
		Route::get('danhsach','TheLoaiController@getDanhSach');
		Route::get('sua/{id}','TheLoaiController@getSua');
		Route::post('sua/{id}','TheLoaiController@postSua');
		Route::get('them','TheLoaiController@getThem');
		Route::post('them','TheLoaiController@postThem');
		Route::get('xoa/{id}','TheLoaiController@getXoa');
	});
//// san pham
	Route::group(['prefix'=>'sanpham'],function(){
		Route::get('danhsach','SanPhamController@getDanhSach');
		Route::get('them','SanPhamController@getThem');
		Route::post('them','SanPhamController@postThem');
		Route::get('sua/{id}','SanPhamController@getSua');
		Route::post('sua/{id}','SanPhamController@postSua');
		Route::get('xoa/{id}','SanPhamController@getXoa');
	});
//slide
	Route::group(['prefix'=>'slide'],function(){
		Route::get('danhsach','SlideController@getDanhSach');
		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');
		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');
		Route::get('xoa/{id}','SlideController@getXoa');
	});
	//user
	Route::group(['prefix'=>'user'],function(){
		Route::get('danhsach','NguoiDungController@getDanhSach');
		Route::get('sua/{id}','NguoiDungController@getSua');
		Route::post('sua/{id}','NguoiDungController@postSua');
		Route::get('xoa/{id}','NguoiDungController@getXoa');
	});
	//hoa don bills
	Route::group(['prefix'=>'bills'],function(){
		Route::get('danhsach','HoaDonController@getDanhSach');
		Route::get('danhsachchitiet','HoaDonController@getDanhSachChiTiet');
		Route::get('xoa/{id}','HoaDonController@getXoa');
	});
	Route::group(['prefix'=>'customers'],function(){
		Route::get('danhsach','NguoiDungController@getDanhSachKhachHang');
		Route::get('xoa/{id}','NguoiDungController@getXoaKhachHang');
	});
	//khach hang
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
	});
});

