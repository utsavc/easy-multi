@extends('admin.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">


	<!-- Displaying Error Messages-->
	@if ($errors->any())
	<div class="alert alert-danger alert-dismissible fade show" role="alert">		
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</div>
	@endif

	
	@if ($message = Session::get('success'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">		
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>{{ $message }}</strong>
	</div>
	@endif


	<div class="row">
		<div class="col-lg-4">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Add to Stock</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form role="form" action="{{ route('addProductStock') }}" method="post" autocomplete="off">

					@csrf
					<div class="card-body">

						<div class="form-group">
							<label for="exampleDropdown">Select Product</label>
							<select data-live-search="true" title="Please select product" data-live-search-placeholder="Search Product" class="form-control selectpicker" name="product_id">

								@foreach ($products as $product)
								<option value="{{$product->id}}">{{$product->productname}}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label >Qty</label>
							<input type="text" name="qty" class="form-control"  placeholder="Eg. 10">
						</div>

						<!--
						<div class="form-group">
							<label >Date</label>
							<input type="text" class="form-control"  placeholder="">
						</div>-->

						
						<button type="submit" class="btn btn-primary">Create</button>
						<button type="submit" class="btn btn-warning">Reset</button>
					</div>
					<!-- /.card-body -->
				</form>
			</div>
		</div>
		<div class="col-lg-8">

			<div class="card">
				<div class="card-header">
					<h3 class="card-title font-weight-bold">Showing List of Products</h3>
				</div>
				<div class="card-body">
					<div class="datatable-dashv1-list custom-datatable-overright">
						<div id="toolbar">
							<select class="form-control dt-tb">
								<option value="">Export Basic</option>
								<option value="all">Export All</option>
								<option value="selected">Export Selected</option>
							</select>
						</div>
						<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
						data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
						<thead>
							<tr>
								<th data-field="id">SN</th>
								<th data-field="name" >Product Name</th>
								<th data-field="email" >Active Stock</th>
								<th data-field="stockIn" >Stock In</th>
								<th data-field="stockOut" >Stock Out</th>
								<th data-field="complete">Remarks</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($products as $product)

							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{$product->productname}}</td>
								@php 
								$totalProductStock=0;
								$totalDealerStock=0;
								@endphp


								@foreach($product->dealerStocks as $dealerStock)
								@php
								$totalDealerStock +=$dealerStock->qty
								@endphp
								@endforeach


								@foreach($product->productStocks as $productStock)
								@php
								$totalProductStock +=$productStock->qty;
								@endphp										
								@endforeach

								<td class="{{ ($totalProductStock-$totalDealerStock) <= 100 ? 'bg-danger': ''  }}">{{$totalProductStock-$totalDealerStock}}</td>
								<td><a href="{{ route('viewStocksReport', $product->id)}}">View Report</a></td>
								<td><a href="{{ route('viewOutStockReport', $product->id)}}">View Report</a></td>
								<td>
									<a href="" class="btn btn-success btn-sm">Edit</a>
									<a href="" class="btn btn-danger btn-sm">Delete</a>
								</td>
							</tr>
							@endforeach


						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>



</div>



@endsection