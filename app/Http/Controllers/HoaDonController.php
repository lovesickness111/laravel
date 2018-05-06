<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Bill;
use App\Product;
use App\BillDetail;

class HoaDonController extends Controller
{
   
    public function getDanhSach(){
    	$bill = Bill::all();
    	return view('admin.bills.danhsach',compact('bill'));
    }
    public function getDanhSachChiTiet(){
    	$detail =BillDetail::all();
    	return view('admin.bills.danhsachchitiet',compact('detail'));
    }
    public function getXoa($id){
    	$bill = Bill::find($id);
    	$detail = BillDetail::where('id_bill',$id);
    	$bill->delete();
    	$detail->delete();
    	return redirect('admin/bills/danhsach')->with('thongbao','đã xóa thành công!');
    }
    public function getSua($id){
    	$user=User::find($id);
    	return view('admin.user.sua',compact('user'));
    }
    public function postSua(Request $request, $id){
    	$sp = User::find($id);
    	$sp->full_name = $request->name;
    	$sp->email = $request->email;
    	$sp->phone= $request->phone;
    	$sp->address = $request->address;
    	$sp->status =$request->status;
    	$sp->save(); 
    	return redirect('admin/user/danhsach')->with('thongbao','sửa thông tin thành công!');
    }
}

