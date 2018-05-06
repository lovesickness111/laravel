<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;


class SlideController extends Controller
{
    public function getDanhSach(){
    	$slide= Slide::all();
    	return view('admin.slide.danhsach',['slide'=>$slide]);
    }
    public function getThem(){
    	$slide= Slide::all();
    	return view('admin.slide.them',['slide'=>$slide]);
    }
    //ham nhan du lieu tu form roi dua len db
    public function postThem(Request $request){
    	$this->validate($request,
    	[
    		'image'=>'required'
    	],
    	[
    		'image.required'=>'chưa nhập ảnh slide'
    	]);
    $slide= new Slide;
    $slide->link = $request->link;
        if($request->hasFile('image'))
        {
            $file = $request->file("image");
            $duoi =$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi!= 'png' && $duoi!= 'jpeg' && $duoi != 
                'img' && $duoi !='gif'){
                return redirect('admin/slide/them')->with('thongbao','file bạn chọn không phải file ảnh(.jpg,.png,.jpeg,.gif)');
            }
            $name= $file->getClientOriginalName();
            $Hinh = str_random(4)."-".$name;
            while(file_exists("sorce/image/slide/".$Hinh))
            {
                $Hinh = str_random(4)."-".$name;
            }
            $file->move("source/image/slide",$Hinh);
            $slide->image=$Hinh;
        }
    $slide->save();
    return redirect('admin/slide/them')->with('thongbao','thêm thành công!!');
    }
 
    public function getSua($id){
    	$slide= Slide::find($id);
    	return view('admin.slide.sua',['slide'=>$slide]);
    }
    public function postSua(Request $request, $id){
    	$slide= Slide::find($id);
    	$slide->link=$request->Link;
        if($request->hasFile('Hinh'))
        {
            $file = $request->file("Hinh");
            $duoi =$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi!= 'png' && $duoi!= 'jpeg' && $duoi != 
                'img' && $duoi !='gif'){
                return redirect('source/image/slide/sua')->with('thongbao','file bạn chọn không phải file ảnh(.jpg,.png,.jpeg,.gif)');
            }
            $name= $file->getClientOriginalName();
            $Hinh = str_random(4)."-".$name;
            while(file_exists("source/image/slide/".$Hinh))
            {
                $Hinh = str_random(4)."-".$name;
            }

            $file->move("source/image/slide",$Hinh);
            unlink("source/image/slide/".$slide->image);
            $slide->image=$Hinh;
        }
    	$slide->save();
    	return redirect('admin/slide/danhsach')->with('thongbao','sửa thành công!');
    }
    public function getXoa($id){
    	$slide= slide::find($id);
    	$slide->delete();
    	return redirect('admin/slide/danhsach')->with('thongbao','bạn đã xóa thành công ');
    } 
}
