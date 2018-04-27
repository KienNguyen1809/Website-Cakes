@extends('master')
@section('content')

<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h2>Tìm kiếm</h2>
							<div class="space30">&nbsp;</div>
							<div class="beta-products-details">
								<p class="pull-left"><i>Tìm thấy {{count($product)}} sản phẩm</i></p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@foreach($product as $new)
								<div class="col-sm-3">
									<div class="single-item">
									@if($new->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new->name}}</p>
											<p class="single-item-price" style="font-size: 18px">
											@if($new->promotion_price==0)
												<span class="flash-sale">{{number_format($new->unit_price)}} đồng</span>
											@else
												<span class="flash-del">{{number_format($new->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($new->promotion_price)}} đồng</span>
											@endif
											</p>
										</div>
										<div class="space20">&nbsp;</div>
										<div class="single-item-caption">

											<!-- Parameter Tham số dùng mảng nên khi thêm id và số lượng sản phẩm, ta cho chúng vào 1 mảng [$new->id, '1'] -->
											<a class="add-to-cart pull-left" href="{{route('themgiohang',[$new->id, '1'])}}"><i class="fa fa-shopping-cart"></i></a>
											
											<!-- <a class="beta-btn primary" href="product.html">Chi tiết <i class="fa fa-chevron-right"></i></a> -->
											<a class="beta-btn primary" href="{{route('chitietsanpham',$new->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
										<div class="space40">&nbsp;</div>
									</div>
								</div>
							@endforeach
							</div>

						</div> <!-- .beta-products-list -->

					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->

@endsection
