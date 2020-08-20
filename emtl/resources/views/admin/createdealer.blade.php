@extends('layouts.app')

@extends('admin.sidebar')

@section('bodycontent')

<div class="container-fluid mt-2">

	<div class="row">

		<div class="col-lg-1"></div>

		<div class="col-lg-8">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Add Dealer</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form role="form">
					<div class="card-body">

						<div class="form-group">
							<label for="exampleInputPassword1">Dealer Name</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Eg. ABC Traders">
						</div>


						<div class="form-group">
							<label for="exampleInputPassword1">Dealer Id</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Eg. 1002345">
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


		<div class="col-lg-3"></div>

	</div>



</div>





@endsection