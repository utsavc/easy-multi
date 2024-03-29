@extends('dealer.sidebar')

@section('bodycontent')

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Dashboard</h1>
			</div><!-- /.col -->
			
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<!-- Info boxes -->

		<div class="row">


			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box">
					<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Retailers</span>
						<span class="info-box-number">
							{{$retailer->count()}}
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>



			<!-- /.col -->
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Products</span>
						<span class="info-box-number">{{ $product->count()}}</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->

			<!-- /.col -->
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Comission</span>
						<span class="info-box-number">{{ $comission}}</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->


			
			<div class="col-lg-4">
				<div class="card card-warning">
					<div class="card-header">
						<h3 class="card-title">Product with less stocks</h3>
					</div>

					<ol>

						@foreach($product as $products)

						<li>{{$products->product->productname}}</li>

						@endforeach
						
					</ol>

				</div>
			</div>

		</div>

	</div>
</section>	





@endsection