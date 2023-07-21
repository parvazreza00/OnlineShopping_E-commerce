@extends('frontend.main_master')
@section('content')

<!-- @php
$user = DB::table('users')->where('id',Auth::user()->id)->first();
@endphp -->

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                @include('frontend.common.user_sidebar')
                </ul><br>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger"><strong >Password Update </strong> </span></h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('user.password.update')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <h5>Current Password<span class=""></span></h5>
                            <input type="password" name="oldpassword" id="current_password" class="form-control" >
                        </div>
                        <div class="form-group">
                            <h5>New Password<span class=""></span></h5>
                            <input type="password" name="password" id="password" class="form-control" >
                        </div>
                        <div class="form-group">
                            <h5>Confirm Password<span class=""></span></h5>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>

                    </form>
                </div>




            </div>
        </div>
    </div>
</div>

@endsection