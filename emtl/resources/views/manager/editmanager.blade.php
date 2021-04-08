@extends('admin.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">

	@include('messages.messages')
	<div class="row">
		<div class="col-sm-4">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Add Manager</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->


				<div class="card-body">
					<form role="form" action="{{ route('managerUpdate',$manager->id) }}" method="post">

						{{csrf_field()}}


						<div class="form-group ">
							<label >Manager Name</label>
							<input type="text" name="name" class="form-control ml-2" placeholder="" value="{{old('name',$manager->name)}}">
						</div>

						<div class="form-group ">
							<label >Address</label>
							<input type="text" name="address" class="form-control ml-2" value="{{old('address',$manager->address)}}">
						</div>

						<div class="form-group ">
							<label >Phone Number</label>
							<input type="text" name="phone" class="form-control ml-2" placeholder="Eg. 900010001" value="{{old('phone',$manager->phone)}}">
						</div>


						<div class="form-group ">
							<label >Login Name</label>
							<input type="text" name="username" class="form-control ml-2" placeholder="" value="{{old('username',$manager->username)}}">
						</div>



						<div class="form-group ">
							<label >Login Password</label>
							<input type="text" name="password" class="form-control ml-2" placeholder="" value="{{old('password',$manager->password)}}">
						</div>	

						<div class="form-group ">
							<label >Confirm Password</label>
							<input type="text" name="password_confirmation" class="form-control ml-2" placeholder="" value="">
						</div>	



						<div>
							<button type="submit" class="btn btn-primary">Update</button>
						</div>

					</form>

				</div>
				<!-- /.card-body -->

			</div>

		</div>

	</div>

</div>



</div>



@endsection