@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản Phẩm
                            <small>thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                         @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                   {{$err}}<br> 
                                @endforeach
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form action="admin/sanpham/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Chọn thể loại</label>
                                <select class="form-control" name="TheLoai">
                                    @foreach($theloai as $tl)
                                    <option value="{{$tl->id}}">{{$tl->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input class="form-control" name="name" placeholder="nhập tiêu đề" />
                            </div>
                            <div class="form-group">
                                <label>Mô Tả sản phẩm</label>
                                <textarea id="demo" class="form-control ckeditor" rows="3" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Giá Bán</label>
                                <input class="form-control" name="unit_price" placeholder="nhập giá bán" />
                            </div>
                            <div class="form-group">
                                <label>Giá Sau khi giảm</label>
                                <input class="form-control" name="promotion_price" placeholder="nhập giá sau khi sale" />
                            </div>
                            <div class="form-group">
                                    <label>Hình Ảnh cho sản phẩm</label>
                                    <input type="file" name="Hinh" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Cỡ Giày</label>
                                <input class="form-control" name="unit" placeholder="nhập các cỡ giày" />
                            </div>
                            <div class="form-group">
                                <label>sản phẩm mới</label>
                                <label class="radio-inline">
                                    <input name="new" value="0" checked="" type="radio">không
                                </label>
                                <label class="radio-inline">
                                    <input name="new" value="1" type="radio">có
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">xác nhận</button>
                            <div style="text-align: right;">
                               <button type="reset" class="btn btn-default">xóa hết</button>
                            </div>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
