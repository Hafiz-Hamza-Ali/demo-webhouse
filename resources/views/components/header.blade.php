
<header class="logo-navbar">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="slide-nav">
          <div class="header-container">
            <div class="inner-overlay"> </div>
            <div class="row header-row">
              <div class="navbar-header col-sm-2">
                <a class="navbar-toggle">
                  <div class="sr-only">
                    <div class="header-heading">Software, Mobile App, Web Application Development Company, Services UK</div>
                  </div>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </a>
                <a href="..\index.html" class="logo"></a>
              </div>
              <div class="col-sm-10 right-menu">
                <nav id="slidemenu">
                  <div class="inner-menu">
                    <div class="navbar-toggle cross">
                      <span class="first"></span>
                      <span class="second"></span>
                    </div>
                    <ul id="navigation" class="nav navbar-nav">
                      <li class="nav-item">
                      @if(count($data)>0)
                            @foreach($data as $value)
                        <a href="..\services\index.html">{{$value['name'] }}</a>
                        @endforeach
                          @endif
                        <!-- git init -->
                  </div>
                </nav>
                <div class="nav-menu">
                  <span> </span>
                  <span class="right-ar"> </span>
                  <span> </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>