<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/dist/css/style.css">
    <link rel="stylesheet" href="/dist/css/reponsive.css">
    <link rel="stylesheet" href="/dist/css/mode.css">
    <link rel="stylesheet" href="/dist/css/course.css">
    <link rel="stylesheet" href="/dist/css/login.css">
</head>
<div id="main">
    <div id="header">
        <ul class="nav-pc" id="nav">
            <li><a id="heading-logo" style="font-size: 20px;" href={{route('homeUser')}}>Quiz<span>AI</span></a>
            </li>
            <li><a href=" #about">Giới thiệu</a></li>
            <li>
                <a>Chủ đề
                    <i class="nav-arrow-down ti-angle-down"></i>
                </a>
                <ul class="subnav">
                    <li><a href={{route('game')}}>Tất cả</a></li>
                    <li><a href={{route('topic')}}>Toán</a></li>
                    <li><a href={{route('topic')}}>Lý</a></li>
                    <li><a href={{route('topic')}}>Hóa</a></li>
                    <li><a href={{route('game')}}>Anh</a></li>
                    <li><a href={{route('topic')}}>Sử</a></li>
                </ul>
            </li>
            <li><a href="#contact">Liên hệ</a></li>
            <li><a href="#contribute">Góp ý</a></li>
            <li><a id="reload1" href="#qna">Hỏi đáp</a></li>
            <li ng-if="Student != null">
                <a>Chào,{{old('name',$users->name)}}  {{--chỗ này cho nó hiển thị username--}}
                    <i class="nav-arrow-down ti-angle-down"></i>
                </a>
                <ul class="subnav subnav-user">
                    <li><a href={{route('update')}}>Chỉnh sửa thông tin</a></li>
                    <li><a ng-if="Student.role == 1" href="#manager">Quản lí tài khoản</a></li>
                    <li><a href={{route('updatePassword')}}>Đổi mật khẩu</a></li>
                    <li><a href="{{route('home')}}">Đăng xuất</a></li>
                </ul>
            </li>

            <!-- ngIf: Student != null -->

        </ul>

        <div style="margin-right: 0px;" class="search-btn mode">
            <i onclick="changesIcon(this)" class="bx bx-sun bx-moon sun-moon"></i>
            <!-- <label class="switch">
                <input type="checkbox">
                <span class="slider-btn"></span>
            </label> -->
        </div>
        <!-- search -->
        <div class="search-btn" data-toggle="modal" data-target="#myModal" id="search">
            <i class="search-icon ti-search"> </i>
        </div>


        <div id="mobile-menu" class="mobile-menu-btn">

            <!-- <i id="menu-i" class="menu-icon ti-menu"></i> -->
            <button id="menu-i" class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div>
        <div class="mobile-menu-btn mode">
            <!-- <i class="search-icon ti-search" id="search-mobile"> </i> -->
            <i onclick="changesIcon(this)" class="bx bx-sun bx-moon sun-moon"></i>
        </div>

        <!-- .nav -->
    </div>
</div>

</html>
