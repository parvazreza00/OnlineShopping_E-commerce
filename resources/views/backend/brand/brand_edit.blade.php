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
				  <h3 class="box-title">Brand Edit</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  
        <form method="post" action="{{route('brand.update',$brand->id)}}" enctype="multipart/form-data">
            @csrf
			
            <input type="hidden" name="id" value="{{ $brand->id }}">
            <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">

            <div class="form-group">
                <h5>Brand Name En<span class="text-danger">*</span></h5>
                <input type="text"  name="brand_name_en" class="form-control" value="{{$brand->brand_name_en}}">
				
            </div>        
        
            <div class="form-group">
                <h5>Brand Name Hin<span class="text-danger">*</span></h5>
                <input type="text"  name="brand_name_hin" class="form-control" value="{{$brand->brand_name_hin}}">
				
            </div>
        
            <div class="form-group">
                <h5>Brand Image<span class="text-danger">*</span></h5>
                <input type="file"  name="brand_image" class="form-control" >
				
            </div>
             
            <div class="text-xs-right">
                <input type="submit" class="btn btn-success btn-rounded mb-5" value="Update">
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



