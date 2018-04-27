@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
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
							<img src="source/image/product/{{$sanpham->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h2>{{$sanpham->name}}</h2></p>
								<div class="space20">&nbsp;</div>
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
								<p>{{$sanpham->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Số lượng:</p>
							<div class="space10">&nbsp;</div>

							<div class="single-item-options">								
								<select id="soluong" class="wc-select" name="color">
									<option>Số lượng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>

								<!-- Thêm số lượng sản phẩm * sản phẩm trong giỏ hàng ở trang Thông tin chi tiết sản phẩm-->
								<!-- Thêm sản phẩm vào giỏ hàng các trang khác mặc định số lượng thêm bằng = 1 gắn với mảng id sản phẩm -->
								<!-- Muốn tăng số lượng sản phẩm mua thì vào trang Thông tin chi tiết sản phẩm -->
								<a class="add-to-cart" onclick="myFunction()" ><i class="fa fa-shopping-cart"></i></a>
								<script type="text/javascript">
								function myFunction() {
									var soluong = document.getElementById("soluong").value;
									location.replace("{{URL::to("/add-to-cart/".$sanpham->id)}}" + "/" + soluong);
								}
								</script>
								
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description"><strong>MÔ TẢ</strong></a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$sanpham->description}}</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4><i>Sản phẩm tương tự</i></h4>
						<div class="space20">&nbsp;</div>

						<div class="row">
						@foreach($sp_tuongtu as $sptt)
							<div class="col-sm-4">
								<div class="single-item">
									@if($sptt->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$sptt->id)}}"><img src="source/image/product/{{$sptt->image}}" alt="" height="150px"></a>
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
									<div class="space20">&nbsp;</div>

									<div class="single-item-caption">

										<!-- Parameter Tham số dùng mảng nên khi thêm id và số lượng sản phẩm, ta cho chúng vào 1 mảng [$sptt->id, '1'] -->
										<!-- Mặc định số lượng thêm trong giỏ hàng bằng 1 -->
										<a class="add-to-cart pull-left" href="{{route('themgiohang',[$sptt->id, '1'])}}"><i class="fa fa-shopping-cart"></i></a>

										<a class="beta-btn primary" href="{{route('chitietsanpham',$sptt->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
									<div class="space40">&nbsp;</div>
								</div>
							</div>
						@endforeach
						</div>
						<div class="row">{{$sp_tuongtu->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>

				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Quảng Cáo</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										SAMSUNG
										<div class="space10">&nbsp;</div>
										<span class="beta-sales-price">$150</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/2.png" alt=""></a>
									<div class="media-body">
										NOKIA
										<div class="space10">&nbsp;</div>
										<span class="beta-sales-price">$55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										APPLE
										<div class="space10">&nbsp;</div>
										<span class="beta-sales-price">$500</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/4.png" alt=""></a>
									<div class="media-body">
										BKAV
										<div class="space10">&nbsp;</div>
										<span class="beta-sales-price">$99</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->

					<div class="widget">
						<h3 class="widget-title">NEW MOBILE</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										BPHONE
										<div class="space10">&nbsp;</div>
										<span class="beta-sales-price">300$</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/2.png" alt=""></a>
									<div class="media-body">
										IPHONE 8 PLUS
										<div class="space10">&nbsp;</div>
										<span class="beta-sales-price">$1200</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										SAMSUNG S8
										<div class="space10">&nbsp;</div>
										<span class="beta-sales-price">$1010</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/4.png" alt=""></a>
									<div class="media-body">
										NOKIA 110i
										<div class="space10">&nbsp;</div>
										<span class="beta-sales-price">$109</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection