@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">chi tiết các Đơn hàng
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>ID đơn hàng</th>
                                <th>Tên khách</th>
                                <th>Phone</th>
                                <th>email</th>
                                <th>ID sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>ảnh</th>
                                <th>cỡ giày</th>
                                <th>số lượng(đôi)</th>
                                <th>giá</th>
                                <th>Thời gian tạo đơn</th>
                                <th>lần cập nhật gần nhất</th>
                                <!-- <th>Xóa đơn hàng</th> -->
                                <!-- <th>Sửa đơn hàng</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detail as $tt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tt->id}}</td>
                                <td>{{$tt->id_bill}}</td>
                                <td>{!!$tt->bill->bill->name!!}</td>
                                <td>{!!$tt->bill->bill->phone_number!!}</td>
                                <td>{!!$tt->bill->bill->email!!}</td>
                                <td>{{$tt->id_product}}</td>
                                <td>{!!$tt->product->name!!}</td>
                                <td><img width="320px" height="270px" src="source/image/product/{{$tt->product->image}}"></td>
                                <td>{{$tt->unit}}</td>
                                <td>{{$tt->quantity}}</td>
                                <td>{{$tt->unit_price}}</td>
                                <td>{!!$tt->created_at!!}</td>
                                <td>{!!$tt->updated_at!!}</td>
                                <!-- <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/bills/xoa/{{$tt->id}}">Xóa</a></td> -->
                                <!-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/bills/sua/{{$tt->id}}">Sửa</a></td> -->
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection