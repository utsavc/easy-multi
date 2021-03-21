@extends('retailer.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">


	@include('messages.messages')


	<div class="row">
		<div class="col-lg-4">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Search</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form role="form" action="{{ route('purchasereport') }}" method="post" autocomplete="off">

					@csrf
					<div class="card-body">

						<div class="form-group">
							<label for="exampleDropdown">Select Member</label>
							<select data-live-search="true" title="Select Member" data-live-search-placeholder="Search Product" class="form-control selectpicker" name="customer_id">

								@foreach ($customers as $customer)
								<option value="{{$customer->id}}" >{{$customer->name}} - {{$customer->id}}</option>
								@endforeach


							</select>
						</div>						
						<button type="submit" class="btn btn-primary">Search</button>
						<button type="reset" class="btn btn-warning">Reset</button>
					</div>
					<!-- /.card-body -->
				</form>
			</div>
		</div>

	</div>
</div>



</div>



@endsection