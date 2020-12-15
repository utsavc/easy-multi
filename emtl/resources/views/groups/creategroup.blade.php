@extends('retailer.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">

	@include('messages.messages')

	<div class="row">

		<div class="col-lg-4">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Create Group</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form role="form" method="post" action="{{route('createGroup')}}">
					@csrf
					<div class="card-body">

						<input type="hidden" name="retailer_id" value="{{$retailers->id}}">					

						<div class="form-group">
							<label for="exampleInputEmail1">Group Name</label>
							<input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Group">
						</div>

						<button type="submit" class="btn btn-primary">Create</button>

						<button type="submit" class="btn btn-warning">Reset</button>

					</div>
					<!-- /.card-body -->

				</form>
			</div>
		</div>

		<div class="col-lg-8">			

			<div class="card">
				<div class="card-header">
					<h3 class="card-title font-weight-bold">Group Lists</h3>
				</div>
				<div class="card-body">
					<div class="datatable-dashv1-list custom-datatable-overright">

						<table id="table" data-toggle="table" data-pagination="true">
							<thead>
								<tr>
									<th data-field="id">SN</th>
									<th>Group Name</th>
									<th>Retaile Name</th>
									<th >Details</th>
								</tr>
							</thead>
							<tbody>

								@foreach ($groups as $group)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{$group->name}}</td>
									<td>{{$group->retailer->name}}</td>
									<td><a href="{{route('groupDetails',$group->id)}}">View Details</a></td>
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