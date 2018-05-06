@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa Slide
                            <small>{!!$slide->link!!}</small>
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
                        <form action="admin/slide/sua/{{$slide->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">        
                            <div class="form-group">
                                <label>Link</label>
                                <textarea id="demo" class="form-control ckeditor" rows="3" name="Link">{!!$slide->link!!}</textarea>
                            </div>
                            <div class="form-group">
                                    <label>Hình Ảnh</label>
                                    <img src="source/image/slide/{{$slide->image}}">
                                    <input type="file" name="Hinh" class="form-control">
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
@section('script')
    <script>
        $(document).ready(function(){
            $("#TheLoai").change(function(){
                var idTheLoai = $(this).val();
            $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
                    $("#LoaiTin").html(data);
                });
            });
        });
    </script>
@endsection