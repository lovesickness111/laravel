@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">thể loại
                            <small>{{$tl->name}}</small>
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
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên thể loại</th>
                                <th>Mô tả</th>
                                <th>Ảnh mô tả</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td>{{$tl->id}}</td>
                                <td>{!!$tl->name!!}</td>
                                <td>{!!$tl->description!!}</td>
                                <td><img width="200px" height="170px" src="source/image/product/{{$tl->image}}"></td>
                            </tr>                           
                        </tbody>
                    </table>
                        <form action="admin/theloai/sua/{{$tl->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>tên thể loại</label>
                                <textarea id="demo" class="form-control" name="name">{{$tl->name}}</textarea>
                            </div>
                            <div class="form-group">
                                   <label>Mô Tả Loại sản phẩm</label>
                                  <textarea id="demo" class="form-control ckeditor" rows="3" name="MoTa">{{$tl->description}}</textarea>
                            </div>
                            <div class="form-group">
                                 <label>Hình Ảnh mới</label>
                                 <input type="file" name="image" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-default">xác nhận sửa</button>
                            <button type="reset" class="btn btn-default">xóa hết</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div> 
        <!-- /#page-wrapper -->
@endsection