<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BillDetail;
use App\Bill;

class ChiTietController extends Controller
{
    public function getDanhSach(){
    	$detail=Bill::all();
    	//dd($detail);
    	 return view('admin.chitietdonhang.danhsach',['detail'=>$detail]);
    }
}
