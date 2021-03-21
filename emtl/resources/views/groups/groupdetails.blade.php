@extends('retailer.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">
	<h4>Details of {{$group->name}}</h4>
	<div class="row">
		<div class="col-lg-5">

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
						{{$groupDeposit}}
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
						{{$groupDeposit-$usedFromGroup}}
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

				@foreach ($customerGroup as $customergroup)
				@foreach ($customers as $customer)

				@if ($customergroup->customer_id==$customer->id)
				<li>{{$customer->name}}</li>

				@endif
				@endforeach
				@endforeach



			</ol>
		</div>
	</div>			

</div>


</div>


</div>





@endsection