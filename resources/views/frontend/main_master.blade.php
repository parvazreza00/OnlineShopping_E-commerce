<!DOCTYPE html>
<html lang="en">
   @php
      $seo = App\Models\Seo::find(1);
   @endphp
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="{{$seo->meta_description}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="{{$seo->meta_author}}">
<meta name="keywords" content="{{$seo->meta_keyword}}">
<meta name="robots" content="all">
<!-- /// Google Analytics Code // -->
<script>
    {{ $seo->google_analytics }}
</script>
<!-- /// Google Analytics Code // -->
<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/blue.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.css')}}">
<!-- toastr css -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >


<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- payment script -->
<script src="https://js.stripe.com/v3/"></script>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/echo.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('frontend/assets/js/lightbox.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/scripts.js')}}"></script>

<!-- sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- toastr js -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>

<!-- start Add to card Modal -->
<div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span></strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row">

         <div class="col-md-4">
            <div class="card" style="width: 18rem;">
            <img src="" class="card-img-top" alt="..." style="width:200px;height:200px" id="pimage">
            
            </div>
         </div>
         <div class="col-md-4">
            <ul class="list-group">
               <li class="list-group-item">Product Prize: <strong class="text-danger">$<span id="pprice"></span></strong>
               <del class="text-danger" id="oldprice" >$</del>
               </li>
               <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
               <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
               <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
               <li class="list-group-item">Stock: <span class="badge badge-success badge-pill" style="color:white" id="available"></span>
               <span class="badge badge-danger badge-pill" style="background:danger;color:white" id="stockout"></span>
            </li>
            </ul>
         </div>
         <div class="col-md-4">

            <div class="form-group">
               <label for="color">Choose Color</label>
               <select class="form-control" id="color" name="color">
                                    
               </select>
            </div>
            <div class="form-group" id="sizeArea">
               <label for="size">Choose Size</label>
               <select class="form-control" id="size" name="size">
                                    
               </select>
            </div>
            <div class="form-group">
               <label for="qty">Quantity</label>
               <input type="number" class="form-control" id="qty" value="1" min="1">
            </div>
            <input type="hidden" id="product_id">
            <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()">Add to cart</button>

         </div>

        </div>

      </div>      
    </div>
  </div>
</div>

<script type="text/javascript">
   $.ajaxSetup({
      headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
   });
   //product view with modal
   function productView(id){
      // alert(id)
      $.ajax({
         type:'GET',
         url:'/product/view/modal/'+id,
         dataType:'json',
         success:function(data){
            // console.log(data);
            $('#pname').text(data.product.product_name_en);
            $('#pprice').text(data.product.selling_prize);
            $('#pcode').text(data.product.product_code);
            $('#pcategory').text(data.product.category.category_name_en);
            $('#pbrand').text(data.product.brand.brand_name_en);
            $('#pimage').attr('src','/' +data.product.product_thumbnail);

            $('#product_id').val(id);
            $('#qty').val(1);

            //color
            $('select[name="color"]').empty();
            $.each(data.color,function(key,value){
               $('select[name="color"]').append('<option value="'+value+'">'+value+' </option>')
               
            })//end color

            //product price
            if(data.product.discount_prize == null){
               $('#pprice').text('');
               $('#oldprice').text('');
               $('#pprice').text(data.product.selling_prize);
            }else{
               $('#pprice').text(data.product.discount_prize);
               $('#oldprice').text(data.product.selling_prize);

            }//end product price

            //product stock
            if(data.product.product_qty > 0){
               $('#available').text('');
               $('#stockout').text('');
               $('#available').text('Available');
            }else{
               $('#available').text('');
               $('#stockout').text('');
               $('#stockout').text('Stockout');
            }

            //size
            $('select[name="size"]').empty();
            $.each(data.size,function(key,value){
               $('select[name="size"]').append('<option value="'+value+'">'+value+' </option>');

               if(data.size == ""){
                  $('#sizeArea').hide();
               }else{
                  $('#sizeArea').show();
               }
            })//end size
         }
      })
   }
   //end product view with modal

   //start add to cart product
   function addToCart(){
      var product_name = $('#pname').text();
      var id = $('#product_id').val();
      var color = $('#color option:selected').text();
      var size = $('#size option:selected').text();
      var qty = $('#qty').val();

      $.ajax({
         type:'POST',
         url:"/cart/data/store/"+id,
         dataType: 'json',
         data:{
            color:color, 
            size:size, 
            qty:qty, 
            product_name:product_name,
         },
         success:function(data){
            miniCart();
            $('#closeModal').click();
            // console.log(data)

            // start message
            const Toast = Swal.mixin({
                  toast:true,
                  position: 'top-end',
                  icon: 'success',                  
                  showConfirmButton: false,
                  timer: 3000
               })
               if($.isEmptyObject(data.error)){
                  Toast.fire({
                     type:'success',
                     title: data.success                     
                  })
               }else{
                  Toast.fire({
                     type:'error',
                     title: data.error
                  })
               }

            // end message
         }
      })
      
   }
   //end add to cart product
