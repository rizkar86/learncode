@extends('layouts.user_layout')
@section('content')

    <div class="container">
        <div class="card shadow-lg mx-4 card-profile-bottom">
            <div class="card-body p-3">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img width="48" height="48" src="/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $user->firstname ?? 'Firstname' }} {{ $user->lastname ?? 'Lastname' }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                Public Relations
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center "
                                        data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                        <i class="ni ni-app"></i>
                                        <span class="ms-2">App</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                        data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                        <i class="ni ni-email-83"></i>
                                        <span class="ms-2">Messages</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                        data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                        <i class="ni ni-settings-gear-65"></i>
                                        <span class="ms-2">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-success d-none" role="alert">
          
        </div>
        <div class="alert alert-danger d-none" role="alert">
          
        </div>
      
        <div class=" py-4">
            <div class="row mb-5">
                <div class="col-md-8">
                    <div class="card">
                        <form id="userProfile" role="form" method="POST" action="/profile" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header pb-2">
                                <div class="d-flex align-items-center">
                                    <h2 class="mb-0">Edit Profile</h2>
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="text-uppercase text-sm">User Information</p>
                                <div class="row">

                                    <div class="col-md-6 mb-5">
                                        <div class="form-group">
                                            <img id="profileImg"   width="300px" height="300px" src="{{asset('img/users/'.$user->photo->filename.'')}}" class="" alt="...">
                                        </div>
                                        <div class=" mt-3">
                                            <div class="btn btn-primary btn-rounded btn-sm" style="border-radius: 10%">
                                                <label class="form-label text-white m-1" for="uploadFile">Choose file</label>
                                                <input type="file" name="photo" class="form-control d-none" id="uploadFile" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <div class="form-group mb-4">
                                            <label for="example-text-input" class="form-control-label">Username</label>
                                            <input class="form-control" type="text" name="username" value="{{ old('username', $user->username) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Email address</label>
                                            <input class="form-control" type="email" name="email" value="{{ old('email', $user->email) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-between mb-5">
                                        <div>Score : {{$user->score}}</div>
                                        <div>{{$user->email_verified_at ? 'Verified' : 'Not Verified'}}</div>
                                        <div>Member since : {{$user->created_at}}</div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">First name</label>
                                            <input class="form-control" type="text" name="firstname"  value="{{ old('firstname', $user->firstname) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Last name</label>
                                            <input class="form-control" type="text" name="lastname" value="{{ old('lastname', $user->lastname) }}">
                                        </div>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Contact Information</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Address</label>
                                            <input class="form-control" type="text" name="address"
                                                value="{{ old('address', $user->address) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">City</label>
                                            <input class="form-control" type="text" name="city" value="{{ old('city', $user->city) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Country</label>
                                            <input class="form-control" type="text" name="country" value="{{ old('country', $user->country) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Postal code</label>
                                            <input class="form-control" type="text" name="postal" value="{{ old('postal', $user->postal) }}">
                                        </div>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">About me</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">About me</label>
                                            <input class="form-control" type="text" name="about"
                                                value="{{ old('about', $user->about) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                  {{--       <form role="form" method="POST" action={{ route('profile.resetPassword') }} enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header pb-2">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Reset Password</p>
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Reset</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="text-uppercase text-sm">Reset Password</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Current Password</label>
                                            <input class="form-control" type="password" name="currentPassword" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">New Password</label>
                                            <input class="form-control" type="password" name="newPassword" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Confirm Password</label>
                                            <input class="form-control" type="password" name="confirmPassword" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> --}}
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <img src="/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                        <div class="row justify-content-center">
                            <div class="col-4 col-lg-4 order-lg-2">
                                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                    <a href="javascript:;">
                                        <img src="{{asset('img/users/'.$user->photo->filename.'')}}"
                                            class="rounded-circle img-fluid border border-2 border-white">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                            <div class="d-flex justify-content-between">
                                <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
                                <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i
                                        class="ni ni-collection"></i></a>
                                <a href="javascript:;"
                                    class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
                                <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i
                                        class="ni ni-email-83"></i></a>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex justify-content-center">
                                        <div class="d-grid text-center">
                                            <span class="text-lg font-weight-bolder">22</span>
                                            <span class="text-sm opacity-8">Friends</span>
                                        </div>
                                        <div class="d-grid text-center mx-4">
                                            <span class="text-lg font-weight-bolder">10</span>
                                            <span class="text-sm opacity-8">Photos</span>
                                        </div>
                                        <div class="d-grid text-center">
                                            <span class="text-lg font-weight-bolder">89</span>
                                            <span class="text-sm opacity-8">Comments</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <h5>
                                    {{$user->firstname}} {{$user->lastname}}<span class="font-weight-light">, 37</span>
                                </h5>
                                <div class="h6 font-weight-300">
                                    <i class="ni location_pin mr-2"></i> {{$user->address}},<br> {{$user->city}} {{$user->country}}
                                </div>
                                <div class="h6 mt-4">
                                    <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                                </div>
                                <div>
                                    <i class="ni education_hat mr-2"></i>University of Aleppo
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h3>Your Tracks</h3>
              
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No Courses</th>
                             
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($tracks) > 0)
                                    @foreach ($tracks as $track)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="/tracks/{{$track->name}}"><h6 class="mb-0 text-sm">{{$track->name}}</h6></a>
                                                </div>
                                            </div>
                                        </td>
                                     {{--    <td>
                                            <p class="text-sm font-weight-bold mb-0">{{$track->user->email}}</p>
                                        </td> --}}
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{$track->courses->count()}}</p>
                                        </td>
                                   
                                    </tr>
                                    @endforeach         
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">No Tracks Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            
        
            </div>
        </div>
      
    </div>
  
    @include('includes.home_footer')
@endsection
