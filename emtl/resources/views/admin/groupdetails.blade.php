@extends('admin.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">
	<h4>Details of {{$group->name}}</h4>
	<div class="row">
		<div class="col-lg-6">

			<div class="info-box">
				<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Members</span>
					<span class="info-box-number">
						
						{{$customerGroup->count()}} Members 

						
						<button class="btn btn-info btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
							See Members
						</button>
					</span>
				</div>
				<!-- /.info-box-content -->
			</div>
		</div>



		<div class="col-lg-3">
			<div class="info-box">
				<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Total Deposit Amount</span>
					<span class="info-box-number">
						10,000/-
					</span>
				</div>
				<!-- /.info-box-content -->
			</div>
		</div>


		<div class="col-lg-3">
			<div class="info-box">
				<span class="info-box-icon bg-success elevation-1"><i class="fa fa-balance-scale" aria-hidden="true"></i>
				</span>

				<div class="info-box-content">
					<span class="info-box-text">Balance</span>
					<span class="info-box-number">
						3000
					</span>
				</div>
				<!-- /.info-box-content -->
			</div>
		</div>
	</div>


	<div class="collapse" id="collapseExample">
		<div class="card card-body">
			<h4>Members</h4>
			<ol>
				@foreach ($customerGroup as $customers)
				<li >{{$customers->customer[0]->name}}</li>
				@endforeach







			</ol>
		</div>
	</div>

			<!--
			<div class="col-lg-8">		

				<div class="card">
					<div class="card-header">
						<h3 class="card-title font-weight-bold">Showing Group Details
						</h3>
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
							<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
							data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
							<thead>
								<tr>
									<th data-field="id">SN</th>
									<th data-field="name" >Date</th>
									<th>Dealer Name</th>
									<th data-field="email" >Quanity</th>
								</tr>
							</thead>
							<tbody>


							</tbody>
						</table>
					</div>
				</div>
			</div>-->


		</div>


	</div>


</div>





@endsection