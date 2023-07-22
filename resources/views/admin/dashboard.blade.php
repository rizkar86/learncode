@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        @include('layouts.header.header')
        <div class="row mt-4 mx-4">
           <div class="col-6">
                <div class="card">
               
                <div class="card-body">
                    <h5 class="card-title">Tracks</h5>
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
                                                    <a href="{{ route('tracks.show', $track) }}"><h6 class="mb-0 text-sm">{{$track->name}}</h6></a>
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
              </div>
           </div>
           <div class="col-6">
                <div class="card">
                 
                    <div class="card-body">
                        <h5 class="card-title">Courses</h5>
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No Videos</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($courses) > 0)
                                    @foreach ($courses as $course)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div>
                                                    <img src="{{asset('img/team-1.jpg')}}" class="avatar me-3" alt="image">
                                                </div>
                                            
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="{{ route('courses.show', $course) }}"><h6 class="mb-0 text-sm">{{$course->title}}</h6></a>
                                                </div>
                                            </div>
                                        </td>
                                     {{--    <td>
                                            <p class="text-sm font-weight-bold mb-0">{{$track->user->email}}</p>
                                        </td> --}}
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{$course->videos->count()}}</p>
                                        </td>
                                        <td class="align-middle text-end">
                                            <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                <a class="text-sm font-weight-bold mb-0" href="{{ route('courses.edit', $course->id) }}">Edit</a>
                                                <form action="{{ route('courses.destroy', $course->id) }}" method="post">
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
                                        <td colspan="4" class="text-center">No Course Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
           </div>
        </div>
        <div class="row mt-4 mx-4">
            <div class="col-6">
                 <div class="card">
                 <div class="card-body">
                    <h5 class="card-title">Users</h5>
                     <div class="table-responsive p-0">
                         <table class="table align-items-center mb-0">
                             <thead>
                                 <tr>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                                     <th
                                         class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Email</th>
                                         <th
                                         class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Verified</th>
                                     <th
                                         class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @if (count($users) > 0)
                                     @foreach ($users as $user)
                                     <tr>
                                        <td class="align-middle">
                                            <p class="text-sm font-weight-bold mb-0">{{$user->username}}</p>
                                        </td>
                                      {{--    <td>
                                             <p class="text-sm font-weight-bold mb-0">{{$track->user->email}}</p>
                                         </td> --}}
                                         <td class="align-middle text-center text-sm">
                                             <p class="text-sm font-weight-bold mb-0">{{$user->email}}</p>
                                         </td>
                                         <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{($user->email_verified_at)?'Verified':'Not Verified'}}
                                            </p>
                                        </td>
                                         <td class="align-middle text-end">
                                             <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                 <a class="text-sm font-weight-bold mb-0" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                                 <form action="{{ route('users.destroy', $user->id) }}" method="post">
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
                                         <td colspan="4" class="text-center">No Users Found</td>
                                     </tr>
                                 @endif
                             </tbody>
                         </table>
                     </div>
                 </div>
               </div>
            </div>
            <div class="col-6">
                 <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Quizzes</h5>
                         <table class="table align-items-center mb-0">
                             <thead>
                                 <tr>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                                     <th
                                         class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Course</th>
                                     <th
                                         class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @if (count($quizzes) > 0)
                                     @foreach ($quizzes as $quiz)
                                     <tr>
                                         <td>
                                             <div class="d-flex px-3 py-1">
                                            
                                             
                                                 <div class="d-flex flex-column justify-content-center">
                                                     <a href="{{ route('quizzes.show', $quiz) }}"><h6 class="mb-0 text-sm">{{$quiz->name}}</h6></a>
                                                 </div>
                                             </div>
                                         </td>
                                      {{--    <td>
                                             <p class="text-sm font-weight-bold mb-0">{{$track->user->email}}</p>
                                         </td> --}}
                                         <td class="align-middle text-center text-sm">
                                             <p class="text-sm font-weight-bold mb-0">{{$quiz->course->title}}</p>
                                         </td>
                                         <td class="align-middle text-end">
                                             <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                 <a class="text-sm font-weight-bold mb-0" href="{{ route('quizzes.edit', $quiz->id) }}">Edit</a>
                                                 <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="post">
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
                                         <td colspan="4" class="text-center">No Course Found</td>
                                     </tr>
                                 @endif
                             </tbody>
                         </table>
                     </div>
                 </div>
            </div>
         </div>
      
         @include('layouts.footers.auth.footer')
        
    </div>
@endsection

@push('js')
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#fb6340",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endpush
