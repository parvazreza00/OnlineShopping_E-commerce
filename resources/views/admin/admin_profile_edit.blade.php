@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="container-full">

<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Admin Profile</h4>
			  <h4 style="float:right"><a class="btn btn-success btn-rounded" href="{{route('admin.profile')}}">Home Profile</a></h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
                        @csrf

					  <div class="row">
						<div class="col-12">	
                            
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Admin Name<span class="text-danger">*</span></h5>
                                    <input type="name" name="name" class="form-control" value="{{$editData->name}}">
                                </div>

                            </div> <!--end first col  --> 

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Admin Email<span class="text-danger">*</span></h5>
                                    <input type="email" name="email" class="form-control" value="{{$editData->email}}">
                                </div>
                            </div><!--end second col  --> 
                        </div>   <!--first row-->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Admin Image<span class="text-danger">*</span></h5>
                                    <input type="file" class="form-control" name="profile_photo_path" id="image">
                                </div>

                            </div> <!--end first col  --> 

                            <div class="col-md-6">
                                <div class="form-group">
                                   <img id="showImage" src="{{ 
                                    (!empty($editData->profile_photo_path))? url('upload/admin_images/'.$editData->profile_photo_path): url('upload/no_image.jpg')
                                
                                }}" alt="" style="width:100px;height:100px">
                                </div>
                            </div><!--end second col  --> 
                        </div> 
   
				
						<div class="text-xs-right">
                            <input type="submit" class="btn btn-success btn-rounded mb-5" value="Update Profile">
						</div>

                        

					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>



</div>


<script type="text/javascript">

$(document).ready(function(){
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});


</script>


@endsection