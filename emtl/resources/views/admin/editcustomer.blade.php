@extends('admin.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">


	@include('messages.messages')

	<div class="row">
		<div class="col-lg-4">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Add Customer</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->


				<div class="card-body">
					<form role="form" class="form" action="{{ route('customerUpdate', $customer->id) }}" method="post">

						{{csrf_field()}}


						<div class="form-group ">
							<label >Customer Name</label>
							<input type="text" name="name" class="form-control ml-2" placeholder="Eg. Ram Sharma" value="{{old('name', $customer->name)}}">
						</div>




						<div class="form-group ">
							<label >Address</label>
							<input type="text" name="address" class="form-control ml-2" placeholder="Eg. Bharatpur" value="{{old('address', $customer->address)}}">
						</div>


						<div class="form-group ">
							<label >Phone Number</label>
							<input type="text" name="phone" class="form-control ml-2" placeholder="Eg. 900010001" value="{{old('phone', $customer->phone)}}">
						</div>



						
						<div class="form-group">
							<label for="exampleDropdown">Select Retailer</label>
							<select data-live-search="true" title="Please select retailer" data-live-search-placeholder="Search Product" class="form-control selectpicker" name="retailer_id">

								@foreach ($retailers as $retailer)
								<option value="{{$retailer->id}}"  @if($retailer->id==$customer->retailer_id)  selected @endif>{{$retailer->name}}</option>
								@endforeach
							</select>
						</div>


						<div>

							<button type="submit" class="btn btn-primary">Update</button>

							<button type="submit" class="btn btn-warning">Reset</button>
						</div>

					</form>

				</div>
				<!-- /.card-body -->

			</div>
		</div>
	</div>






</div>



@endsection