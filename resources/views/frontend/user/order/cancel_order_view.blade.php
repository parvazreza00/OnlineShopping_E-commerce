@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
            @include('frontend.common.user_sidebar')
                </ul><br>
            </div><!-- end col-md-2 -->
            <div class="col-md-1"></div>
            <div class="col-md-8 ">
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
                            

                            @forelse($orders as $order)
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
                                      <span class="badge badge-pill" style="background:dodgerblue">{{$order->status}}</span> 
                                      
                                    </label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">
<a href="{{ url('user/order-details/'.$order->id) }}" class="btn btn-primary btn-sm "><i class="fa fa-eye"></i>View</a>

                                    </label>
                                </td>
                            </tr>

                            @empty
                            <h2 class="text-danger">Order Not Found</h2>


                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div><!-- end col-md-8 -->
            
            
        </div><!-- end row -->
    </div>
</div>

@endsection