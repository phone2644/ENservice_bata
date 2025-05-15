<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;700&display=swap" rel="stylesheet">
    <style>
        .ck-editor__editable_inline {
            min-height: 200px
        }
    </style>

   <!-- Scripts -->
   @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/preloader.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sass.css') }}">
   
    <!-- bootstrap 5 -->
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <!-- CKeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>

</head>

<body id="body_login">
    <div id="preloader"></div>
    <div id="app">
        <nav class="navbar  navbar-light ">
            <div class="container-fluid">
                <a class="navbar-brand" href="">Navbar</a>
                

                    <ul class=" navbar-nav " style="margin: 0 5rem;">

                        {{-- ------------------------------------------ --}}
                        <div class="nav-item ">
                            <li class="dropdown-link">
                                <label id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                    role="button" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </label>
                                <ul class="dropdown" style="position: absolute; ">
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }} ">Logout</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                </ul>
                            </li>
                        </div>
                    </ul>

                </div>
            </div>
        </nav>
        <main>

            @yield('content')

        </main>
    </div>

    <script>
        $('.buttomClosed').click(function() {
            //ดึงข้อมูลทั้งหมดมาจาก content
            // alert(555);
            var equipment = $(this).data('equipment');
            var position = $(this).data('position');
            // alert(position);
            $('#equipment').html(equipment);
            $('#equipment_id').val(equipment);
            $('#position').html(position);
            $('#position_id').val(position);



        });
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function() {
            loader.style.display = "none";
        })




     
    </script>


</body>

</html>