</script>

<script>
   function miniCart(){
      $.ajax({
         type:"GET",
         dataType:"json",
         url: "/product/mini/cart",
         success:function(response){
            $('span[id="cartSubtotal"]').text(response.cartTotal);
            $('#cartQty').text(response.cartsQty);
            var miniCart = ""
            // console.log(response);
            $.each(response.carts,function(key,value){

               miniCart += `<div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                      <div class="price">${value.price} * ${value.qty}</div>
                    </div>
                    <div class="col-xs-1 action"> 
                        <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> 
                    </div>
                  </div>
                </div>`

            });
            $('#miniCart').html(miniCart);
         },
      });
   }

   miniCart()

   // mini cart remove start
   
   function miniCartRemove(rowId){
      $.ajax({
         type: "GET",
         dataType:"json",
         url:"/minicart/product-remove/"+rowId,
         success:function(data){
            miniCart();

            // start message
            const Toast = Swal.mixin({
                  toast:true,
                  position: 'top-end',
                  icon: 'success',                  
                  showConfirmButton: false,
                  timer: 3000
               })
               if($.isEmptyObject(data.error)){
                  Toast.fire({
                     type:'success',
                     title: data.success                     
                  })
               }else{
                  Toast.fire({
                     type:'error',
                     title: data.error
                  })
               }

            // end message
         
         },
      });
   }
   
   
   // mini cart remove end
   
</script>

<!-- wishlist page start -->
<script>
   function addToWishtlist(product_id){
      $.ajax({
         type:"POST",
         dataType:"json",
         url:"/add-to-wishlist/"+product_id,
         success:function(data){

            // start message
            const Toast = Swal.mixin({
                  toast:true,
                  position: 'top-end',                                    
                  showConfirmButton: false,
                  timer: 3000
               })
               if($.isEmptyObject(data.error)){
                  Toast.fire({
                     type:'success',
                     icon: 'success',
                     title: data.success                     
                  })
               }else{
                  Toast.fire({
                     type:'error',
                     icon: 'error',
                     title: data.error
                  })
               }

            // end message

         }
      });
   }
</script>


<!-- wishlist page end -->

<!-- load wish list data page start -->
<script>
function wishlist(){
      $.ajax({
         type:"GET",
         dataType:"json",
         url: "/user/get-wishlist-product",
         success:function(response){
            
            var rows = ""
            // console.log(response);
            $.each(response,function(key,value){

               rows += `<tr>
					<td class="col-md-2"><img src="/${value.product.product_thumbnail}" alt="image"></td>
					<td class="col-md-7">
						<div class="product-name"><a href="#">${value.product.product_name_en}</a></div>
						
						<div class="price">
                  ${value.product.discount_prize == null
                     ? `${value.product.selling_prize}`
                     : `${value.product.discount_prize} <span>${value.product.selling_prize}</span>`
                  }
							
						</div>
					</td>
				<td class="col-md-2">
               <button class="btn btn-primary icon" type="button" title="Add Cart"  data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)"> Add to cart </button>
				</td>
					<td class="col-md-1 close-btn">
						<button type="submit" id="${value.id}" onclick="wishlistRemove(this.id)" class=""><i class="fa fa-times"></i></button>
					</td>
				</tr>`

            });
            $('#wishlist').html(rows);
         },
      });
   }

   wishlist()

    // wishlist remove start   
    function wishlistRemove(id){
      $.ajax({
         type: "GET",
         dataType:"json",
         url:"/user/wishlist-remove/"+id,
         success:function(data){
            wishlist();

            // start message
            const Toast = Swal.mixin({
                  toast:true,
                  position: 'top-end',
                                    
                  showConfirmButton: false,
                  timer: 3000
               })
               if($.isEmptyObject(data.error)){
                  Toast.fire({
                     type:'success',
                     icon: 'success',
                     title: data.success                     
                  })
               }else{
                  Toast.fire({
                     type:'error',
                     icon: 'error',
                     title: data.error
                  })
               }

            // end message
         
         },
      });
   }
   
   
   // wishlist remove end

</script>
<!-- load wish list data page end -->

