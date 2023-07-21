@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
        <div class="col-md-2"><br>
            @include('frontend.common.user_sidebar');
                </ul><br>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi...</span><strong>{{ Auth::user()->name }}</strong> Update Your Profile</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('user.profile.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <h5>User Name<span class=""></span></h5>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <h5>User Email<span class=""></span></h5>
                            <input type="email" name="email" class="form-control" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <h5>User Phone<span class=""></span></h5>
                            <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
                        </div>
                        <div class="form-group">
                            <h5>User Image<span class=""></span></h5>
                            <input type="file" name="profile_photo_path" class="form-control" >
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