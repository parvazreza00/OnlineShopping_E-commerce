@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Order Details</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Order Details</li>								
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- Main content -->
		<section class="content">
		  <div class="row">					

            <div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Shipping Details</strong></h4>
				  </div>				 

				  	<table class="table">
                            <tr>
                                <th>Shipping Name: -></th>
                                <th>{{ $order->name }}</th>
                            </tr>
                            <tr>
                                <th>Shipping Phone: -></th>
                                <th>{{ $order->phone }}</th>
                            </tr>
                            <tr>
                                <th>Shipping Email: -></th>
                                <th>{{ $order->email }}</th>
                            </tr>
                            <tr>
                                <th>Shipping Division: -></th>
                                <th>{{ $order->division->division_name }}</th>
                            </tr>
                            <tr>
                                <th>Shipping District: -></th>
                                <th>{{ $order->district->district_name }}</th>
                            </tr>
                            <tr>
                                <th>Shipping State: -></th>
                                <th>{{ $order->state->state_name }}</th>
                            </tr>
                            <tr>
                                <th>Post Code: -></th>
                                <th>{{ $order->post_code }}</th>
                            </tr>
                            <tr>
                                <th>Order Date: -></th>
                                <th>{{ $order->order_date }}</th>
                            </tr>
                        </table>

					</div>
			  </div><!-- //end col-md-6 -->
			  

              <div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
				  		<h4 class=""><b>Order Details </b>
                        <span class="text-danger"><i>Invoice: {{ $order->invoice_no }}</i></span>
                        </h4> 
				  </div>

				  <table class="table">
                            <tr>
                                <th>Name: -></th>
                                <th>{{ $order->user->name }}</th>
                            </tr>
                            <tr>
                                <th>Phone: -></th>
                                <th>{{ $order->user->phone }}</th>
                            </tr>
                            <tr>
                                <th>Payment Type: -></th>
                                <th>{{ $order->payment_method }}</th>
                            </tr>
                            <tr>
                                <th>Tranx Id: -></th>
                                <th>{{ $order->transaction_id }}</th>
                            </tr>
                            <tr>
                                <th>Invoice: -></th>
                                <th class="text-danger">{{ $order->invoice_no }}</th>
                            </tr>
                            <tr>
                                <th>Order Total: -></th>
                                <th>${{ $order->amount }}</th>
                            </tr>
                            <tr>
                                <th>Order: -></th>
                                <th>                                
                                    <span class="badge badge-pill badge-primary" style="color:white">{{$order->status}}</span>
                                </th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>
    @if($order->status == 'pending')
    <a href="{{ route('pending.confirm',$order->id) }}" class="btn btn-primary" id="confirm">Confirm Order</a>
    @elseif($order->status == 'confirm')
    <a href="{{ route('confirm.processing',$order->id) }}" class="btn btn-primary" id="processing">Processing Order</a>
    @elseif($order->status == 'processing')
    <a href="{{ route('processing.picked',$order->id) }}" class="btn btn-primary" id="picked">Picked Order</a>
    @elseif($order->status == 'picked')
    <a href="{{ route('picked.shipped',$order->id) }}" class="btn btn-primary" id="shipped">Shipped Order</a>
    @elseif($order->status == 'shipped')
    <a href="{{ route('shipped.delivered',$order->id) }}" class="btn btn-primary" id="delivered">Delivered Order</a>
    @else
    <a href="{{ route('cancel',$order->id) }}" class="btn btn-primary" id="cancel">Cancel Order</a>
    @endif
                                </th>
                            </tr>
                        </table>
				  


				</div>
			  </div><!-- //end col-md-6 -->

			  <div class="col-md-12 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
				<h4 class="box-title text-center"><strong>Product Details</strong></h4>
				  </div>
				  

				  <table class="table">
                        <thead>
                        <tr >
                                <th class="col-md-2">
                                    <label for="">Image</label>
                                </th>
                                <th class="col-md-2">
                                    <label for="">Product Name</label>
                                </th>
                                <th class="col-md-2">
                                    <label for="">Product Code</label>
                                </th>
                                <th class="col-md-1">
                                    <label for="">Color</label>
                                </th>
                                <th class="col-md-1">
                                    <label for="">Size</label>
                                </th>
                                <th class="col-md-1">
                                    <label for="">Qty</label>
                                </th>
                                 <th class="col-md-3">
                                    <label for="">Price</label>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            

                            @foreach($orderItem as $item)
                            <tr>
                                <td class="col-md-2">
                                    <label for=""><img src="{{ asset($item->product->product_thumbnail) }}" alt="" style="height:50px;width:50px"></label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{ $item->product->product_name_en }}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{ $item->product->product_code }}</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">{{ $item->color }}</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">{{ $item->size }}</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">{{ $item->qty }}</label>
                                </td>
                                <td class="col-md-3">
                                    <label for="">${{ $item->price }} ( ${{$item->price * $item->qty}} )</label>
                                </td>
                                
                                
                            </tr>
                            @endforeach
                        </tbody>

                    </table>


				</div>
			  </div><!-- end cold md 12 -->


           
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
 
  <!-- /.content-wrapper -->

@endsection