<!-- load mycart data page start -->
<script>
function cart(){
      $.ajax({
         type:"GET",
         dataType:"json",
         url: "/user/get-cart-product",
         success:function(response){
            
            var rows = ""
            // console.log(response);
            $.each(response.carts,function(key,value){

               rows += `<tr>
					<td class="col-md-2"><img src="/${value.options.image}" alt="image" style="width:100px;height:100px"></td>
					<td class="col-md-2">
						<div class="product-name"><a href="#">${value.name}</a></div>
						
						<div class="price">
                  ${value.price}
							
						</div>
					</td>

               <td class="col-md-2">
               <strong>${value.options.color}</strong>
					</td>

               <td class="col-md-2">
               ${value.options.size == null
               ? `<span>.....</span>`
               :
               `<strong>${value.options.size}</strong>`
               }               
					</td>

   <td class="col-md-2">

         ${value.qty > 1
         ? `<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)">-</button>`
         : `<button type="submit" class="btn btn-danger btn-sm" disabled>-</button>`               
         }      

         <input type="text" value="${value.qty}" min="1" max="100" style="width:25px;padding:4px" disabled>

         <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)">+</button>         
   </td>

               <td class="col-md-2">
               <strong>$${value.subtotal}</strong>
					</td>
				
					<td class="col-md-1 close-btn">
						<button type="submit" id="${value.rowId}" onclick="cartRemove(this.id)" class=""><i class="fa fa-times"></i></button>
					</td>
				</tr>`

            });
            $('#cartPage').html(rows);
         },
      });
   }

   cart()

    // cart remove start   
    function cartRemove(id){
      $.ajax({
         type: "GET",
         dataType:"json",
         url:"/user/cart-remove/"+id,
         success:function(data){
            couponCalculation();
            cart();
            miniCart();
            $('#couponField').show();
            $('#coupon_name').val('');

            // start message
            const Toast = Swal.mixin({
                  toast:true,
                  position: 'top-end',
                                    
                  showConfirmButton: false,
                  timer: 3000
               })
               if($.isEmptyObject(data.error)){
                  Toast.fire({
                     type:'success',
                     icon: 'success',
                     title: data.success                     
                  })
               }else{
                  Toast.fire({
                     type:'error',
                     icon: 'error',
                     title: data.error
                  })
               }

            // end message
         
         },
      });
   }
   
   
   // cart remove end

   // cart increment  start
   function cartIncrement(rowId){
      $.ajax({
         type:"GET",
         url:"/cart-increment/"+rowId,
         dataType:"json",
         success:function(data){
            couponCalculation();
            cart();
            miniCart();
         },
      });
   }
   // cart increment end 

   // cart decrement  start
   function cartDecrement(rowId){
      $.ajax({
         type:"GET",
         url:"/cart-decrement/"+rowId,
         dataType:"json",
         success:function(data){
            couponCalculation();
            cart();
            miniCart();
         },
      });
   }
   // cart decrement end 

</script>
<!-- load my cart data page end -->

<!-- coupon apply started -->
<script>
   function applyCoupon(){
      var coupon_name = $('#coupon_name').val();

      $.ajax({
         type:"POST",
         dataType:"json",
         data:{coupon_name:coupon_name},
         url:"{{url('/coupon-apply')}}",
         success:function(data){
            couponCalculation();
            if(data.validity == true){
               $('#couponField').hide();
            }

             // start message
             const Toast = Swal.mixin({
                  toast:true,
                  position: 'top-end',
                                    
                  showConfirmButton: false,
                  timer: 3000
               })
               if($.isEmptyObject(data.error)){
                  Toast.fire({
                     type:'success',
                     icon: 'success',
                     title: data.success                     
                  })
               }else{
                  Toast.fire({
                     type:'error',
                     icon: 'error',
                     title: data.error
                  })
               }

            // end message

         },
      });
   }

   function couponCalculation(){
      $.ajax({
         type:"GET",
         url:"{{ url('/coupon-calculation') }}",
         dataType: "json",         
         success:function(data){
            if(data.total){
               $('#couponCalField').html(
                  `<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md">$ ${data.total}</span>
					</div>
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">$ ${data.total}</span>
					</div>
				</th>
			</tr>`
               );

            }else{

               $('#couponCalField').html(
                  `<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md">$ ${data.subTotal}</span>
					</div>
               <div class="cart-sub-total">
               Coupon-name<span class="inner-left-md"> ${data.coupon_name}</span>
               <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i></button>
					</div>
               <div class="cart-sub-total">
               Discount-amount<span class="inner-left-md">$ ${data.discount_amount}</span>
					</div>
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">$ ${data.total_amount}</span>
					</div>
				</th>
			</tr>`
               );

            }

         }
      });
   }
   couponCalculation();
</script>
<!-- coupon apply ended -->
   <script>
   function couponRemove(){
      $.ajax({
         type:"GET",
         url:"{{url('/coupon-remove')}}",
         dataType: "json",
         success:function(data){

            couponCalculation();
            $('#couponField').show();
            $('#coupon_name').val('');

            // start message
             const Toast = Swal.mixin({
                  toast:true,
                  position: 'top-end',
                                    
                  showConfirmButton: false,
                  timer: 3000
               })
               if($.isEmptyObject(data.error)){
                  Toast.fire({
                     type:'success',
                     icon: 'success',
                     title: data.success                     
                  })
               }else{
                  Toast.fire({
                     type:'error',
                     icon: 'error',
                     title: data.error
                  })
               }

            // end message
         }
      });
   }
   </script>

</body>
</html>