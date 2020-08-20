@extends('layouts.app')

@extends('admin.sidebar')

@section('bodycontent')

<br>
<div class="container-fluid">

	<div class="row">

		<div class="col-lg-2"></div>

		<div class="col-lg-8">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Add Retailer</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form role="form">
					<div class="card-body">

						<div class="form-group">
							<label for="exampleInputPassword1">Retailer Name</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Eg. ABC Traders">
						</div>


						<div class="form-group">
							<label for="exampleInputPassword1">Retailer Id</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Eg. 1002345">
						</div>



						<div class="form-group">
							<label for="exampleInputPassword1">Dealer Id</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Eg. 10101">
						</div>



						<div class="form-group">
							<label for="exampleInputPassword1">Address</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Eg. Bharatpur">
						</div>



						<div class="form-group">
							<label for="exampleInputPassword1">Phone Number</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Eg. 900010001">
						</div>		


						<button type="submit" class="btn btn-primary">Create</button>

						<button type="submit" class="btn btn-warning">Reset</button>

					</div>
					<!-- /.card-body -->

				</form>
			</div>
		</div>


		<div class="col-lg-2"></div>

	</div>



</div>





@endsection