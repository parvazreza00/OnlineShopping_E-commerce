@extends('admin.admin_master')
@section('admin')

<div class="container-full">
<section class="content">
   <!-- Basic Forms -->
   <div class="box">
   <div class="box-header with-border">
      <h3 class="box-title">Seo Setting page</h3>
      
   </div>
   <!-- /.box-header -->
   <div class="box-body">
      <div class="row">
         <div class="col-md-12">
           

               <form method="post" action="{{route('update.seoSetting',$seo->id)}}" >
                        @csrf

                        <input type="hidden" id="id" value="{{$seo->id}}">

                        <div class="row">

                           <div class="col-md-6">
                           <div class="form-group">
                              <h5>Meta Title<span class="text-danger">*</span></h5>
                              <input type="text" name="meta_title" class="form-control" value="{{ $seo->meta_title }}">
                           </div>
                           </div>
                           <div class="col-md-6"></div>
                        
                        
                           <div class="col-md-6">
                           <div class="form-group">
                              <h5>Meta Author<span class="text-danger">*</span></h5>
                              <input type="text" name="meta_author" class="form-control" value="{{ $seo->meta_author }}">
                           </div>
                           </div>
                           <div class="col-md-6"></div>
                         
                           <div class="col-md-6">
                            <div class="form-group">
                              <h5>Meta Keyword<span class="text-danger">*</span></h5>
                              <input type="text" name="meta_keyword" class="form-control" value="{{ $seo->meta_keyword }}">
                           </div>                            
                           </div>
                           <div class="col-md-6"></div>

                           <div class="col-md-6">
                           <div class="form-group">
    <h5>Meta Description<span class="text-danger">*</span></h5>
    <div class="controls">
        <textarea name="meta_description" id="textarea" class="form-control" placeholder="Short Description..." >
        {{$seo->meta_description}}
        </textarea> 
    </div> 
                            </div>                          
                           </div>
                           <div class="col-md-6"></div>

                           <div class="col-md-6">
                           <div class="form-group">
    <h5>Google Analytics<span class="text-danger">*</span></h5>
    <div class="controls">
        <textarea name="google_analytics" id="textarea" class="form-control" placeholder="Short Description..." >
        {{$seo->google_analytics}}
        </textarea> 
    </div> 
                            </div>                          
                           </div>
                           <div class="col-md-6"></div>
                    

                     <div class="col-md-12">
                    <input type="submit" class="btn btn-success btn-rounded mb-5 btn-block" style="width:50%" value="Update Seo">
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