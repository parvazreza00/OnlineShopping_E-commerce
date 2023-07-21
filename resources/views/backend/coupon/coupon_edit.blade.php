@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		
		<!-- Main content -->
		<section class="content">
		  <div class="row">		

			

			

<!-- ================= brand data insertion form ========================== -->
            <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Coupon Edit</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  
        <form method="post" action="{{route('coupon.update',$couponEdit->id)}}" >
            @csrf
			
            <input type="hidden" name="id" value="{{$couponEdit->id}}">
            

            <div class="form-group">
                <h5>Coupon Name<span class="text-danger">*</span></h5>
                <input type="text"  name="coupon_name" class="form-control" value="{{$couponEdit->coupon_name}}">
				@error('coupon_name')
				<span class="text-danger">{{ $message }}</span>
				@enderror
            </div>        
        
            <div class="form-group">
                <h5>Coupon Discount(%)<span class="text-danger">*</span></h5>
                <input type="text"  name="coupon_discount" class="form-control" value="{{$couponEdit->coupon_discount}}">
                @error('coupon_discount')
				<span class="text-danger">{{ $message }}</span>
				@enderror
				
            </div>
        
            <div class="form-group">
                <h5>Coupon Validity<span class="text-danger">*</span></h5>
                <input type="date"  name="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{$couponEdit->coupon_validity}}">	
                @error('coupon_validity')
				<span class="text-danger">{{ $message }}</span>
				@enderror			
            </div>
             
            <div class="text-xs-right">
                <input type="submit" class="btn btn-success btn-rounded mb-5" value="Update Coupon">
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



