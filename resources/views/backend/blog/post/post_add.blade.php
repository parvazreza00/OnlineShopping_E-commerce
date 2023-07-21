@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="container-full">
<!-- Content Header (Page header) -->			  
<!-- Main content -->
<section class="content">
   <!-- Basic Forms -->
   <div class="box">
   <div class="box-header with-border">
      <h4 class="box-title">Add Blog Post</h4>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
   <div class="row">
   <div class="col">
      <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
         @csrf
         <div class="row">
            <div class="col-12">
               <div class="row">
                  <!-- 2nd row started -->
                  <div class="col-md-6">
                     <div class="form-group">
                        <h5>Post Title En <span class="text-danger">*</span></h5>
                        <div class="controls">
                           <input type="text" name="post_title_en" class="form-control" required=""> 
                        </div>
                        @error('post_title_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror 
                     </div>
                  </div>
                  <!-- end col-md-6 -->
                  <div class="col-md-6">
                     <div class="form-group">
                        <h5>Post Title Hin <span class="text-danger">*</span></h5>
                        <div class="controls">
                           <input type="text" name="post_title_hin" class="form-control" required=""> 
                        </div>
                        @error('post_title_hin')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror 
                     </div>
                  </div>
                  <!-- end col-md-6 -->
               </div>
               <!--2nd row end -->
               <div class="row">
                  <!-- 6th row started -->
                  <div class="col-md-6">
                     <div class="form-group">
                        <h5>BlogCategory Select <span class="text-danger">*</span></h5>
                        <div class="controls">
                           <select name="category_id" class="form-control" required="">
                              <option value="" selected="" disabled="">Select BlogCategory</option>
                              @foreach($blogCategory as $category)
                              <option value="{{$category->id}}">{{$category->blog_category_name_en}}</option>
                              @endforeach                 
                           </select>
                           @error('category_id')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror               
                        </div>
                     </div>
                  </div>
                  <!-- end col-md-6 -->
                  <div class="col-md-6">
                     <div class="form-group">
                        <h5>Post Main Image<span class="text-danger">*</span></h5>
                        <div class="controls">
                           <input type="file" name="post_image" class="form-control" onChange="mainThamUrl(this)" required=""> 
                        </div>
                        @error('post_image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror 
                        <img src="" id="mainThmb">
                     </div>
                  </div>
                  <!-- end col-md-6 -->
               </div>
               <!--6th row end -->
               <div class="row">
                  <!-- 8th row started -->
                  <div class="col-md-6">
                     <div class="form-group">
                        <h5>Post Details En<span class="text-danger">*</span></h5>
                        <div class="controls">
                           <textarea id="editor1" name="post_details_en" rows="10" cols="80" required="">
                           This is my long description...
                           </textarea> 
                        </div>
                     </div>
                  </div>
                  <!-- end col-md-4 -->
                  <div class="col-md-6">
                     <div class="form-group">
                        <h5>Post Details Hin<span class="text-danger">*</span></h5>
                        <div class="controls">
                           <textarea id="editor2" name="post_details_hin" rows="10" cols="80" required="">
                           यह मेरा लंबा वर्णन है...
                           </textarea> 
                        </div>
                     </div>
                  </div>
                  <!-- end col-md-4 -->
               </div>
               <!--8th row end -->
               <hr>
               <div class="text-xs-right" style="text-align:center">
                  <input type="submit" class="btn btn-success btn-rounded mb-5 btn-block" value="Add Post">
               </div>
      </form>
      </div>
      <!-- /.box-body -->
      </div>
      <!-- /.box -->
</section>
<!-- /.content -->
</div>

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

  
 </script>



@endsection



