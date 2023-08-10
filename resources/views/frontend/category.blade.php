@extends('frontend.master')
@section('title','danh mục sản phẩm ')
@section('main')
<link rel="stylesheet" href="public/layout/frontend/css/category.css">
	
<div id="wrap-inner">
						<div class="products">
							<h3>{{ $cateName->cate_name }}</h3>
							@foreach ($items as $item)
									
								
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
						
					
					
						<div id="pagination">
							
							
							{{ $items->links() }}
						</div>
</div>
@stop
					
		