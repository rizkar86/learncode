@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Tracks Management'])
<div class="container-fluid py-4">
    @include('layouts.header.header')
    <div class="row mt-4 mx-4">
        <div class="col-12">
          {{--   <div class="alert alert-light" role="alert">
                This feature is available in <strong>Argon Dashboard 2 Pro Laravel</strong>. Check it
                <strong>
                    <a href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank">
                        here
                    </a>
                </strong>
            </div> --}}
            <div id="alert">
                @include('components.alert')
            </div>
            @if ($errors->any())
            <div class="alert alert-danger text-white">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
             @endif
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tracks</h6>
                    <form method="POST"  action={{ route('tracks.store') }}>
                        @csrf
                        <input type="text" name="name" class="form-control" placeholder="add track's name">
                        <br>
                        <button type="submit" class="btn btn-primary btn-sm float-end" >Add Track</button>
                    </form> 
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
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($tracks) > 0)
                                    @foreach ($tracks as $track)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div>
                                                    <img src="{{asset('img/team-1.jpg')}}" class="avatar me-3" alt="image">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$track->name}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                     {{--    <td>
                                            <p class="text-sm font-weight-bold mb-0">{{$track->user->email}}</p>
                                        </td> --}}
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{$track->courses->count()}}</p>
                                        </td>
                                        <td class="align-middle text-end">
                                            <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                <a class="text-sm font-weight-bold mb-0" href="{{ route('tracks.edit', $track->id) }}">Edit</a>
                                                <form action="{{ route('tracks.destroy', $track->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" class="btn btn-link text-sm font-weight-bold mb-0 ps-2" value="Delete">
                                                </form> 
                                            
                                            </div>
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
            
                  <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        {{ $tracks->links('custom-pagination') }}
                    </ul>
                  </nav>
            </div>
        </div>
    </div>
@endsection

