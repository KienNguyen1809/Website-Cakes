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

// Thêm số lượng sản phẩm * sản phẩm trong giỏ hàng ở trang Thông tin chi tiết sản phẩm
Route::get('add-to-cart/{id}/{soluong}',[
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


// Route::get('test',function(){
// 	return view('admin.loaisanpham.danhsach');
// });


Route::get('admin/dangnhap','userController@getDangnhapAdmin');
Route::post('admin/dangnhap','userController@postDangnhapAdmin');

Route::get('admin/logout','userController@getDangxuatAdmin');


//Tạo group admin vì khi đăng nhập chỉ cần gán vào trang admin mà không phải gán các trang con của nó
//=>Bảo mật admin => Bảo mật trang con

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

	Route::group(['prefix'=>'slide'],function(){
		// admin/slide/danhsach || sua || them
		Route::get('danhsach','slideController@getDanhSach');

		Route::get('sua/{id}','slideController@getSua');
		Route::post('sua/{id}','slideController@postSua');

		Route::get('xoa/{id}','slideController@getXoa');
		
		//Hàm get gọi chức năng thêm lên
		Route::get('them','slideController@getThem');
		//Hàm post nhận dữ liệu rồi lưu vào cơ sở dữ liệu database
		Route::post('them','slideController@postThem');
	});


	Route::group(['prefix'=>'loaisanpham'],function(){
		// admin/loaisanpham/danhsach || sua || them
		Route::get('danhsach','loaisanphamController@getDanhSach');

		Route::get('sua/{id}','loaisanphamController@getSua');
		Route::post('sua/{id}','loaisanphamController@postSua');

		Route::get('xoa/{id}','loaisanphamController@getXoa');
		
		//Hàm get gọi chức năng thêm lên
		Route::get('them','loaisanphamController@getThem');
		//Hàm post nhận dữ liệu rồi lưu vào cơ sở dữ liệu database
		Route::post('them','loaisanphamController@postThem');
	});


	Route::group(['prefix'=>'sanpham'],function(){
		// admin/sanpham/danhsach || sua || them
		Route::get('danhsach','sanphamController@getDanhSach');

		Route::get('sua/{id}','sanphamController@getSua');
		Route::post('sua/{id}','sanphamController@postSua');

		Route::get('xoa/{id}','sanphamController@getXoa');
		
		//Hàm get gọi chức năng thêm lên
		Route::get('them','sanphamController@getThem');
		//Hàm post nhận dữ liệu rồi lưu vào cơ sở dữ liệu database
		Route::post('them','sanphamController@postThem');
	});


	Route::group(['prefix'=>'hoadon'],function(){
		// admin/hoadon/danhsach || sua || them
		Route::get('danhsach','hoadonController@getDanhSach');

		Route::get('xoa/{id}','hoadonController@getXoa');

		Route::get('chitiet','hoadonController@getChiTiet');

		Route::get('xoachitiet/{id}','hoadonController@getXoaChiTiet');
	});


	Route::group(['prefix'=>'khachhang'],function(){
		// admin/khachhang/danhsach || sua 
		Route::get('danhsach','khachhangController@getDanhSach');

		Route::get('xoa/{id}','khachhangController@getXoa');
	});


	Route::group(['prefix'=>'users'],function(){
		// admin/users/danhsach || sua || them
		Route::get('danhsach','userController@getDanhSach');

		Route::get('sua/{id}','userController@getSua');
		Route::post('sua/{id}','userController@postSua');

		Route::get('xoa/{id}','userController@getXoa');
		
		//Hàm get gọi chức năng thêm lên
		Route::get('them','userController@getThem');
		//Hàm post nhận dữ liệu rồi lưu vào cơ sở dữ liệu database
		Route::post('them','userController@postThem');
	});

	
});


