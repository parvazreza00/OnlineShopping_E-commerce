@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		
		<!-- Main content -->
		<section class="content">
		  <div class="row">		

			

			

<!-- ================= Slider data edit ========================== -->
            <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Slider Edit</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  
        <form method="post" action="{{route('slider.update')}}" enctype="multipart/form-data">
            @csrf
			
            <input type="hidden" name="id" value="{{ $sliders->id }}">
            <input type="hidden" name="old_image" value="{{ $sliders->slider_img }}">

            <div class="form-group">
                <h5>Slider Title<span class="text-danger">*</span></h5>
                <input type="text"  name="title" class="form-control" value="{{$sliders->title}}">
				
            </div>        
        
            <div class="form-group">
                <h5>Slider Description<span class="text-danger">*</span></h5>
                <input type="text"  name="desc" class="form-control" value="{{$sliders->desc}}">
				
            </div>
        
            <div class="form-group">
                <h5>Slider Image<span class="text-danger">*</span></h5>
                <input type="file"  name="slider_img" class="form-control" >
                @error('slider_img')
				<span class="text-danger">{{ $message }}</span>
				@enderror
				
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



