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
				  <h3 class="box-title">Division List
				  <span class="badge badge-pill badge-danger">{{ count($divisions) }}</span>
				  </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Division Name</th>								
								<th>Action</th>								
							</tr>
						</thead>
						<tbody>
		@foreach($divisions as $item )
		<tr>			
			<td>{{ $item->division_name}}</td>           
			
			<td class="text-center" width="40%">
				<a href="{{route('division.edit',$item->id)}}" class="btn btn-info btn-sm" title="Edit division"><i class="fa fa-pencil"></i></a>
				<a href="{{route('division.delete',$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="Delete division"><i class="fa fa-trash"></i></a>
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


<!-- ================= Add division form ========================== -->
            <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Division Add</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  
        <form method="post" action="{{route('division.store')}}">

            @csrf

            <div class="form-group">
                <h5>Division Name<span class="text-danger">*</span></h5>
                <input type="text"  name="division_name" class="form-control" >
				@error('division_name')
				<span class="text-danger">{{ $message }}</span>
				@enderror
            </div>        
    
            <div class="text-center">
                <input type="submit" class="btn btn-success btn-rounded mb-5" value="Add Division">
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



