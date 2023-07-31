@extends('layouts.user_layout')
@section('content')
    @include('includes.home_haeder')
    <div class="row mt-4 mx-4">
        <div class="col-12">
           
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Conatct </h6>    
                </div>
                <div class="alert alert-success d-none" role="alert">
          
                </div>
                <div class="alert alert-danger d-none" role="alert">
                  
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-9 mb-md-0 mb-5">
                            <form id="contactForm" name="contact-form" action="/contact" method="POST">
                                @csrf
                                <!--Grid row-->
                                <div class="row mb-3">

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <label for="name" class="">Your name</label>
                                            <input type="text" id="name" name="name" class="form-control">
                               
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <label for="email" class="">Your email</label>
                                            <input type="text" id="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <label for="subject" class="">Subject</label>
                                            <input type="text" id="subject" name="subject" class="form-control">
                                       
                                        </div>
                                    </div>
                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row mb-3">

                                    <!--Grid column-->
                                    <div class="col-md-12">

                                        <div class="md-form">
                                            <label for="message">Your message</label>
                                            <textarea type="text" id="message" name="message" rows="5" class="form-control md-textarea"></textarea>
                                        
                                        </div>

                                    </div>
                                </div>
                                <!--Grid row-->
                                <div class=" text-md-left ">
                                    <input type="submit" class="btn btn-primary" value="Send" >
                                </div>

                            </form>

                          
                 
                        </div>
         

                    </div>
                </div> 
            </div>
        </div>
    </div>
    @include('includes.home_footer')
@endsection