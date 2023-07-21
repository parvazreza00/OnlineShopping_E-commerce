@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		
		<!-- Main content -->
		<section class="content">
		  <div class="row">		

			

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Coupon List
				  <span class="badge badge-pill badge-danger">{{ count($coupons) }}</span>
				  </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Coupon Name</th>
								<th>Coupon Discount</th>
								<th>Coupon Validity</th>
								<th>Status</th>
								<th>Action</th>								
							</tr>
						</thead>
						<tbody>
		@foreach($coupons as $item )
		<tr>			
			<td>{{ $item->coupon_name}}</td>
            <td>{{ $item->coupon_discount}}%</td>
            <td>{{ Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y') }}</td>
            <td>
				@if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
				<span class="badge badge-pill badge-success">Valid</span>
				@else
				<span class="badge badge-pill badge-danger">Invalid</span>
				@endif
			</td>
			
			<td class="text-center" width="20%">
				<a href="{{route('coupon.edit',$item->id)}}" class="btn btn-info btn-sm" title="Edit Coupon"><i class="fa fa-pencil"></i></a>
				<a href="{{route('coupon.delete',$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="Delete coupon"><i class="fa fa-trash"></i></a>
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


<!-- ================= Category data insertion form ========================== -->
            <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Coupon Add</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  
        <form method="post" action="{{route('coupon.store')}}">

            @csrf

            <div class="form-group">
                <h5>Coupon Name<span class="text-danger">*</span></h5>
                <input type="text"  name="coupon_name" class="form-control" >
				@error('coupon_name')
				<span class="text-danger">{{ $message }}</span>
				@enderror
            </div>        
        
            <div class="form-group">
                <h5>Coupon Discount(%)<span class="text-danger">*</span></h5>
                <input type="text"  name="coupon_discount" class="form-control" >
				@error('coupon_discount')
				<span class="text-danger">{{ $message }}</span>
				@enderror
            </div>

            <div class="form-group">
                <h5>Coupon Validity Date<span class="text-danger">*</span></h5>
                <input type="date"  name="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
				@error('coupon_validity')
				<span class="text-danger">{{ $message }}</span>
				@enderror
            </div>
    
            <div class="text-center">
                <input type="submit" class="btn btn-success btn-rounded mb-5" value="Add Coupon">
            </div>                        

		</form>

					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			       
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
 
  <!-- /.content-wrapper -->

@endsection



