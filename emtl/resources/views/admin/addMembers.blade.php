@extends('admin.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">

	@include('admin.messages')

	
	<div class="row">
		<div class="col-lg-4">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Add Members</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form role="form" action="{{ route('addMembers') }}" method="post" autocomplete="off">

					@csrf
					<div class="card-body">

						<div class="form-group">
							<label for="exampleDropdown">Select Member</label>
							<select data-live-search="true" title="Select Member" data-live-search-placeholder="Search Product" class="form-control selectpicker" name="customer_id">


								@foreach ($customers as $customer)
								<option value="{{$customer->id}}">{{$customer->name}}</option>
								@endforeach

								
							</select>
						</div>

						<div class="form-group">
							<label for="exampleDropdown">Select Group</label>
							<select data-live-search="true" title="Please select Group" data-live-search-placeholder="Search Member" class="form-control selectpicker" name="group_id">	

								@foreach ($groups as $group)
								<option value="{{$group->id}}">{{$group->name}}</option>
								@endforeach

							</select>
						</div>

						

						<!--
						<div class="form-group">
							<label >Date</label>
							<input type="text" class="form-control"  placeholder="">
						</div>-->

						
						<button type="submit" class="btn btn-primary">Create</button>
						<button type="submit" class="btn btn-warning">Reset</button>
					</div>
					<!-- /.card-body -->
				</form>
			</div>
		</div>

	</div>
</div>



</div>



@endsection