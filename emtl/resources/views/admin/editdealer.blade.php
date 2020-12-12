@extends('admin.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">


	@include('messages.messages')



	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Add Dealer</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->


		<div class="card-body">
			<form role="form" class="form-inline" action="{{ route('dealerUpdate', $dealer->id) }}" method="post">
				
				{{csrf_field()}}


				<div class="input-group mr-2">
					<label >Dealer Name</label>
					<input type="text" name="name" class="form-control ml-2" placeholder="Eg. ABC Traders" value="{{ old('name', $dealer->name) }} ">
				</div>


				<div class="input-group mr-2">
					<label >Dealer Id</label>
					<input type="text" name="dealerid" class="form-control ml-2" placeholder="Eg. 1002345" value="{{ old('dealerid', $dealer->dealerid) }}">
				</div>

				<div class="input-group mr-2">
					<label >Address</label>
					<input type="text" name="address" class="form-control ml-2" placeholder="Eg. Bharatpur" value="{{ old('address', $dealer->address) }}">
				</div>

				<div class="m-5"></div>



				<div class="form-group mr-2">
					<label >Phone Number</label>
					<input type="text" name="phone" class="form-control ml-2" placeholder="Eg. 900010001" value="{{ old('phone', $dealer->phone) }}">
				</div>		


				<div class="form-group mr-2">
					<label >Email</label>
					<input type="email" name="email" class="form-control ml-2" placeholder="Eg. abc@mail.com" value="{{ old('email', $dealer->email) }}">
				</div>



				<div>

					<button type="submit" class="btn btn-primary">Create</button>

					<button type="submit" class="btn btn-warning">Reset</button>
				</div>

			</form>

		</div>
		<!-- /.card-body -->

	</div>


</div>

















@endsection