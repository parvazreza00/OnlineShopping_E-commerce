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
				  <h3 class="box-title">SubCategory Edit</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  
        <form method="post" action="{{route('subcategory.update',$subcategory->id)}}" >
            @csrf
			
            <input type="hidden" name="id" value="{{$subcategory->id}}">
            

            <div class="form-group">
            <h5>Category Select <span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="category_id" class="form-control" >
                    <option value="" selected="" disabled="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }} >{{$category->category_name_en}}</option>
                    @endforeach                    
                </select>                
            </div>
            </div>        
        
            <div class="form-group">
                <h5>SubCategory Name En<span class="text-danger">*</span></h5>
                <input type="text"  name="subcategory_name_en" class="form-control" value="{{$subcategory->subcategory_name_en}}">
				
            </div>

            <div class="form-group">
                <h5>SubCategory Name Hin<span class="text-danger">*</span></h5>
                <input type="text"  name="subcategory_name_hin" class="form-control" value="{{$subcategory->subcategory_name_hin}}">
				
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



