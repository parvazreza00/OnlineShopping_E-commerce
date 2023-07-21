@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


<!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		
		<!-- Main content -->
		<section class="content">
		  <div class="row">		


            <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Blog Post Edit</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  
          <form method="post" action="{{route('post.update',$blogPost->id)}}" enctype="multipart/form-data">
            @csrf
			
            <input type="hidden" name="id" value="{{ $blogPost->id }}">
            <input type="hidden" name="old_image" value="{{ $blogPost->post_image }}">
			
            

            <div class="form-group">
                        <h5>BlogCategory Select <span class="text-danger">*</span></h5>
                        <div class="controls">
                           <select name="category_id" class="form-control" required="">
                              <option value="" selected="" disabled="">Select BlogCategory</option>
                              @foreach($blogCategory as $category)
                              <option value="{{$category->id}}" {{ $category->id == $blogPost->category_id ? 'selected' : '' }}>{{$category->blog_category_name_en}}</option>
                              @endforeach                 
                           </select>
                           @error('category_id')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror               
                        </div>
                     </div> 

            <div class="form-group">
                <h5>Post Title En<span class="text-danger">*</span></h5>
                <input type="text"  name="post_title_en" class="form-control" value="{{$blogPost->post_title_en}}">
                @error('post_title_en')
                <span class="text-danger">{{ $message }}</span>
                 @enderror
				
            </div>   
            
            <div class="form-group">
                <h5>Post Title Hin<span class="text-danger">*</span></h5>
                <input type="text"  name="post_title_hin" class="form-control" value="{{$blogPost->post_title_hin}}">
                @error('post_title_hin')
                <span class="text-danger">{{ $message }}</span>
                 @enderror
				
            </div>  
            
            <div class="form-group">
                  <h5>Post Main Image<span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="file" name="post_image" class="form-control" onChange="mainThamUrl(this)"> 
                  </div>
                  @error('post_image')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror 
                  <img src="" id="mainThmb">
            </div>

              <div class="row"><!-- 8th row started -->
                <div class="col-md-6">
                    <div class="form-group">
                        <h5>Post Details En<span class="text-danger">*</span></h5>
                        <div class="controls">
                        <textarea id="editor1" name="post_details_en" rows="10" cols="80" required="">
                        {!! $blogPost->post_details_en !!}
						            </textarea> </div>                            
                    </div> 

                </div> <!-- end col-md-4 -->

                <div class="col-md-6">
                    <div class="form-group">
                        <h5>Post Details Hin<span class="text-danger">*</span></h5>
                        <div class="controls">
                        <textarea id="editor2" name="post_details_hin" rows="10" cols="80" required="">
                        {!! $blogPost->post_details_hin !!}
                        </textarea> </div> 
                    </div> 

                </div> <!-- end col-md-4 -->

            </div> <!--8th row end -->
                
               <hr> 
        
            
             
            <div class="text-xs-right">
                <input type="submit" class="btn btn-success btn-rounded mb-5 btn-block" value="Blog Post Update">
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
    function mainThamUrl(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThmb').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
  </script>

@endsection



