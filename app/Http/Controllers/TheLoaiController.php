<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\Product;


class TheLoaiController extends Controller
{
    public function getDanhSach(){
    	$theloai= ProductType::all();
    	return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
    //ham nhan du lieu tu form roi dua len db
   
    public function getThem(){
    	return view('admin.theloai.them');
    }
     public function postThem(Request $request){
        $this->validate($request,
        [
            'name'=>'required|unique:type_products|min:3|max:100',
            'image'=>'required',
            'description'=>'required'
        ],
        [  
            'description.required'=>'bạn chưa nhập mô tả',
            'image.required'=>'bạn chưa chọn ảnh cho loại',
            'name.required'=>'bạn chưa nhập tên thể loại',
            'name.unique'=>'tên thể loại đã trùng',
            'name.min'=>'tên thể loại dài hơn 3 và ít hơn 100 kí tự',
            'name.max'=>'bạn chưa nhập tên thể loại','Ten.min'=>'tên thể loại dài hơn 3 và ít hơn 100 kí tự'
        ]);
    $theloai= new ProductType;
    $theloai->name =$request->name;
    $theloai->description =$request->description;
    if($request->hasFile('image'))
        {
            $file = $request->file("image");
            $duoi =$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi!= 'png' && $duoi!= 'jpeg' && $duoi != 
                'img'){
                return redirect('admin/theloai/them')->with('thongbao','file bạn chọn không phải file ảnh(.jpg,.png,.jpeg)');
            }
            $name= $file->getClientOriginalName();
            $image = str_random(4)."-".$name;
            while(file_exists("source/image/product/".$image))
            {
                $image = str_random(4)."-".$name;
            }
            $file->move("source/image/product/",$image);
            $theloai->image=$image;
        }else
        {
            $theloai->image ="";
        }
    $theloai->save();
    return redirect('admin/theloai/them')->with('thongbao','thêm thành công!!');
     }
    public function getSua($id){
    	$tl= ProductType::find($id);
    	return view('admin.theloai.sua',['tl'=>$tl]);
    }
    public function postSua(Request $request, $id){
    	$theloai= ProductType::find($id);
    	$this->validate($request,
    	[
    		'name'=>'required|min:3|max:100'
    	],
    	[
    		'name.required'=>'bạn chưa nhập tên thể loại',
    		'name.min'=>'tên thể loại dài hơn 3 và ít hơn 100 kí tự',
    		'name.max'=>'bạn chưa nhập tên thể loại','Ten.min'=>'tên thể loại dài hơn 3 và ít hơn 100 kí tự'
    	]);
    	$theloai->name=$request->name;
    	$theloai->description = $request->MoTa;
        if($request->hasFile('image'))
        {
            $file = $request->file("image");
            $duoi =$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi!= 'png' && $duoi!= 'jpeg' && $duoi != 
                'img'){
                return redirect('admin/theloai/sua')->with('thongbao','file bạn chọn không phải file ảnh(.jpg,.png,.jpeg)');
            }
            $name= $file->getClientOriginalName();
            $Hinh = str_random(4)."-".$name;
            while(file_exists("source/image/product/".$Hinh))
            {
                $Hinh = str_random(4)."-".$name;
            }

            $file->move("source/image/product/",$Hinh);
            unlink("source/image/product/".$theloai->image);
            $theloai->image=$Hinh;
        }
    	$theloai->save();
    	return redirect('admin/theloai/sua/'.$id)->with('thongbao','sửa thành công!');
    }
    public function getXoa($id){
    	$theloai= ProductType::find($id);
        $sp = Product::where('id_type',$id)->delete();
    	$theloai->delete();
        
    	return redirect('admin/theloai/danhsach')->with('thongbao','bạn đã xóa thành công ');
    }   
}
