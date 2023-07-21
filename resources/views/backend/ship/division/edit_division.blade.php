@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		
		<!-- Main content -->
		<section class="content">
		  <div class="row">		

			

			

<!-- ================= update division form ========================== -->
            <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Division Edit</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  
        <form method="post" action="{{route('division.update',$divisionEdit->id)}}" >
            @csrf
			
            <input type="hidden" name="id" value="{{$divisionEdit->id}}">
            

            <div class="form-group">
                <h5>Division Name<span class="text-danger">*</span></h5>
                <input type="text"  name="division_name" class="form-control" value="{{$divisionEdit->division_name}}">
				@error('division_name')
				<span class="text-danger">{{ $message }}</span>
				@enderror
            </div>        
        
            <div class="text-xs-right">
                <input type="submit" class="btn btn-success btn-rounded mb-5" value="Update Division">
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



