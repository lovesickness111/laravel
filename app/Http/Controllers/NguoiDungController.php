<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;
use Illuminate\Support\Facades\Auth;

class NguoiDungController extends Controller
{
    public function getLogin(){
        return view('admin/login');
    }
    public function postLogin(Request $request){
        $this->validate($request,[
            'email'=>'required', 
            'password'=>'required'
        ],[
            'email.required'=>' please enter your email address',   
            'password.required'=> 'this password is invalid'
        ]);
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'id'=>7])){
           return  redirect('admin/theloai/danhsach');
        }else{
            return redirect()->back()->with('thongbao','email or password incorrect');
        }
        
    }
    public function getLogout(){
        Auth::logout();
        return redirect('admin/login');
    }
    public function getDanhSach(){
    	$user = User::all();
    	return view('admin.user.danhsach',compact('user'));
    }
    public function getXoa($id){
    	$user = User::find($id);
    	$user->delete();
    	return redirect('admin/user/danhsach')->with('thongbao','đã xóa thành công!');
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
    public function getDanhSachKhachHang(){
        $user = Customer::all();
        return view('admin.khachhang.danhsach',compact('user'));
    }
    public function getXoaKhachHang($id){
        $user = Customer::find($id);
        $user->delete();
        return redirect('admin/customers/danhsach')->with('thongbao','đã xóa thành công!');
    }
}
