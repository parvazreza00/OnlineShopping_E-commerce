@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container ">
        <div class="row ">
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
                                <th class="col-md-1">
                                    <label for="">Return Reason</label>
                                </th>
                                <th class="col-md-2">
                                    <label for="">Order Status</label>
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
                                <td class="col-md-1">
                                    <label for="">{{$order->return_reason}}</label>
                                </td>
<td class="col-md-2">
    <label for="">
        @if($order->return_order == 0)
        <span class="badge badge-pill" style="background:red">No Return Request</span> 

        @elseif($order->return_order == 1)
        <span class="badge badge-pill" style="background:#800080">Pending</span>
        <span class="badge badge-pill" style="background:red;font-size:10px">Return Reason Requested First Once</span>

        @elseif($order->return_order == 2)
        <span class="badge badge-pill" style="background:#008000">Success</span>
        

        @endif
        
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