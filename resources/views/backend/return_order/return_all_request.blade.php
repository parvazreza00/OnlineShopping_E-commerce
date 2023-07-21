@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		
		<!-- Main content -->
		<section class="content">
		  <div class="row">		

			

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">All Return Orders List
				  <span class="badge badge-pill badge-danger">{{ count($orders) }}</span>
				  </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Date</th>
								<th>Invoice</th>
								<th>Amount</th>
								<th>Payment</th>
								<th>Status</th>
								<th>Action</th>								
							</tr>
						</thead>
						<tbody>
		@foreach($orders as $item )
		<tr>			
			<td>{{ Carbon\Carbon::parse($item->order_date)->format('D, d F Y') }}</td>
            <td>{{ $item->invoice_no }}</td>
            <td>${{ $item->amount }}</td>
            <td>{{ $item->payment_method }}</td>
            <td>	
                @if($item->return_order == 1)			
			    <span class="badge badge-pill badge-primary">Pending</span>				
                @elseif($item->return_order == 2)
                <span class="badge badge-pill badge-success">Success</span>	
                @endif
			</td>
			
			<td class="text-center" width="20%">
				<span class="bg-success p-2">Return Success</span>
			</td>								
		</tr>
		@endforeach
                        </tbody>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			       
			</div>



           
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
 
  <!-- /.content-wrapper -->

@endsection



