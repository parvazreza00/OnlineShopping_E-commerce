@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


<!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		
		<!-- Main content -->
		<section class="content">
		  <div class="row">		

			

			

<!-- ================= Add district form ========================== -->
            <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">State Edit</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  
        <form method="post" action="{{route('state.update',$state->id)}}">

            @csrf
            <input type="hidden" id="{{$state->id}}">

            <div class="form-group">
                <h5>Division Select <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="division_id" class="form-control" >
                        <option value="" selected="" disabled="">Select Division</option>
                        @foreach($division as $div)
                        <option value="{{$div->id}}" {{$div->id == $state->division_id ? 'selected' : '' }}>{{$div->division_name}}</option>
                        @endforeach                    
                    </select>
                    @error('division_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
            <h5>District Select <span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="district_id" class="form-control" >
                    <option value="" selected="" disabled="">Select District</option>
                        @foreach($district as $dis)
                        <option value="{{$dis->id}}" {{$dis->id == $state->district_id ? 'selected' : '' }}>{{$dis->district_name}}</option>
                        @endforeach             
                </select>
                @error('district_id')
				<span class="text-danger">{{ $message }}</span>
				@enderror
            </div>
            </div>

            

            <div class="form-group">
                <h5>State Name<span class="text-danger">*</span></h5>
                <input type="text"  name="state_name" class="form-control" value="{{$state->state_name}}">
				@error('state_name')
				<span class="text-danger">{{ $message }}</span>
				@enderror
            </div>        
    
            <div class="text-center">
                <input type="submit" class="btn btn-success btn-rounded mb-5" value="Update State">
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

  <script type="text/javascript">
    $(document).ready(function(){
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            if(division_id){
                $.ajax({
                    url: "{{ url('/shipping/district/ajax')}}/"+division_id,
                    type:"GET",
                    dataType:"json",
                    success: function(data){
                        var d=$('select[name="district_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>')
                        });
                    },
                });
            }else{
                alert('danger');
            }
        });
    });

  </script>

@endsection



