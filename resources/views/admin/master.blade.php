<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap CSS Link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    {{-- Fontawsome CDN Link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>@yield('title')</title>

    <style>
        #sidebar {
            width: 200px;
            background-color: black;
            height: 100%;
            position: fixed;
            padding: 15px
        }

        #sidebar a {
            display: block;
            font-size: 18px;
            text-decoration: none;
            color: white;
            padding: 6px
        }

        #main {
            margin-left: 200px;
            font-size: 18px;
            padding: 30px 20px;
        }

        .mainCol {
            padding: 0px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mainCol">
                {{-- Navbar --}}
                <nav class="navbar navbar-expand-lg bg-dark sticky-top">
                    <div class="container-fluid">
                        <a class="navbar-brand text-white" href="{{ url('admin/dashboard') }}">Personal Blog</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <form action="{{ route('logout') }}" method="POST">{{-- {{ url('/logout') }} --}}
                                                @csrf
                                                <button type="submit" class="btn"
                                                    onclick="return confirm('Are you sure you want to logout!')">Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                {{-- Sidebar --}}
                <div id="sidebar">
                    <a href="{{ url('admin/users') }}">Users</a>
                    <a href="{{ route('skills.index') }}">Skill</a>
                    <a href="{{ url('admin/projects/') }}">Project</a>
                    <a href="{{ url('admin/student_counts/') }}">Student Count</a>
                    <a href="{{ url('admin/categories') }}">Category</a>
                    <a href="{{ url('admin/posts') }}">Post</a>
                </div>

                {{-- Main Content --}}
                <div id="main">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap JS Link --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('javascript')
</body>

</html>
