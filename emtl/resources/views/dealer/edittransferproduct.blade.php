@extends('dealer.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">

	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Update Transfered Product</h3>
		</div>
        <!-- /.card-header -->
        
		<!-- form start -->
		<div class="card-body">
			<form role="form" action="{{ route('transferproductUpdate', $retailer->id) }}" method="post">
				
				{{csrf_field()}}


				<div class="form-group">
					<label >Retailer Id</label>
					<input type="text" readonly name="retailerid" class="form-control" placeholder="Eg. 177001" value="{{ old('name', $retailer->retailerid) }} ">
				</div>


				<div class="form-group">
					<label >Product Name</label>
					<input type="text" readonly name="name" class="form-control" placeholder="Eg. Product 1" value="{{ old('dealerid', $retailer->name) }}">
				</div>

				<div class="form-group">
					<label >Quantity</label>
					<input type="text" name="quantity" class="form-control" placeholder="Eg. 12345" value="{{ old('address', $retailer->quantity) }}">
				</div>


				<button type="submit" class="btn btn-primary">Update</button>

				<button type="reset" class="btn btn-warning">Reset</button>

			</form>

		</div>
		<!-- /.card-body -->

	</div>


</div>



@endsection
