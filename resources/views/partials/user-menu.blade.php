<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">logged as {{ auth()->user()->name }} <img alt="@rrantz" class="avatar float-left mr-1" src="{{ auth()->user()->avatar }}" height="20" width="20"> <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li><a href="{{ action('HomeController@showDashboard') }}">Dashboard</a></li>
        <li role="separator" class="divider"></li>
        <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</li>
