<div class="container manage">
    <div class="row">
        <div class="col-md-6">
            <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
            <a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </div>
        <div class="col-md-6 text-right">
            @if (Auth::check())
                <div class="dropdown">
                    Xin chào <a href="" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}</a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Thông tin tài khoản</a>
                    <a class="dropdown-item" href="logout">Đăng xuất</a>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="login">Đăng nhập</a>
                <a href="{{ route('register') }}" class="register">Đăng kí</a>
            @endif
        </div>
    </div>
</div>