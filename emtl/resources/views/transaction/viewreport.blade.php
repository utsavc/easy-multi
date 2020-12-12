@extends('retailer.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">


	@include('messages.messages')

	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">Details</h3>
		</div>

		<div class="card-body">

			
			<div class="row">
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box">
						<span class="info-box-icon bg-info elevation-1"><i class="nav-icon fas fa-money-bill-alt "></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Balance Amount</span>
							<span class="info-box-number">
								{{$balance}}
							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				

				
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Balance in Group</span>
							<span class="info-box-number">{{$balance}}</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->


				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-success elevation-1"><i class="fas fa-upload"></i></span>

						<div class="info-box-content">
							<a href="{{route('transfer')}}" class="btn btn-primary">Transfer</a>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
			</div>		
		</div>
		
	</div>


	<nav>
		<div class="nav nav-tabs" id="nav-tab" role="tablist">
			<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Deposits</a>
			<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Withdrawls</a>
		</div>
	</nav>

	<div class="m-1"></div>

	<div class="tab-content" id="nav-tabContent">
		<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

			@if(!$deposit->isEmpty())
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Customer Deposits</h3>	
				</div>


				<div class="card-body">
					<div class="datatable-dashv1-list custom-datatable-overright">
						
						<table id="table" data-toggle="table" data-pagination="true" data-search="true"  data-show-pagination-switch="true"  data-cookie="true"
						data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
						<thead>
							<tr>
								<th data-field="id">SN</th>
								<th data-field="date">Date</th>
								<th data-field="name" >amount</th>
							</tr>
						</thead>
						<tbody>
							
							@foreach ($deposit as $deposits)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ date('m-d-Y',strtotime($deposits->created_at)) }}</td>
								<td>{{ $deposits->amount }}</td>
							</tr>
							@endforeach


						</tbody>

					</table>
				</div>
			</div>
		</div>
		@else
		<div class="bg-info p-4">	
			No Records
		</div>
		@endif
	</div>


	<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

		@if(!$withdraw->isEmpty())
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Customer Withdrawls</h3>
			</div>


			<div class="card-body">
				<div class="datatable-dashv1-list custom-datatable-overright">
					<div id="toolbar">
					</div>
					<table id="table" data-toggle="table" data-pagination="true" data-search="true"  data-show-pagination-switch="true"  data-cookie="true"
					data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
					<thead>
						<tr>
							<th data-field="id">SN</th>
							<th data-field="date">Date</th>
							<th data-field="name" >amount</th>
						</tr>
					</thead>
					<tbody>

						@foreach ($withdraw as $withdraws)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ date('m-d-Y',strtotime($withdraws->created_at)) }}</td>
							<td>{{ $withdraws->amount }}</td>
						</tr>
						@endforeach


					</tbody>
				</table>
			</div>
		</div>
	</div>
	@else
	
	<div class="bg-info p-4">	
		No Records
	</div>
	@endif




</div>
</div>






</div>
</div>



</div>



@endsection