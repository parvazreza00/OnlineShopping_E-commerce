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
				  <h3 class="box-title">District Edit</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  
        <form method="post" action="{{ route('district.update',$district->id)}}" >
            @csrf
			
            <input type="hidden" name="id" value="{{$district->id}}">
            

            <div class="form-group">
                <h5>Division Select <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="division_id" class="form-control" >
                        <option value="" selected="" disabled="">Select Division</option>
                        @foreach($division as $div)
                        <option value="{{$div->id}}" {{$div->id == $district->division_id ? 'selected' : '' }}>{{$div->division_name}}</option>
                        @endforeach                    
                    </select>
                    @error('division_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <h5>District Name<span class="text-danger">*</span></h5>
                <input type="text"  name="district_name" class="form-control" value="{{$district->district_name}}">
				@error('district_name')
				<span class="text-danger">{{ $message }}</span>
				@enderror
            </div>      
        
            <div class="text-xs-right">
                <input type="submit" class="btn btn-success btn-rounded mb-5" value="Update District">
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



