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
			  <h4 class="box-title">Add Product</h4>
			</div>
			<!-- /.box-header -->
<div class="box-body">
    <div class="row">
    <div class="col">

        <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
            @csrf

            <div class="row">
            <div class="col-12">	
                
            <div class="row"> <!--first row started-->
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Brand Select <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="brand_id" class="form-control" required="">
                                <option value="" selected="" disabled="">Select Brand</option>
                                @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->brand_name_en}}</option>
                                @endforeach                    
                            </select> 
                            @error('brand_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror               
                    </div>
                    </div>  
                </div> <!-- end col-md-4 -->

                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Category Select <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="category_id" class="form-control" required="">
                                <option value="" selected="" disabled="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name_en}}</option>
                                @endforeach                    
                            </select> 
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror               
                    </div>
                    </div>  

                </div> <!-- end col-md-4 -->

                <div class="col-md-4">
                    <div class="form-group">
                        <h5>SubCategory Select <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="subcategory_id" class="form-control" required="">
                                <option value="" selected="" disabled="">Select SubCategory</option>
                                                
                            </select> 
                            @error('subcategory_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror               
                    </div>
                    </div>  

                </div> <!-- end col-md-4 -->
            </div> <!-- First row end -->

            <div class="row"><!-- 2nd row started -->
                <div class="col-md-4">
                <div class="form-group">
                    <h5>Sub-SubCategory Select <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="subsubcategory_id" class="form-control" required="">
                            <option value="" selected="" disabled="">Select SubSubCategory</option>
                                               
                        </select> 
                        @error('subsubcategory_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror               
                    </div>
                    </div>  

                </div> <!-- end col-md-4 -->

                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Product Name En <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="product_name_en" class="form-control" required=""> </div>
                            @error('product_name_en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
                    </div>

                </div> <!-- end col-md-4 -->

                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Product Name Hin <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="product_name_hin" class="form-control" required=""> </div>
                            @error('product_name_hin')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
                    </div> 

                </div> <!-- end col-md-4 -->
                

            </div> <!--2nd row end -->

            <div class="row"><!-- 3rd row started -->
                <div class="col-md-4">
                    <div class="form-group">
                            <h5>Product Code <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="product_code" class="form-control" required=""> </div>
                                @error('product_code')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror 
                        </div>

                </div> <!-- end col-md-4 -->

                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Product Quantity <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="product_qty" class="form-control" required=""> </div>
                            @error('product_qty')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
                    </div>

                </div> <!-- end col-md-4 -->

                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Product Tags En <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="product_tags_en" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" placeholder="add tags" required=""> </div>
                            @error('product_tags_en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
                    </div> 

                </div> <!-- end col-md-4 -->
                

            </div> <!--3rd row end -->

            <div class="row"><!-- 4th row started -->
                <div class="col-md-4">
                <div class="form-group">
                        <h5>Product Tags Hin <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="product_tags_hin" class="form-control" value="लोरेम, इप्सम, आमेट" data-role="tagsinput" placeholder="add tags" required=""> </div>
                            @error('product_tags_hin')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
                    </div> 

                </div> <!-- end col-md-4 -->

                <div class="col-md-4">
                <div class="form-group">
                        <h5>Product Size En <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="product_size_en" class="form-control" value="small,medium,large" data-role="tagsinput" placeholder="add tags" required=""> </div>
                            @error('product_size_en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
                    </div> 

                </div> <!-- end col-md-4 -->

                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Product Size Hin <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="product_size_hin" class="form-control" value="छोटा, मध्यम, बड़ा" data-role="tagsinput" placeholder="add tags" required=""> </div>
                            @error('product_size_hin')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
                    </div> 

                </div> <!-- end col-md-4 -->
                

            </div> <!--4th row end -->

            <div class="row"><!-- 5th row started -->
                <div class="col-md-4">
                <div class="form-group">
                        <h5>Product Color En <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="product_color_en" class="form-control" value="red, green, blue" data-role="tagsinput" placeholder="add tags" required=""> </div>
                            @error('product_color_en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
                    </div> 

                </div> <!-- end col-md-4 -->

                <div class="col-md-4">
                <div class="form-group">
                        <h5>Product Color Hin<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="product_color_hin" class="form-control" value="लाल, हरा, नीला" data-role="tagsinput" placeholder="add tags" required=""> </div>
                            @error('product_color_hin')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
                    </div> 

                </div> <!-- end col-md-4 -->

                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Product Prize <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="selling_prize" class="form-control"  placeholder="" required=""> </div>
                            @error('selling_prize')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
                    </div> 

                </div> <!-- end col-md-4 -->
                

            </div> <!--5th row end -->

            <div class="row"><!-- 6th row started -->
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Product Discount prize<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="discount_prize" class="form-control"  placeholder="" required=""> </div>
                            @error('discount_prize	')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
                    </div> 

                </div> <!-- end col-md-4 -->

                <div class="col-md-4">
                <div class="form-group">
                        <h5>Product Main Thumbnail <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="file" name="product_thumbnail" class="form-control" onChange="mainThamUrl(this)" required=""> </div>
                            @error('product_thumbnail')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
                            <img src="" id="mainThmb">
                    </div> 

                </div> <!-- end col-md-4 -->

                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Product Multiple Img <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg" required=""> </div>
                            @error('multi_img')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
                            <div class="row" id="preview_img"> </div>
                    </div> 

                </div> <!-- end col-md-4 -->
                

            </div> <!--6th row end -->

            <div class="row"><!-- 7th row started -->
                <div class="col-md-6">
                    <div class="form-group">
                        <h5>Short Desc En<span class="text-danger">*</span></h5>
                        <div class="controls">
                        <textarea name="short_desc_en" id="textarea" class="form-control" required placeholder="Short Description..." required=""></textarea> </div>                            
                    </div> 

                </div> <!-- end col-md-4 -->

                <div class="col-md-6">
                    <div class="form-group">
                        <h5>Short Desc Hin<span class="text-danger">*</span></h5>
                        <div class="controls">
                        <textarea name="short_desc_hin" id="textarea" class="form-control" required placeholder="Short Description..." required=""></textarea> </div> 
                    </div> 

                </div> <!-- end col-md-4 -->

            </div> <!--7th row end -->

            <div class="row"><!-- 8th row started -->
                <div class="col-md-6">
                    <div class="form-group">
                        <h5>Long Desc En<span class="text-danger">*</span></h5>
                        <div class="controls">
                        <textarea id="editor1" name="long_desc_en" rows="10" cols="80" required="">
						This is my long description...
						</textarea> </div>                            
                    </div> 

                </div> <!-- end col-md-4 -->

                <div class="col-md-6">
                    <div class="form-group">
                        <h5>Long Desc Hin<span class="text-danger">*</span></h5>
                        <div class="controls">
                        <textarea id="editor2" name="long_desc_hin" rows="10" cols="80" required="">
						यह मेरा लंबा वर्णन है...
						</textarea> </div> 
                    </div> 

                </div> <!-- end col-md-4 -->

            </div> <!--8th row end -->
                
               <hr> 
        
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">                        
                        <div class="controls">
                            <fieldset>
                                <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                                <label for="checkbox_2">Hot deals</label>
                            </fieldset>
                            <fieldset>
                                <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                <label for="checkbox_3">Featured</label>
                            </fieldset>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">                        
                        <div class="controls">
                            <fieldset>
                                <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                <label for="checkbox_4">Special offer</label>
                            </fieldset>
                            <fieldset>
                                <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                <label for="checkbox_5">Special deals</label>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <h5>Digital Product <span class="text-danger">pdf,xlx,csv*</span></h5>
                        <div class="controls">
                        <input type="file" name="file" class="form-control"> 
                        </div>
                            
                    </div> 
            </div> <!-- end col-md-6 -->
            
            
            <div class="text-xs-right" style="text-align:center">
            <input type="submit" class="btn btn-success btn-rounded mb-5" value="Add Product">
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
		<!-- /.content -->
	  </div>

      <script type="text/javascript">
    $(document).ready(function(){
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id){
                $.ajax({
                    url: "{{ url('/category/subcategory/ajax')}}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success: function(data){
                        $('select[name="subsubcategory_id"]').html('');
                        var d=$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>')
                        });
                    },
                });
            }else{
                alert('danger');
            }
        });

        $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id){
                $.ajax({
                    url: "{{ url('/category/sub-subcategory/ajax')}}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success: function(data){
                        var d=$('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>')
                        });
                    },
                });
            }else{
                alert('danger');
            }
        });

    });

  </script>

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

<script> 
 $(document).ready(function(){
  $('#multiImg').on('change', function(){ //on file input change
     if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
     {
         var data = $(this)[0].files; //this file data
          
         $.each(data, function(index, file){ //loop though each file
             if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                 var fRead = new FileReader(); //new filereader
                 fRead.onload = (function(file){ //trigger function on successful read
                 return function(e) {
                     var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                 .height(80); //create image element 
                     $('#preview_img').append(img); //append image to output element
                 };
                 })(file);
                 fRead.readAsDataURL(file); //URL representing the file's data.
             }
         });
          
     }else{
         alert("Your browser doesn't support File API!"); //if File API is absent
     }
  });
 });
  
 </script>



@endsection



