@extends('admin.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">

	@include('messages.messages')

	<div class="row">
		<div class="col-lg-4">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Add to Stock</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form role="form" action="{{ route('updateStock',$productStocks->id) }}" method="post" autocomplete="off">

					@csrf
					<div class="card-body">

						<div class="form-group">
							<label for="exampleDropdown">Select Product</label>
							<select data-live-search="true" title="Please select product" data-live-search-placeholder="Search Product" class="form-control selectpicker" name="product_id">

								@foreach ($products as $product)
								<option value="{{$productStocks->id}}"  @if($product->id==$productStocks->product_id)  selected @endif  >{{$product->productname}}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label >Qty</label>
							<input type="text" name="qty" class="form-control" value="{{$productStocks->qty}}"  placeholder="Eg. 10">
						</div>

						<!--
						<div class="form-group">
							<label >Date</label>
							<input type="text" class="form-control"  placeholder="">
						</div>-->

						
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
					<!-- /.card-body -->
				</form>
			</div>
		</div>
</div>



</div>



@endsection