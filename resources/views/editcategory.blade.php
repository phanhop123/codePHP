
@extends('master')
@section('tetle','edit directory')
@section('main')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Product portfolio</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Add list
						</div>
						<div class="panel-body">
							@include('errors.note')
							<form method="post">
							<div class="form-group">
								<label>List name:</label>
    							<input type="text" name="name" class="form-control"  placeholder="Tên danh mục..." value="">
							</div>
							<div class="form-group">
    							<input type="submit" name="submit" class="form-control btn btn-primary" placeholder="Tên danh mục..."value="fix">
							</div>
							<div class="form-group">
    							<a href="{{ asset('admin/category') }}" class="form-control btn btn-danger">Abort</a>
							</div>
							{{ csrf_field() }}
							</form>
						</div>
					</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop