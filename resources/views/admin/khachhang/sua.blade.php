@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa thông tin user:
                            <small>{{$user->name}}</small>
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
                        <form action="admin/user/sua/{{$user->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên người dùng</label>
                                <input class="form-control" name="name" placeholder="nhập" value="{{$user->full_name}}"/>
                            </div>
                            <div class="form-group">
                                <label>email</label>
                                <input class="form-control" name="email" placeholder="nhập email" value="{{$user->email}}" />
                            </div>
                            <div class="form-group">
                                <label>số điện thoại</label>
                                <input class="form-control" name="phone" placeholder="nhập số phone" value="{{$user->phone}}" />
                            </div>
                            <div class="form-group">
                                <label>địa chỉ</label>
                                <input class="form-control" name="address" placeholder="nhập địa chỉ" value="{{$user->address}}"  />
                            </div>
                            <div class="form-group">
                                <label>ngăn chặn đăng nhập</label>
                                <label class="radio-inline">
                                    <input name="status" value="0" type="radio">có
                                </label>
                                <label class="radio-inline">
                                    <input name="status" value="1"  checked="" type="radio">không
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
