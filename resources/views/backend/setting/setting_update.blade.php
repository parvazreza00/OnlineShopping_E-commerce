@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="container-full">
<section class="content">
   <!-- Basic Forms -->
   <div class="box">
   <div class="box-header with-border">
      <h4 class="box-title">Site Setting page</h4>
      
   </div>
   <!-- /.box-header -->
   <div class="box-body">
      <div class="row">
         <div class="col-md-12">
            

              
                  

               <form method="post" action="{{route('update.sitesetting',$setting->id)}}"  enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                        <input type="hidden" id="id" value="{{$setting->id}}">

                        <div class="col-md-6">
                           <div class="form-group">
                              <h5>Site Logo<span class="text-danger">*</span></h5>
                              <input type="file" name="logo" class="form-control">
                           </div>
                           </div>
                       
                        
                           <div class="col-md-6">
                           <div class="form-group">
                              <h5>Phone One<span class="text-danger">*</span></h5>
                              <input type="text" name="phone_one" class="form-control" value="{{ $setting->phone_one }}">
                           </div>
                           </div>
                        
                        
                           <div class="col-md-6">
                           <div class="form-group">
                              <h5>Phone Two<span class="text-danger">*</span></h5>
                              <input type="text" name="phone_two" class="form-control" value="{{ $setting->phone_two }}">
                           </div>
                           </div>
                         
                           <div class="col-md-6">
                            <div class="form-group">
                              <h5>Email<span class="text-danger">*</span></h5>
                              <input type="email" name="email" class="form-control" value="{{ $setting->email }}">
                           </div>                            
                           </div>

                           <div class="col-md-6">
                            <div class="form-group">
                              <h5>Company Name<span class="text-danger">*</span></h5>
                              <input type="text" name="company_name" class="form-control" value="{{ $setting->company_name }}">
                           </div>                            
                           </div>

                           <div class="col-md-6">
                            <div class="form-group">
                              <h5>Company Address<span class="text-danger">*</span></h5>
                              <input type="text" name="company_address" class="form-control" value="{{ $setting->company_address }}">
                           </div>                            
                           </div>

                           <div class="col-md-6">
                            <div class="form-group">
                              <h5>Facebook<span class="text-danger">*</span></h5>
                              <input type="text" name="facebook" class="form-control" value="{{ $setting->facebook }}">
                           </div>                            
                           </div>

                           <div class="col-md-6">
                            <div class="form-group">
                              <h5>Twitter<span class="text-danger">*</span></h5>
                              <input type="text" name="twitter" class="form-control" value="{{ $setting->twitter }}">
                           </div>                            
                           </div>

                           <div class="col-md-6">
                            <div class="form-group">
                              <h5>Linkedin<span class="text-danger">*</span></h5>
                              <input type="text" name="linkedin" class="form-control" value="{{ $setting->linkedin }}">
                           </div>                            
                           </div>

                        <div class="col-md-6">
                            <div class="form-group">
                              <h5>Youtube<span class="text-danger">*</span></h5>
                              <input type="text" name="youtube" class="form-control" value="{{ $setting->youtube }}">
                           </div>                            
                           </div>

                     <div class="col-md-12">
                    <input type="submit" class="btn btn-success btn-rounded mb-5 btn-block m-auto" style="width:50%" value="Update Site">
                    </div>

            
                  </div>
                  
            </div>
            </form>
            <!-- /.col -->
            </div>
            <!-- /.row -->
         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
</section>
</div>

@endsection