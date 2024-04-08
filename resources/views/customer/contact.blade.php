@extends('layouts.customer-nav')
@section('content')
    @vite(["resources/sass/app.scss", "resources/js/app.js"])
    <head>
        <title>Contact</title>
        <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
    </head>
    <body style="background-color: #00001c;">
    <hr class="text-white">
    <section class="section-5 pt-3 pb-3 mb-3">
        <div class="container">
            <div>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="bi bi-slash-lg text-white">Contact</li>
                </ol>
            </div>
        </div>
    </section>

    <!--Phần CARDS-->
    <div class="container-fluid p-0 ">
        {{-- <div class=" position-relative d-flex justify-content-center align-items-center text-white">
            trang help
        </div> --}}
        <div class="row justify-content-center">
            <div class="col-lg-11">
               <div class="wrapper">
                  <div class="row no-gutters justify-content-between">
                     <div class="col-lg-6 d-flex align-items-stretch">
                        <div class="info-wrap w-100 p-5 text-light fs-4">
                           <h3 class="mb-4">Contact us</h3>
                           <div class="dbox w-100 d-flex align-items-start">
                              <div class="icon d-flex align-items-center justify-content-center">
                                 <span class="fa fa-map-marker"></span>
                              </div>
                              <div class="text pl-4">
                                 <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                              </div>
                           </div>
                           <div class="dbox w-100 d-flex align-items-start">
                              <div class="icon d-flex align-items-center justify-content-center">
                                 <span class="fa fa-phone"></span>
                              </div>
                              <div class="text pl-4">
                                 <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                              </div>
                           </div>
                           <div class="dbox w-100 d-flex align-items-start">
                              <div class="icon d-flex align-items-center justify-content-center">
                                 <span class="fa fa-paper-plane"></span>
                              </div>
                              <div class="text pl-4">
                                 <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                              </div>
                           </div>
                           <div class="dbox w-100 d-flex align-items-start">
                              <div class="icon d-flex align-items-center justify-content-center">
                                 <span class="fa fa-globe"></span>
                              </div>
                              <div class="text pl-4">
                                 <p><span>Website</span> <a href="#">yoursite.com</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-5">
                        <div class="contact-wrap w-100 p-md-5 p-4 text-light fs-4 ">
                           <h3 class="mb-4">Get in touch</h3>
                           <div id="form-message-warning" class="mb-4"></div>
                           <div id="form-message-success" class="mb-4">
                              Your message was sent, thank you!
                           </div>
                           <form method="POST" id="contactForm" name="contactForm" novalidate="novalidate">
                              <div class="row d-flex flex-column" style="gap: 10px">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <textarea name="message" class="form-control" id="message" cols="30" rows="5" placeholder="Message"></textarea>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <input type="submit" value="Send Message" class="btn btn-primary">
                                       <div class="submitting"></div>
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
    </div>
    {{--  Products  --}}

    {{--  SHIPPING  --}}

    @include('layouts/scroll_to_top')
    </body>
    <script src="{{asset('frontend/js/home.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin-assets/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin-assets/js/demo.js')}}"></script>
@endsection

