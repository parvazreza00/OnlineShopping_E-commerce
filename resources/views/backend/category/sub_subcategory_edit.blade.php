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
				  <h3 class="box-title">Sub-SubCategory Edit</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  
        <form method="post" action="{{route('subsubcategory.update',$subsubcategories->id)}}" >
            @csrf
			
            <input type="hidden" name="id" value="{{$subsubcategories->id}}">
            

            <div class="form-group">
            <h5>Category Select <span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="category_id" class="form-control" >
                    <option value="" selected="" disabled="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ $category->id == $subsubcategories->category_id ? 'selected' : '' }} >{{$category->category_name_en}}</option>
                    @endforeach                    
                </select> 
                @error('category_id')
				        <span class="text-danger">{{ $message }}</span>
				        @enderror               
            </div>
            </div>    
            
            <div class="form-group">
            <h5>SubCategory Select <span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="subcategory_id" class="form-control" >
                    <option value="" selected="" disabled="">Select SubCategory</option>
                    @foreach($subcategories as $subcategory)
                    <option value="{{$subcategory->id}}" {{ $subcategory->id == $subsubcategories->subcategory_id ? 'selected' : '' }} >{{$subcategory->subcategory_name_en}}</option>
                    @endforeach             
                </select>
                @error('subcategory_id')
				<span class="text-danger">{{ $message }}</span>
				@enderror
            </div>
        </div>
        
        <div class="form-group">
                <h5>Sub-SubCategory Name En<span class="text-danger">*</span></h5>
                <input type="text"  name="subsubcategory_name_en" class="form-control" value="{{ $subsubcategories->subsubcategory_name_en }}" >
				@error('subsubcategory_name_en')
				<span class="text-danger">{{ $message }}</span>
				@enderror
            </div>        
        
            <div class="form-group">
                <h5>Sub-SubCategory Name Hin<span class="text-danger">*</span></h5>
                <input type="text"  name="subsubcategory_name_hin" class="form-control" value="{{ $subsubcategories->subsubcategory_name_hin }}" >
				@error('subsubcategory_name_hin')
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



