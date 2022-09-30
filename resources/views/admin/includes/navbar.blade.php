<nav class="navbar navbar-default" role="navigation" style="height: 100%;">
    <div class="topnav">
        <a class="" href="#">Web-House</a>
        <div class="login-container">
            <span><a href="{{ route('admin.claims.index') }}" id="claim-id" style="float: left;">
                    Claims
                </a></span>
            <span style="float: left; color: white;"> | </span>
            <span><a href="{{ route('admin.lawyers.index') }}" style="float: left;">User Manager</a>
            </span>
            <span style="float: left; color: white;"> | </span>
            <span><a href="{{ route('admin.plans.index') }}" style="float: left;">Plans</a>
            </span>
            {{-- <a style="float: right;" href="{{ route('lawyer.logout') }}">logout</a> --}}
        </div>
    </div>
</nav>
