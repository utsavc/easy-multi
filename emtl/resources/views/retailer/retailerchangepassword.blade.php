@extends('retailer.sidebar')
@section('bodycontent')

<br>
<div class="container-fluid">

	@include('messages.messages')

	<div class="col-lg-4">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Change Password</h3>
			</div>
			<!-- /.card-header -->

			<div class="card-body">
				<!-- form start -->
				<form role="form" method="post" action="{{ route('retailerchangepassword')}}">

					@csrf

					<div class="form-group">
						<label for="exampleInputPassword1">Current Password</label>
						<input type="password" name="currentpassword" class="form-control" required id="exampleInputPassword1" >
					</div>

					<div class="form-group">
						<label for="exampleInputPassword1">New Password</label>
						<input type="password" name="newpassword" class="form-control" required id="exampleInputPassword1" >
					</div>

					
					<div class="form-group">
						<label for="exampleInputPassword1">Confirm Password</label>
						<input type="password" name="confirmpassword" class="form-control" required id="exampleInputPassword1" >
					</div>


					<button type="submit" class="btn btn-primary">Change </button>

				</form>
			</div>
			<!-- /.card-body -->

		</div>
	</div>



	

	@endsection