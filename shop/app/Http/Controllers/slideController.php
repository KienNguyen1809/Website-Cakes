<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slide;

class slideController extends Controller
{
    //
    public function getDanhSach()
    {
    	$slide = Slide::all();
    	return view('admin.slide.danhsach',['slide'=>$slide]);
    }


    public function getThem()
    {
    	return view('admin.slide.them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,
    		[
    			'image' => 'required'
    		],
    		[
    			'image.required' => 'Bạn chưa chọn hình ảnh slide',
    		]
    		);

    	$slide = new Slide;
    	$slide->image = $request->image;
    	$slide->save();

    	return redirect('admin/slide/them')->with('thongbao','Thêm thành công');
    }


    public function getSua($id)
    {
    	$slide = Slide::find($id);
    	return view('admin.slide.sua',['slide'=>$slide]);
    }

    public function postSua(Request $request,$id)
    {
    	$slide = Slide::find($id);
    	$this->validate($request,
            [
                'image' => 'required',
            ],
            [
                'image.required' => 'Bạn chưa chọn hình ảnh slide',
            ]
            );
    	
    	$slide->image = $request->image;
        $slide->save();

    	return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa thành công');
    }


    public function getXoa($id)
    {
    	$slide = Slide::find($id);
    	$slide->delete();

    	return redirect('admin/slide/danhsach')->with('thongbao','Xóa thành công');
    }

}
