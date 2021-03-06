<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<div class="nav-side-menu">
    <div class="brand"><a href="{{url('/')}}">{!! Html::image('img/coosto_logo.png') !!}</a></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="/">
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li>
                @if(  Auth::user()->roles  == 'manager')
                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-globe fa-lg"></i> Users <span class="arrow"></span></a>
                </li>

                <ul class="sub-menu collapse" id="service">
                  <li><a href="{{ url('users') }}">Manage users</a></li>
                  <li><a href="{{ url('projects') }}">Manage Projects</a></li>
                </ul>

                 <li>
                  <a href="{{ url('profile') }}">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                  </li>
                @endif
                <li>
                    <a href="{{ action('UsersController@logout') }}" class="btn btn-primary btn-logout" style="a">Logout</a>
                </li>
            </ul>
     </div>
</div>