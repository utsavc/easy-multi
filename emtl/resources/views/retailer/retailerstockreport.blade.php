@extends('retailer.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">
	@include('messages.messages')


	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">Product Stock</h3>
		</div>

		<div class="card-body">



			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box">
					<span class="info-box-icon bg-info elevation-1"><i class="nav-icon fas fa-boxes"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Active Stock</span>
						<span class="info-box-number">
							{{$retailerStock->sum('qty')- $customerPurchase->sum('qty')}}
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>

			<a href="{{route('retailerStockIn',$product_id)}}" class="btn btn-warning">View Stock Recorded</a>
			<a href="{{route('retailerStockOut',$product_id)}}" class="btn btn-primary">View Stock Transferred</a>


		</div>

	</div>
</div>










@endsection