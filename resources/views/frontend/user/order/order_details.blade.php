@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
            @include('frontend.common.user_sidebar')
                </ul><br>
            </div><!-- end col-md-2 -->
            
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class=""><b>Shipping Details</b></h4>
                    </div>
                    <div class="card-body" style="background:#E9EBEC">
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
                </div>
            </div><!-- end col-md-5 first -->

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class=""><b>Order Details </b>
                        <span class="text-danger"><i>Invoice: {{ $order->invoice_no }}</i></span>
                        </h4>                    
                    </div>
                    <div class="card-body" style="background:#E9EBEC">
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
                                <th>{{ $order->amount }}</th>
                            </tr>
                            <tr>
        <th>Order: -></th>
        <th>
                                @if($order->status == 'pending')
        <span class="badge badge-pill" style="background:#800080">Pending</span> 

        @elseif($order->status == 'confirm')
        <span class="badge badge-pill" style="background:#0000FF">Confirm</span> 

        @elseif($order->status == 'processing')
        <span class="badge badge-pill" style="background:#FFA500">Processing</span> 

        @elseif($order->status == 'picked')
        <span class="badge badge-pill" style="background:#808000">Picked</span> 

        @elseif($order->status == 'shipped')
        <span class="badge badge-pill" style="background:#808080">Shipped</span> 

        @elseif($order->status == 'delivered')
        <span class="badge badge-pill" style="background:#008000">Delivered</span>

        @else        
        <span class="badge badge-pill" style="background:#FF0000">Cancel</span>

        @endif
        </th>
                            </tr>
                            <tr>
                                <th>Order Date: -></th>
                                <th>{{ $order->order_date }}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div><!-- end col-md-5 second -->
            
            <div class="row">

            <div class="col-md-12 ">
                <h4 class="text-center"><b>Product Details</b></h4>
                <div class="table-responsive ">
                    <br>
                    <table class="table">
                        <thead>
                        <tr style="background:#e2e2e2">
                                <th class="col-md-1">
                                    <label for="">Image</label>
                                </th>
                                <th class="col-md-2">
                                    <label for="">Product Name</label>
                                </th>
                                <th class="col-md-2">
                                    <label for="">Product Code</label>
                                </th>
                                <th class="col-md-2">
                                    <label for="">Color</label>
                                </th>
                                <th class="col-md-2">
                                    <label for="">Size</label>
                                </th>
                                <th class="col-md-1">
                                    <label for="">Qty</label>
                                </th>
                                 <th class="col-md-1">
                                    <label for="">Price</label>
                                </th>
                                <th class="col-md-1">
                                    <label for="">Download</label>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            

                            @foreach($orderItem as $item)
                            <tr>
                                <td class="col-md-1">
                                    <label for=""><img src="{{ asset($item->product->product_thumbnail) }}" alt="" style="height:50px;width:50px"></label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{ $item->product->product_name_en }}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{ $item->product->product_code }}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{ $item->color }}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{ $item->size }}</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">{{ $item->qty }}</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">${{ $item->price }} ( ${{$item->price * $item->qty}} )</label>
                                </td>
                                
@php 
$file = App\Models\Product::where('id',$item->product_id)->first();

@endphp
    <td class="col-md-1">
        @if($order->status == 'pending')
        <strong>
            <span class="badge badge-pill badge-success" style="background:#108DB9">No File</span>
        </strong>
        @elseif($order->status == 'confirm')
        <a target="_blank" href="{{asset('upload/Pdf/'.$file->digital_file)}}">
        <strong>
            <span class="badge badge-pill badge-success" style="background:#FF0000">Download Ready</span>
        </strong>
        </a>
        @endif
    </td>
                                
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div><!-- end col-md-8 -->

            </div><!-- end order row --> 

            @if($order->status !== 'delivered')

            @else

            @php
                $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
            @endphp

            @if($order)
            <form action="{{ route('return.order',$order->id) }}" method="post">
                @csrf           
            <div class="form-group">
                <label for=""><b>Order Return Reason</b></label>
                <textarea name="return_reason" class="form-control" id="" cols="30" rows="05" placeholder="Return reason..."></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Return Order</button>
            <br><br>
            </form>
            @else
            <span class="badge badge-pill badge-warning" style="background:red">You have sent your return reason for this product</span>
            <br><br>
            @endif

            @endif
            
            
            
        </div><!-- end row -->
    </div>
</div>

@endsection