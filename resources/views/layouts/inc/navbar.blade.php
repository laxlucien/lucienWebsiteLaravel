<nav class="flex-div">
            <div class="nav-left flex-div">
                <h3><a href="{{ url('/') }}">Lucien's Place For Things</a></h3>
            </div>
            @guest
                <div class="nav-right flex-div">
                    <h3><a style="padding: 10px" href="{{ url('about') }}">About</a></h3>
                    <h3><a href="{{ url('photoWall') }}">Photos</a></h3>
                    <h3><a href="{{ url('sudoku') }}" style="padding: 10px">Sudoku</a></h3>
                    <h3><a href="{{ url('login') }}">Login</a></h3>
                    <h3><a href="{{ url('register') }}" style="padding: 10px">Register</a></h3>
                </div>
            @else
                <div class="nav-right flex-div">
                    <h3><a style="padding: 10px" href="{{ url('about') }}">About</a></h3>
                    <h3><a href="{{ url('photoWall') }}">Photos</a></h3>
                    <h3><a href="{{ url('sudoku') }}" style="padding: 10px">Sudoku</a></h3>
                    <h3 style="color:white"><a href="{{ url('profile') }}"><u>{{Auth::user()->username}}</u></a></h3>
                    <h3><a href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="padding: 10px">Logout</a></h3>
                </div>
            @endguest
        </nav>
        <form id="logout-form" action="{{ url('logout') }}" method="POST">
                        @csrf
                    </form>