<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\ProductType;
use App\Product;

class SanPhamController extends Controller
{
    public function getDanhSach(){
    	$sp= Product::orderBy('id','DESC')->get();
    	return view('admin.sanpham.danhsach',['sp'=>$sp]);
    }
    public function getThem(){	
    	$theloai= ProductType::all();
    	return view('admin.sanpham.them',['theloai'=>$theloai]);
   }
    //ham nhan du lieu tu form roi dua len db
    public function postThem(Request $request){
    	$this->validate($request,[
    		'TheLoai'=>'required',
    		'name'=>'required|min:3|unique:products',
    		'description'=>'required',
    		'unit_price'=>'required'
    	],[
    		'TheLoai.required'=>'chưa chọn loại sản phẩm',
    		'name.required'=>'chưa nhập tiêu đề',
    		'name.min'=>'tiêu đề dài tối thiều 3 kí tự',
    		'name.unique'=>'tên tiêu đề đã tồn tại',
    		'description.required'=>'chưa nhập mô tả sp',
    		'unit_price.required'=>'chưa nhập giá bán'
    	]);
    	$sp =new Product;
    	$sp->name= $request->name;
    	$sp->id_type= $request->TheLoai;
    	$sp->description= $request->description;
        $sp->unit_price = $request->unit_price;
        $sp->promotion_price = $request->promotion_price;
        $sp->unit = $request->unit;
        $sp->new = $request->new; 
    	if($request->hasFile('Hinh'))
    	{
    		$file = $request->file("Hinh");
    		$duoi =$file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi!= 'png' && $duoi!= 'jpeg' && $duoi != 
    			'img' && $duoi !='gif'){
    			return redirect('admin/sanpham/them')->with('thongbao','file bạn chọn không phải file ảnh(.jpg,.png,.jpeg,.gif)');
    		}
    		$name= $file->getClientOriginalName();
    		$Hinh = str_random(4)."-".$name;
    		while(file_exists("source/image/product/".$Hinh))
    		{
    			$Hinh = str_random(4)."-".$name;
    		}
    		$file->move("source/image/product",$Hinh);
    		$sp->image=$Hinh;
    	}else
    	{
    		$sp->image ="";
    	}
    	$sp->save(); 
    	return redirect('admin/sanpham/them')->with('thongbao','thêm sản phẩm thành công!');
    }
 
    public function getSua($id){
    	$sp= Product::find($id);
    	return view('admin.sanpham.sua',['sp'=>$sp]);   		
    }
    public function postSua(Request $request, $id){
    	$sp = Product::find($id);
    	$sp->name = $request->name;
    	$sp->description = $request->description;
    	$sp->unit_price = $request->unit_price;
    	$sp->promotion_price = $request->promotion_price;
    	$sp->unit=$request->unit;
  		$sp->new = $request->new;
    	if($request->hasFile('Hinh'))
    	{
    		$file = $request->file("Hinh");
    		$duoi =$file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi!= 'png' && $duoi!= 'jpeg' && $duoi != 
    			'img' && $duoi != 'gif' && $duoi!= 'PNG' && $duoi!= 'JPG' && $duoi!= 'JPEG'){
    			return redirect()->back()->with('thongbao','file bạn chọn không phải file ảnh(.jpg,.png,.jpeg,.gif)');
    		}
    		$name= $file->getClientOriginalName();
    		$Hinh = str_random(4)."-".$name;
    		while(file_exists("source/image/product/".$Hinh))
    		{
    			$Hinh = str_random(4)."-".$name;
    		}

    		$file->move("source/image/product",$Hinh);
    		unlink("source/image/product/".$sp->image);
    		$sp->image=$Hinh;
    	}
    	$sp->save(); 
    	return redirect('admin/sanpham/danhsach')->with('thongbao','sửa tin thành công!');
    }
    public function getXoa($id){
    	$sp = Product::find($id);
    	$sp->delete();
    	return redirect('admin/sanpham/danhsach')->with('thongbao','xóa thành công');
     } 
}
