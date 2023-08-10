@extends('frontend.master')
@section('title','trang chu')
@section('main')
	<!-- main -->
	

					<div id="wrap-inner">
						<div class="products">
							<h3>sản phẩm nổi bật</h3>
							<div class="product-list row">
								@foreach ($featured as $item)
									
								
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="{{ asset('storage/storage/avatar/'.$item->prod_img) }}" class="img-thumbnail"></a>
									<p><a href="#">{{ $item->prod_name }}</a></p>
									<p class="price">{{ number_format($item->prod_price,0,',','.') }}</p>	  
									<div class="marsk">
										<a href="{{ asset('details/'.$item->prod_id.'/'.$item->prod_slug.'.html') }}">Xem chi tiết</a>
									</div>                                    
								</div>
								@endforeach
							</div>                	                	
						</div>

						<div class="products">
							<h3>sản phẩm mới</h3>
							<div class="product-list row">
								@foreach ($new as $item)
									
								
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="{{ asset('storage/storage/avatar/'.$item->prod_img) }}" class="img-thumbnail"></a>
									<p><a href="#">{{ $item->prod_name }}</a></p>
									<p class="price">{{ number_format($item->prod_price,0,',','.') }}</p>	  
									<div class="marsk">
										<a href="#">Xem chi tiết</a>
									</div>                                    
								</div>
								@endforeach
								
							</div>    
						</div>
					</div>
					
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->
		<!-- endfooter -->
		<footer id="footer">			
			<div id="footer-t">
				<div class="container">
					<div class="row">				
						<div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">						
							<a href="#"><img src="img/home/logo.png" width="200px"></a>		
						</div>
						<div id="about" class="col-md-3 col-sm-12 col-xs-12">
							<h3>About us</h3>
							<p class="text-justify">Chúng tôi đào tạo chuyên sâu trong 2 lĩnh vực là Lập trình Website & Mobile nhằm cung cấp cho thị trường CNTT Việt Nam những lập trình viên thực sự chất lượng, có khả năng làm việc độc lập, cũng như Team Work ở mọi môi trường đòi hỏi sự chuyên nghiệp cao.</p>
						</div>
						<div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
							<h3>Hotline</h3>
							<p>Phone Sale: (+84) 0988 550 553</p>
							<p></p>
						</div>
						<div id="contact" class="col-md-3 col-sm-12 col-xs-12">
							<h3>Contact Us</h3>
							<p>Address : 66 Võ Văn Tần - Đà Nẵng </p>
							<p></p>
						</div>
					</div>				
				</div>
				<div id="footer-b">				
					<div class="container">
						<div class="row">
							<div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
								<p></p>
							</div>
							<div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
								<p>© 2023  Academy. All Rights Reserved</p>
							</div>
						</div>
					</div>
					{{-- <div id="scroll">
						<a href="#"><img src="img/home/scroll.png"></a>
					</div>	 --}}
				</div>
			</div>
		</footer>
@stop
