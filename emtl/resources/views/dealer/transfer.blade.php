@extends('dealer.sidebar')
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
				<h3 class="card-title">Transfer Product</h3>
			</div>
			<!-- /.card-header -->

			<div class="card-body">
				<!-- form start -->
				<form role="form" method="post" action="transfertoretailer">

					@csrf

					<div class="form-group">
						<label for="exampleInputPassword1">Retailer Id</label>
						
						<select name="retailer_id" class="form-control" required id="exampleInputPassword1">
							@if (count($retailers) > 0)
								@foreach ($retailers as $retailer)
									<option value="{{ $retailer->id }}">{{ $retailer->id." - ".$retailer->name }}</option>
								@endforeach
							@endif
						</select>
					</div>

					<input type="hidden" name="dealer_id" value="{{session('session_id')}}">

					
					<div class="form-group">
						<label for="exampleInputPassword1">Product Name</label>
						
						<select name="product_id" class="form-control" required id="exampleInputPassword1">
						@if (count($products) > 0)
							@foreach ($products as $product)
								<option value="{{ $product->product_id }}">{{ $product->product->productname }}</option>
							@endforeach
						@endif
						</select>
					</div>


					<div class="form-group">
						<label for="exampleInputPassword1">Quantity</label>
						<input type="text" name="qty" class="form-control" required id="exampleInputPassword1" placeholder="Eg. 12345">
					</div>


					<button type="submit" class="btn btn-primary">Transfer</button>

					<button type="reset" class="btn btn-warning">Reset</button>
				
				</form>
			</div>
			<!-- /.card-body -->

		</div>
	</div>



	

@endsection