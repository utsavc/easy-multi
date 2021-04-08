@extends('admin.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">



	@include('messages.messages')

	<div class="row">
		<div class="col-lg-5">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Create Product</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form role="form" action="{{ route('createProduct') }}" method="post" autocomplete="off">

					@csrf

					<div class="card-body">
						<div class="form-group">
							<label for="exampleInputPassword1">Product Name</label>
							<input type="text" name="productname" class="form-control"  placeholder="Eg. Lg Tv">
						</div>


						<div class="form-group">
							<label for="exampleInputPassword1">MRP</label>
							<input type="text" name="mrp" class="form-control"  placeholder="Rs. 20000">
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Dealer Comission</label>
							<input type="text" name="dealerComission" class="form-control"  placeholder="5">
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Retailer Comission</label>
							<input type="text" name="retailerComission" class="form-control"  placeholder="10">
						</div>		

						<div class="form-group">
							<label for="exampleInputPassword1">Customer Comission</label>
							<input type="text" name="customerComission" class="form-control"  placeholder="2">
						</div>	

						<button type="submit" class="btn btn-primary">Create</button>

						<button type="submit" class="btn btn-warning">Reset</button>

					</div>
					<!-- /.card-body -->

				</form>
			</div>
		</div>
		<div class="col-lg-4"></div>
	</div>


	@if(!$products->isEmpty())

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
						<th data-field="email" >MRP</th>
						<th data-field="phone" >Dealer Comission</th>
						<th data-field="complete">Retailer Comission</th>
						<th data-field="completes">Customer Comission</th>
						<th data-field="completess">Remarks</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($products as $product)

					<tr>
						
						<td>{{ $loop->iteration }}</td>
						<td>{{$product->productname}}</td>
						<td>{{$product->mrp}}</td>
						<td>{{$product->dealerComission}}</td>
						<td>{{$product->retailerComission}}</td>
						<td>{{$product->customerComission}}</td>
						<td>
							<a href="{{route('productEdit',$product->id)}}" class="btn btn-success btn-sm">Edit</a>
							<form class="form-inline d-inline" method="post" action="{{route('productDelete',$product->id)}}" onclick="return confirm('Are you sure you want to Disable this customer?');">
								@csrf
								<button type="submit" class="btn btn-danger btn-sm">{{ $product->status =='inactive' ? 'Enable': 'Disable'}}</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	@endif

</div>





@endsection