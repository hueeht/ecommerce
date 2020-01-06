<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href={{ route('admin.index') }}>{{ trans('admin.home') }}</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>
    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    <!-- Navbar -->
    <ul class="navbar-nav ">
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="display: unset !important;">
            <ul class="nav nav-pills mr-auto justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-danger notify-count-icon">{{ Auth::user()->unreadNotifications->count() }}</span>
                        <i class="fa fa-bell"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="head text-light bg-dark">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12">
                                    <span class="notify-count-dropdown">Notifications ({{ Auth::user()->unreadNotifications->count() }})</span>
                                    <a href="" class="float-right text-light">Mark all as read</a>
                                </div>
                            </div>
                        </li>
                        <div id="notify-message">
                        @foreach(Auth::user()->unreadNotifications as $notification)
                            <li class="notification-box">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-3 text-center">
                                        <img src="{{ asset('storage/images/icon-system.png') }}" class="w-50 rounded-circle">
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8">
                                        <strong class="text-info">{{ $notification->data['user_name'] }}</strong>
                                        <div>
                                            Already ordered
                                        </div>
                                        <small class="text-warning">{{ $notification->created_at }}</small>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        </div>
                        <li class="footer bg-dark text-center">
                            <a href="" class="text-light">View All</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </ul>
</nav>

<style>
    body{
        background-color: #f1f1f1;
    }
    .nav-pills .nav-link.active, .nav-pills .show > .nav-link{
        background-color: #17A2B8;
    }
    .dropdown-menu{
        top: 60px;
        right: 0px;
        left: unset;
        width: 460px;
        box-shadow: 0px 5px 7px -1px #c1c1c1;
        padding-bottom: 0px;
        padding: 0px;
    }
    .dropdown-menu:before{
        content: "";
        position: absolute;
        top: -20px;
        right: 12px;
        border:10px solid #343A40;
        border-color: transparent transparent #343A40 transparent;
    }
    .head{
        padding:5px 15px;
        border-radius: 3px 3px 0px 0px;
    }
    .footer{
        padding:5px 15px;
        border-radius: 0px 0px 3px 3px;
    }
    .notification-box{
        padding: 10px 0px;
    }
    .bg-gray{
        background-color: #eee;
    }
    @media (max-width: 640px) {
        .dropdown-menu{
            top: 50px;
            left: -16px;
            width: 290px;
        }
        .nav{
            display: block;
        }
        .nav .nav-item,.nav .nav-item a{
            padding-left: 0px;
        }
        .message{
            font-size: 13px;
        }
    }
</style>
