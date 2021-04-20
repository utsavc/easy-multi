@extends('retailer.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid ">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">Showing List of Products</h3>
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
                                <th data-field>Purchase Id</th>
                                <th data-field="name" >Comission amount</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($commissions as $comission)


                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$comission->purchase_id}}</td>
                                <td>{{$comission->comission_amount}}</td>
                            </tr>

                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>    
    </div>
</div>





@endsection