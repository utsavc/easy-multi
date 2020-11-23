@extends('admin.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">


	<!-- Displaying Error Messages-->
	@if ($errors->any())
	<div class="alert alert-danger alert-dismissible fade show" role="alert">		
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</div>
	@endif

	
	@if ($message = Session::get('success'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">		
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>{{ $message }}</strong>
	</div>
	@endif

	<div class="row">
		<div class="col-lg-4">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Add Customer</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->


				<div class="card-body">
					<form role="form" class="form" action="{{ url('admin/user/add-customer') }}" method="post">

						{{csrf_field()}}


						<div class="form-group ">
							<label >Customer Name</label>
							<input type="text" name="name" class="form-control ml-2" placeholder="Eg. Ram Sharma" value="{{old('name')}}">
						</div>




						<div class="form-group ">
							<label >Address</label>
							<input type="text" name="address" class="form-control ml-2" placeholder="Eg. Bharatpur" value="{{old('address')}}">
						</div>

						<div class="form-group ">
							<label >Phone Number</label>
							<input type="text" name="phone" class="form-control ml-2" placeholder="Eg. 900010001" value="{{old('phone')}}">
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
	</div>




	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title font-weight-bold">List of Dealers</h3>
		</div>
		<div class="card-body">
			<div class="datatable-dashv1-list custom-datatable-overright">
				<div id="toolbar">
					<select class="form-control dt-tb">
						<option value="">Export Basic</option>
						<option value="all">Export All</option>
						<option value="selected">Export Selected</option>
					</select>
				</div>

				<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true"  data-resizable="true" data-cookie="true"
				data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
				<thead>
					<tr>
						<th>SN</th>
						<th>Dealer Name</th>
						<th>Dealer Id</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Remarks</th>
					</tr>
				</thead>
				<tbody>

					
				</tbody>
			</table>
		</div>
	</div>
</div>


</div>



@endsection