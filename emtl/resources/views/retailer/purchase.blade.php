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
				<h3 class="card-title">Purchase Product</h3>
			</div>
			<!-- /.card-header -->

			<div class="card-body">
				<!-- form start -->
				<form role="form" method="post" action="{{ route('purchase')}}">

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
						<input name="product_name" class="form-control" required >
					</div>


					<div class="form-group">
						<label for="exampleInputPassword1">Product Price</label>						
						<input name="amount" class="form-control" required >
					</div>


					<div class="form-group">
						<label for="exampleInputPassword1">Quantity</label>
						<input type="text" name="quantity" class="form-control" required  placeholder="Eg. 12345">
					</div>


					<button type="submit" class="btn btn-primary">Purchase</button>
				
				</form>
			</div>
			<!-- /.card-body -->

		</div>
	</div>



	

@endsection