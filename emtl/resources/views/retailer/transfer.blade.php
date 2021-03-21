@extends('retailer.sidebar')
<?php
$y = date('Y', time()); //Getting Year
$m = date('m', time()); //Getting Month
$d = date('d', time()); //Getting Day
include(app_path().'/includes/nepali-date.php'); //Including library
$date = new nepali_date;
$date = $date->get_nepali_date($y, $m, $d);
$currentdate= $date['y'].'-'.$date['m'].'-'.$date['d']; //Formatting Date
?>

@section('bodycontent')

<br>
<div class="container-fluid">

	@include('messages.messages')

	<div class="col-lg-4">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Sell Product</h3>
			</div>
			<!-- /.card-header -->

			<div class="card-body">
				<!-- form start -->
				<form role="form" method="post" action="{{ route('sale')}}">

					@csrf

					<div class="form-group">
						<label for="exampleInputPassword1">Customer</label>
						
						<select name="customer_id" class="form-control" required >
							@if (count($customers) > 0)
								@foreach ($customers as $customer)
									<option value="{{ $customer->id }}">{{ $customer->id." - ".$customer->name }}</option>
								@endforeach
							@endif
						</select>
					</div>

					<input type="hidden" name="retailer_id" value="{{session('session_id')}}">

					
					<div class="form-group">
						<label for="exampleInputPassword1">Product Name</label>

						
						<select name="product_id" class="form-control" required >
						@if (count($products) > 0)
							@foreach ($products as $product)
								<option value="{{ $product->product_id }}">{{ $product->product->productname }}</option>
							@endforeach
						@endif
						</select>
						
					</div>


					<div class="form-group">
						<label for="exampleInputPassword1">Quantity</label>
						<input type="text" name="qty" class="form-control" required  placeholder="Eg. 12345">
					</div>

					<!--<div class="form-group">
						<label for="exampleInputPassword1">Amount</label>
						<input type="text" name="amount" class="form-control" required  placeholder="Eg. Rs.5000">
					</div>-->


					<button type="submit" class="btn btn-primary">Sell to Customer</button>

					<button type="reset" class="btn btn-warning">Reset</button>
				
				</form>
			</div>
			<!-- /.card-body -->

		</div>
	</div>



	

@endsection