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
					<form role="form" action="{{ route('createManager') }}" method="post">

						{{csrf_field()}}


						<div class="form-group ">
							<label >Manager Name</label>
							<input type="text" name="name" class="form-control ml-2" placeholder="" value="{{old('name')}}">
						</div>

						<div class="form-group ">
							<label >Address</label>
							<input type="text" name="address" class="form-control ml-2" value="{{old('address')}}">
						</div>

						<div class="form-group ">
							<label >Phone Number</label>
							<input type="text" name="phone" class="form-control ml-2" placeholder="Eg. 900010001" value="{{old('phone')}}">
						</div>


						<div class="form-group ">
							<label >Login Name</label>
							<input type="text" name="username" class="form-control ml-2" placeholder="" value="{{old('name')}}">
						</div>



						<div class="form-group ">
							<label >Login Password</label>
							<input type="password" name="password" class="form-control ml-2" placeholder="" value="{{old('name')}}">
						</div>	

						<div class="form-group ">
							<label >Confirm Password</label>
							<input type="password" name="password_confirmation" class="form-control ml-2" placeholder="" value="{{old('name')}}">
						</div>	

						<input type="hidden" name="role" value="manager">


						<div>
							<button type="submit" class="btn btn-primary">Create</button>
						</div>

					</form>

				</div>
				<!-- /.card-body -->

			</div>

		</div>

		<div class="col-sm-8">
			<div class="card card-info">
				<div class="card-header">
					<h3 class="card-title font-weight-bold">List of Manager</span></h3>
				</div>
				<div class="card-body">
					<div class="datatable-dashv1-list custom-datatable-overright">
						<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
						data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
						<thead>
							<tr>
								<th data-field="id">SN</th>
								<th data-field="name" >Name</th>
								<th data-field="names" >Address</th>
								<th data-field="email" >Username</th>
								<th data-field="remarks" >Remarks</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($managers as $manager)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{$manager->name}}</td>
								<td>{{$manager->address}}</td>
								<td>{{$manager->username}}</td>
								<td>
									<a href="{{ route('managerEdit',['id' => $manager->id]) }}" class="btn btn-success btn-sm">Edit</a>

									<form class="form-inline d-inline" method="post" action="{{ route('managerDelete', $manager->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">
										@csrf
										<button type="submit" class="btn btn-danger btn-sm">Delete</button>
									</form>
								</td>
							</tr>
							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>

</div>



</div>



@endsection