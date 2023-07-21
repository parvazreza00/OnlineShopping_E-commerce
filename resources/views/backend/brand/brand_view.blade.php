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
				  <h3 class="box-title">Brand List
				  <span class="badge badge-pill badge-danger">{{ count($brands) }}</span>
				  </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Brand En</th>
								<th>Brand Hin</th>
								<th>Image</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
		@foreach($brands as $item )
		<tr>
			<td>{{ $item->brand_name_en}}</td>
			<td>{{ $item->brand_name_hin}}</td>
			<td><img src="{{asset($item->brand_image)}}" style="width:70px;height:40px"></td>
			<td class="text-center">
				<a href="{{route('brand.edit',$item->id)}}" class="btn btn-info btn-sm" title="Edit data"><i class="fa fa-pencil"></i></a>
				<a href="{{route('brand.delete',$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="Delete data"><i class="fa fa-trash"></i></a>
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


<!-- ================= brand data insertion form ========================== -->
            <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Brand List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  
        <form method="post" action="{{route('brand.store')}}" enctype="multipart/form-data">

            @csrf
					  	
            <div class="form-group">
                <h5>Brand Name En<span class="text-danger">*</span></h5>
                <input type="text"  name="brand_name_en" class="form-control" >
				@error('brand_name_en')
				<span class="text-danger">{{ $message }}</span>
				@enderror
            </div>        
        
            <div class="form-group">
                <h5>Brand Name Hin<span class="text-danger">*</span></h5>
                <input type="text"  name="brand_name_hin" class="form-control" >
				@error('brand_name_hin')
				<span class="text-danger">{{ $message }}</span>
				@enderror
            </div>
        
            <div class="form-group">
                <h5>Brand Image<span class="text-danger">*</span></h5>
                <input type="file"  name="brand_image" class="form-control" >
				@error('brand_image')
				<span class="text-danger">{{ $message }}</span>
				@enderror
            </div>
             
            <div class="text-xs-right">
                <input type="submit" class="btn btn-success btn-rounded mb-5" value="Add New">
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



