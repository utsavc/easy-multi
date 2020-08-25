@extends('dealer.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid ">
	<div class="row">
		<div class="col-lg-12">

			<div class="card">
				<div class="card-header">
					<h3 class="card-title font-weight-bold">Commission</h3>
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
                <th>SN</th>
                <th>DEALER NAME</th>
                <th>ITEM</th>
                <th>QTY</th>
                <th>PRICE</th>
                <th>COMMISSION AMOUNT</th>
              </tr>
            </thead>
  
            <tbody>
              <tr>
                  <td> 1 </td>
                  <td> Subash </td>
                  <td> XYZ </td>
                  <td> 5 </td>
                  <td> $100 </td>
                  <td> $12 </td>
              </tr>
            </tbody>
					</table>
				</div>
			</div>
		</div>	
	</div>
</div>


@endsection
