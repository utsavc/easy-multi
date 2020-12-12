@extends('admin.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">
	@include('messages.messages')

	<div class="row">

		<div class="col-lg-4">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Create User</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form role="form">
					<div class="card-body">

						<div class="form-group">
							<label>Select User Type</label>
							<select class="form-control">
								<option>Retailer</option>
								<option>Dealer</option>
							</select>
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1">Username</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username">
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Re-type Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div>






						<button type="submit" class="btn btn-primary">Create</button>

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