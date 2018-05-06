@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <a href="{{route('loaisanpham',$sanpham->id_type)}}">Loại Sản Phẩm:{{$loai_sp->name}} </a>/<span>{{$sanpham->name}}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content"> 
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img  src="source/image/product/{{$sanpham->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h2>{{$sanpham->name}}</h2></p>
								<p class="single-item-price">
									@if($sanpham->promotion_price==0)
										<span class="flash-sale">{{number_format($sanpham->unit_price)}} đồng</span>
									@else
										<span class="flash-del">{{number_format($sanpham->unit_price)}} đồng</span>
										<span class="flash-sale">{{number_format($sanpham->promotion_price)}} đồng</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{!!$sanpham->description!!}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Cỡ Giày:</p>
							<div class="single-item-options">
								
								<h4> Vui lòng vào phần thanh toán để chọn size giầy</h4>
								<a class="add-to-cart" href="{{route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a style="text-align: center; font-size: 28px" href="#tab-description">Chi Tiết Sản Phẩm</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{!!$sanpham->product_type->description!!}</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm tương tự</h4>

						<div class="row">
						@foreach($sp_tuongtu as $sptt)
							<div class="col-sm-4">
								<div class="single-item">
									@if($sptt->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="chi-tiet-san-pham/{{$sptt->id}}"><img src="source/image/product/{{$sptt->image}}" alt="" height="150px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sptt->name}}</p>
										<p class="single-item-price" style="font-size: 18px">
											@if($sptt->promotion_price==0)
												<span class="flash-sale">{{number_format($sptt->unit_price)}} đồng</span>
											@else
												<span class="flash-del">{{number_format($sptt->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($sptt->promotion_price)}} đồng</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$sptt->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="chi-tiet-san-pham/{{$sptt->id}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
						<div class="row">{{$sp_tuongtu->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản Phẩm Mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($new_product as $spm)
									<a class="pull-left" href="{{route('chitietsanpham',$spm->id)}}"><img src="source/image/product/{{$spm->image}}" width="50px" height="50px" alt="san pham moi nhat"></a>
									<div class="media-body">
										<a class="pull-left" href="{{route('chitietsanpham',$spm->id)}}">{{$spm->name}}</a>
										<span class="beta-sales-price" >
											<p class="single-item-price" style="font-size:15px">
											@if($spm->promotion_price==0)
												<span class="flash-sale">{{number_format($spm->unit_price)}} đồng</span>
											@else
												<span class="flash-del">{{number_format($spm->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($spm->promotion_price)}} đồng</span>
											@endif
											</p>
										</span>
									</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Đang khuyến mãi</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($sale_product as $spkm)
								
									<a class="pull-left" href="{{route('chitietsanpham',$spkm->id)}}"><img src="source/image/product/{{$spkm->image}}" width="50px" height="50px" alt="san pham moi nhat"></a>
									<div class="media-body">
										<a class="pull-left" href="{{route('chitietsanpham',$spkm->id)}}">{{$spkm->name}}</a>
										<span class="beta-sales-price">
											<p class="single-item-price" style="font-size: 15px">
											@if($spkm->promotion_price==0)
												<span class="flash-sale">{{number_format($spkm->unit_price)}} đồng</span>
											@else
												<span class="flash-del">{{number_format($spkm->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($spkm->promotion_price)}} đồng</span>
											@endif
											</p>
										</span>
									</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection