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
				<form role="form" action="{{ route('productUpdate',$product->id) }}" method="post" autocomplete="off">

					@csrf

					<div class="card-body">
						<div class="form-group">
							<label for="exampleInputPassword1">Product Name</label>
							<input type="text" name="productname" class="form-control"  value="{{old('productname', $product->productname)}}">
						</div>


						<div class="form-group">
							<label for="exampleInputPassword1">MRP</label>
							<input type="text" name="mrp" class="form-control"  value="{{old('mrp', $product->mrp)}}">
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Dealer Comission</label>
							<input type="text" name="dealerComission" class="form-control"  value="{{old('dealerComission', $product->dealerComission)}}">
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Retailer Comission</label>
							<input type="text" name="retailerComission" class="form-control"  value="{{old('retailerComission', $product->retailerComission)}}">
						</div>		

						<div class="form-group">
							<label for="exampleInputPassword1">Customer Comission</label>
							<input type="text" name="customerComission" class="form-control"  value="{{old('customerComission', $product->customerComission)}}">
						</div>	

						<button type="submit" class="btn btn-primary">Update</button>

						<button type="submit" class="btn btn-warning">Reset</button>

					</div>
					<!-- /.card-body -->

				</form>
			</div>
		</div>
		<div class="col-lg-4"></div>
	</div>

</div>





@endsection