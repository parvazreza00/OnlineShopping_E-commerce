@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
            @include('frontend.common.user_sidebar')
                </ul><br>
            </div><!-- end col-md-2 -->
            
            <div class="col-md-10 ">
                <div class="table-responsive ">
                    <br>
                    <table class="table">
                        <thead>
                        <tr style="background:#e2e2e2">
                                <th class="col-md-3">
                                    <label for="">Date</label>
                                </th>
                                <th class="col-md-2">
                                    <label for="">Total</label>
                                </th>
                                <th class="col-md-2">
                                    <label for="">Payment</label>
                                </th>
                                <th class="col-md-2">
                                    <label for="">Invoice</label>
                                </th>
                                <th class="col-md-2">
                                    <label for="">Order</label>
                                </th>
                                <th class="col-md-1">
                                    <label for="">Action</label>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            

                            @foreach($orders as $order)
                            <tr>
                                <td class="col-md-3">
                                    <label for="">{{$order->order_date}}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">${{$order->amount}}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{$order->payment_method}}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{$order->invoice_no}}</label>
                                </td>
<td class="col-md-2">
    <label for="">
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
        @if($order->return_order == 1)
        <span class="badge badge-pill" style="background:red;font-size:10px">Return Reason Requested First Once</span>
        @endif

        @else        
        <span class="badge badge-pill" style="background:#FF0000">Cancel</span>

        @endif
    </label>
</td>
                                <td class="col-md-1">
                                    <label for="">
<a href="{{ url('user/order-details/'.$order->id) }}" class="btn btn-primary btn-sm "><i class="fa fa-eye"></i>View</a>
<a target="_blank" href="{{ url('user/invoice_download/'.$order->id) }}" class="btn btn-danger btn-sm" style="margin-top:3px"><i class="fa fa-download"></i>Invoice</a>
                                    </label>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div><!-- end col-md-8 -->
            
            
        </div><!-- end row -->
    </div>
</div>

@endsection