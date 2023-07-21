

@extends('admin.admin_master')
@section('admin')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>
<body>
    <div class="container">
       <div class="row">
        <div class="col-md-4">
            <h1>Product Name EN</h1>
            <p>{{$productDetails->product_name_en}}</p>
        </div>
        <div class="col-md-4">
            <h1>Product Name Hin</h1>
            <p>{{$productDetails->product_name_hin}}</p>
        </div>
        <div class="col-md-4">
            <h1>Product Size En</h1>
            <p>{{$productDetails->product_size_en}}</p>
        </div>
        <div class="col-md-4">
            <h1>Product Size Hin</h1>
            <p>{{$productDetails->product_size_hin}}</p>
        </div>
        <div class="col-md-4">
            <h1>Product Code</h1>
            <p>{{$productDetails->product_code}}</p>
        </div>
        <div class="col-md-4">
            <h1>Product Quantity</h1>
            <p>{{$productDetails->product_qty}}</p>
        </div>
        <div class="col-md-4">
            <h1>Product Selling Prize</h1>
            <p>{{$productDetails->selling_prize}}</p>
        </div>
        <div class="col-md-4">
            <h1>Product Discount Prize</h1>
            <p>{{$productDetails->discount_prize}}</p>
        </div>
        <div class="col-md-4">
            <h1>Product short Des</h1>
            <p>{{$productDetails->short_desc_en}}</p>
        </div>
        <div class="col-md-4">
            <h1>Product short Desc</h1>
            <p>{!! $productDetails->long_desc_en !!}</p>
        </div>
        
        <div class="col-md-4">
            <h1>Product short Desc</h1>
            <p><img src="{{asset($productDetails->product_thumbnail)}}" style="width:300xp;height:300px"></p>            
        </div>
       </div>
        
        
        
        <p></p>
    </div>
    

</body>
</html>

@endsection