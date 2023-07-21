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
				  <h3 class="box-title">Category Edit</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  
        <form method="post" action="{{route('category.update',$category->id)}}" >
            @csrf
			
            <input type="hidden" name="id" value="{{$category->id}}">
            

            <div class="form-group">
                <h5>Category Name En<span class="text-danger">*</span></h5>
                <input type="text"  name="category_name_en" class="form-control" value="{{$category->category_name_en}}">
				
            </div>        
        
            <div class="form-group">
                <h5>Category Name Hin<span class="text-danger">*</span></h5>
                <input type="text"  name="category_name_hin" class="form-control" value="{{$category->category_name_hin}}">
				
            </div>
        
            <div class="form-group">
                <h5>Category Icon<span class="text-danger">*</span></h5>
                <input type="text"  name="category_icon" class="form-control" value="{{$category->category_icon}}">				
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



