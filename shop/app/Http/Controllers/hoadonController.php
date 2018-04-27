<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bill;
use App\BillDetail;

class hoadonController extends Controller
{
    //
    public function getDanhSach()
    {
    	$hoadon = Bill::all();
    	return view('admin.hoadon.danhsach',['hoadon'=>$hoadon]);
    }


    public function getXoa($id)
    {
    	$hoadon = Bill::find($id);
    	$hoadon->delete();

    	return redirect('admin/hoadon/danhsach')->with('thongbao','Xóa thành công');
    }


    public function getChiTiet()
    {
        $hoadonchitiet = BillDetail::all();
        return view('admin.hoadon.chitiet',['hoadonchitiet'=>$hoadonchitiet]);
    }


    public function getXoaChiTiet($id)
    {
        $hoadonchitiet = BillDetail::find($id);
        $hoadonchitiet->delete();

        return redirect('admin/hoadon/chitiet')->with('thongbao','Xóa thành công');
    }
}
