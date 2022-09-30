<nav class="navbar navbar-default" role="navigation" style="height: 100%;">
    <div class="topnav">
        <a class="" href="#">
            <img class="desktop-logo" src="#" alt="Web-House"
                title="Web-House"/>
        </a>
        <div class="login-container">
            <span><a href="{{ route('lawyer.dashboard.view') }}" style="float: left;" type="submit">
                Dashboard
            </a></span>
            <span style="float: left; color: white;"> | </span>
            <span><a href="{{ route('lawyer.profile.view', ['id' => $lawyer->id]) }}" style="float: left;" type="submit"><span class="glyphicon glyphicon-user"></span>
                {{ $lawyer->full_name }}
            </a></span>
            <!-- @if(count($lawyer->childLawyer))
                <span style="float: left; padding: 14px 0;"> | </span>
                <span><a href="{{ route('lawyer.user.manager') }}" style="float: left;" type="submit">User Manager</a>    </span>
            @endif -->
            {{-- <a style="float: right;" href="{{ route('lawyer.logout') }}">logout</a> --}}
        </div>
    </div>
</nav>