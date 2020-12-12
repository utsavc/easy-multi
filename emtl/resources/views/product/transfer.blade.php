@extends('admin.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">
	@include('messages.messages')

	<div class="row">

		<div class="col-lg-4">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Transfer Product to Dealer</h3>
				</div>
				<!-- /.card-header -->


				<!-- form start -->
				<form role="form" method="post" action="{{route('dealerTransfer')}}">
					@csrf
					<div class="card-body">
						<!--
						<div class="form-group">
							<label for="exampleInputPassword1">Date</label>
							<input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
						</div>-->		
						
						<div class="form-group">
							<label for="exampleDropdown">Select Product</label>
							<select data-live-search="true" title="Please select product" data-live-search-placeholder="Search Product" class="form-control selectpicker" name="product_id">

								@foreach ($products as $product)
								<option value="{{$product->id}}">{{$product->productname}}</option>
								@endforeach
							</select>
						</div>


						<div class="form-group">
							<label for="exampleInputPassword1">Quantity</label>
							<input type="text" name="qty" class="form-control" id="exampleInputPassword1" placeholder="Eg. 100">
						</div>

						
						<div class="form-group">
							<label for="exampleDropdown">Select Dealer</label>
							<select data-live-search="true" title="Please select dealer" data-live-search-placeholder="Search Dealer" class="form-control selectpicker" name="dealer_id">

								@foreach ($dealers as $dealer)
								<option value="{{$dealer->id}}">{{$dealer->name}}</option>
								@endforeach
							</select>
						</div>

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
					<h3 class="card-title font-weight-bold">Recent Transfer Reports</h3>
				</div>
				<div class="card-body">
					<div class="datatable-dashv1-list custom-datatable-overright">

						<table id="table" data-toggle="table" data-pagination="true">
							<thead>
								<tr>
									<th data-field="id">SN</th>
									<th data-field="name" >Date</th>
									<th>Dealer Name</th>
									<th data-field="email" >Quanity</th>
								</tr>
							</thead>
							<tbody>

								@foreach ($dealerStocks as $dealerStock)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>

										@php
										$dt = new DateTime($dealerStock->created_at);
										echo $dt->format('Y-m-d');
										@endphp
									</td>
									<td>{{$dealerStock->dealer->name}}</td>
									<td>{{$dealerStock->qty}}</td>
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