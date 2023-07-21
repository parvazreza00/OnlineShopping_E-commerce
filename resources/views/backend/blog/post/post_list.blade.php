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
				  <h3 class="box-title">Blog Post List
				  <span class="badge badge-pill badge-danger">{{ count($blogPost) }}</span></h3>              
				  
                  <a href="{{ route('add.post') }}" class="btn btn-success btn-rounded" style="float:right;">Add Post</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>								
								<th>Post Category </th>
								<th>Post Image</th>
								<th>Post Title En</th>
								<th>Post Title Hin</th>
								<th>Action</th>								
							</tr>
						</thead>
						<tbody>
		@foreach($blogPost as $item )
		<tr>			
			<td>{{ $item->blocPostCategory->blog_category_name_en}}</td>
            <td><img src="{{ asset($item->post_image) }}" style="width:60xp;height:60px" alt=""></td>
            <td>{{ $item->post_title_en }}</td>
            <td>{{ $item->post_title_hin }}</td>
			
			<td class="text-center" >
				<a href="{{route('post.edit',$item->id)}}" class="btn btn-info btn-sm" title="Edit post"><i class="fa fa-pencil"></i></a>
				<a href="{{route('post.delete',$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="Delete Category"><i class="fa fa-trash"></i></a>
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



