<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- BOOTSTRAP CSS  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- FONT AWESOME  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <!-- CUSTOM CSS  -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- HEADER SECTION-->
                <div class="header">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <img src="{{ asset('images/123.jpg') }}" id="headerImg" alt="">
                        </div>
                        <div class="col-md-4">
                            <br><br><br>
                            <p class="hello">HELLO!</p>
                            <p class="itme">IT'S ME</p>
                            <p class="yms">YE MYINT SOE</p>
                            <p class="hc">THE HAPPY CODER</p>
                            <br>
                            <a href="{{ url('posts') }}">
                                <button class="btn btn-info text-white">
                                    <i class="fa fa-plus-circle"></i>
                                    Explore My Blogs
                                </button>
                            </a>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>

                <!-- NAVBAR SEXTION -->
                <div class="position-sticky" id="navbar">
                    <a href="{{ url('/') }}">HOME</a>
                    <a href="{{ url('/posts') }}">BLOGS</a>

                    @if (Auth::check())
                        <a href="" class="float-end" onclick="event.preventDefault();
                        if(confirm('Are you sure you want to logout!')){document.getElementById('logout').submit()}">
                            Logout
                        </a>
                        <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">{{-- {{ url('/logout') }} --}}
                            @csrf
                        </form>
                        <a href="{{ url('/') }}" class="float-end">{{ Auth::user()->name }}</a>
                    @else
                        <a href="{{ url('/register') }}" class="float-end">Register</a>
                        <a href="{{ url('/login') }}" class="float-end">Login</a>
                    @endif
                </div>


                <div class="container">
                    <div class="row">
                        @yield('content')
                        </div>
                    </div>
                </div>

                <!-- FOOTER SECTION  -->
                <div class="footer">
                    <div class="row">

                        <div class="col-sm-12 col-md-4 mb-4">
                            <h5>ABOUT THIS WEBSITE</h5>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae sequi, architecto
                                laborum excepturi molestiae dolore? Beatae distinctio.
                            </p>
                        </div>

                        <div class="col-sm-12 col-md-4 mb-4">
                            <h5>CONTACT INFO</h5>
                            <span> <i class="fas fa-mobile-alt"></i> 09403438913 </span> <br>
                            <span> <i class="far fa-envelope"></i> yms.yemyintsoe@gmail.com </span>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <h5>FOLLOW ME ON</h5>
                            <a href="https://www.facebook.com/ye.m.soe.96387/" target="_blank">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="https://www.instagram.com/yemyintsoe_salai/" target="_blank">
                                <i class="fab fa-instagram-square"></i>
                            </a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="https://www.linkedin.com/in/ye-myint-soe-28a2aa1a0/" target="_blank">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="">
                                <i class="fab fa-twitter-square"></i>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- CUSTOMS JS  -->
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- BOOTSTRAP JS  -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
