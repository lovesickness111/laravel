@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản Phẩm
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
                                <th>ID</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Thể loại</th>
                                <th>Mô tả</th>
                                <th>giá trước khuyến mại</th>
                                <th>giá sau khi giảm</th>
                                <th>Ảnh Sản Phẩm</th>
                                <th>Cỡ giày</th>
                                <th>Có là Sản Phẩm mới</th>
                                <th>Xóa Sản Phẩm</th>
                                <th>Sửa Sản Phẩm</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sp as $tt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tt->id}}</td>
                                <td>{!!$tt->name!!}</td>
                                <td>{!!$tt->product_type->name!!}</td>
                                <td>{!!$tt->description!!}</td>
                                <td>{!!$tt->unit_price!!}</td>
                                <td>{!!$tt->promotion_price!!}</td>
                                <td><img width="200px" height="170px" src="source/image/product/{{$tt->image}}"></td>
                                <td>{!!$tt->unit!!}</td>
                                <td>{{$tt->new}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/sanpham/xoa/{{$tt->id}}">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham/sua/{{$tt->id}}">Sửa</a></td>
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