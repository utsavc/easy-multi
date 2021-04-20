@extends('dealer.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">


	@include('messages.messages')


	<div class="row">

		<div class="col-lg-4">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Search</h3>
				</div>

				<form role="form" method="post" action="{{route('dealerstockReport')}}">
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

						<button type="submit" class="btn btn-primary">Search</button>

					</div>

				</form>

			</div>
		</div>


	</div>




</div>




@endsection