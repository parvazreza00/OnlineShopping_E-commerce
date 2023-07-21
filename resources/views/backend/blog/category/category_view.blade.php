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
				  <h3 class="box-title">Blog Category List
				  <span class="badge badge-pill badge-danger">{{ count($blogCategory) }}</span>
				  </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>								
								<th>Blog Category En</th>
								<th>Blog Category Hin</th>
								<th>Action</th>								
							</tr>
						</thead>
						<tbody>
		@foreach($blogCategory as $item )
		<tr>			
			<td>{{ $item->blog_category_name_en}}</td>
            <td>{{ $item->blog_category_name_hin}}</td>
			
			<td class="text-center" >
				<a href="{{route('blog.category.edit',$item->id)}}" class="btn btn-info btn-sm" title="Edit Category"><i class="fa fa-pencil"></i></a>
				<a href="{{route('blog.category.delete',$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="Delete Category"><i class="fa fa-trash"></i></a>
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


<!-- ================= add blog Category page ========================== -->
            <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Blog Category Add</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  
        <form method="post" action="{{route('blogcategory.store')}}">

            @csrf

            <div class="form-group">
                <h5>Blog Category Name English<span class="text-danger">*</span></h5>
                <input type="text" name="blog_category_name_en" class="form-control" >
				@error('blog_category_name_en')
				<span class="text-danger">{{ $message }}</span>
				@enderror
            </div>        
        
            <div class="form-group">
                <h5>Blog Category Name Hindi<span class="text-danger">*</span></h5>
                <input type="text"  name="blog_category_name_hin" class="form-control" >
				@error('blog_category_name_hin')
				<span class="text-danger">{{ $message }}</span>
				@enderror
            </div>
             
            <div class="text-xs-right">
                <input type="submit" class="btn btn-success btn-rounded mb-5 btn-block" value="Add Blog Category">
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



