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
				  <h3 class="box-title">Total Admin User 
				  <span class="badge badge-pill badge-danger">{{ count($adminUser) }}</span>
				  </h3>
                  <a href="{{route('add.admin')}}" style="float:right" class="btn btn-danger">Add Admin User</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image</th>
								<th>Name</th>
								<th>Email</th>
								<th>Access</th>
								<th>Action</th>								
							</tr>
						</thead>
						<tbody>
		@foreach($adminUser as $item )
		<tr>			
			<td width="10%"><img src="{{asset($item->profile_photo_path)}}" alt="" style="width:50px;height:50px"></td>
            <td width="5%">{{ $item->name }}</td>
            <td width="10%">${{ $item->email }}</td>
            <td width="30%">
				@if($item->brand == 1)
				<span class="badge badge-primary">Brand</span>
				@else
				@endif 

				@if($item->category == 1)
				<span class="badge badge-secondary">Category</span>
				@else
				@endif 

				@if($item->product == 1)
				<span class="badge badge-success">Product</span>
				@else
				@endif 

				@if($item->slider == 1)
				<span class="badge badge-info">Slider</span>
				@else
				@endif 

				@if($item->coupons == 1)
				<span class="badge badge-danger">Coupons</span>
				@else
				@endif 

				@if($item->shipping == 1)
				<span class="badge badge-warning">Shipping</span>
				@else
				@endif 

				@if($item->blog == 1)
				<span class="badge badge-dark">Blog</span>
				@else
				@endif 

				@if($item->setting == 1)
				<span class="badge badge-primary">Setting</span>
				@else
				@endif 
				
				@if($item->returnorder == 1)
				<span class="badge badge-secondary">Return Order</span>
				@else
				@endif 

				@if($item->review == 1)
				<span class="badge badge-success">Review</span>
				@else
				@endif 

				@if($item->orders == 1)
				<span class="badge badge-info">Orders</span>
				@else
				@endif 

				@if($item->stock == 1)
				<span class="badge badge-danger">stock</span>
				@else
				@endif 

				@if($item->reports == 1)
				<span class="badge badge-warning">Reports</span>
				@else
				@endif 

				@if($item->alluser == 1)
				<span class="badge badge-dark">Alluser</span>
				@else
				@endif 

				@if($item->adminuserrole == 1)
				<span class="badge badge-success">Adminuserrole</span>
				@else
				@endif 
				
			</td>
           
			
			<td class="" width="8%">
				<a href="{{route('edit.admin.user',$item->id)}}" class="btn btn-info btn-sm" title="Edit data"><i class="fa fa-pencil"></i></a>
				<a href="{{route('delete.admin.user',$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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



