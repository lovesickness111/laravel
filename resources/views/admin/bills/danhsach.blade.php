@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đơn hàng
                            <small>Danh sách</small>
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
                                <th>ID đơn hàng</th>
                                <th>ID khách hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Email khách hàng</th>
                                <th>Ngày đặt hàng</th>
                                <th>Tổng Tiền Đơn hàng</th>
                                <!-- <th>Xem chi Tiết</th> -->
                                <th>phương thức thanh toán</th>
                                <th>Ghi chú</th>
                                <th>Thời gian tạo đơn</th>
                                <th>lần cập nhật gần nhất</th>
                                <th>Xóa đơn hàng</th>
                                <!-- <th>Sửa đơn hàng</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bill as $tt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tt->id}}</td>
                                <td>{!!$tt->id_customer!!}</td>
                                <td>{!!$tt->bill->name!!}</td>
                                <td>{!!$tt->bill->email!!}</td>
                                <td>{!!$tt->date_order!!}</td>
                                <td>{!!$tt->total!!}</td>
                                <!-- <td class="center"><i class="fa fa-pencil  fa-fw"></i><a href="admin/bills/danhsachchitiet/{{$tt->id}}">click here</a></td> -->
                                <td>{!!$tt->payment!!}</td>
                                <td>{!!$tt->note!!}</td>
                                <td>{!!$tt->created_at!!}</td>
                                <td>{!!$tt->updated_at!!}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/bills/xoa/{{$tt->id}}">Xóa</a></td>
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