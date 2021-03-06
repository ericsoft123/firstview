<nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary" style="background-color: #22264b">
  
    <!-- navbar header -->
    <div class="navbar-header" >
      <button type="button" id="menubar-toggle-btn" class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-box"><span class="hamburger-inner"></span></span>
      </button>
  
      <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="zmdi zmdi-hc-lg zmdi-more"></span>
      </button>
  
      <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="zmdi zmdi-hc-lg zmdi-search"></span>
      </button>
  
      <a href="index.html" class="navbar-brand">
        <span class="brand-icon"></span>
        <span class="brand-name"></span>
      </a>
    </div><!-- .navbar-header -->
    
    <div class="navbar-container container-fluid" style="background-color: #22264b">
      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <ul class="nav navbar-toolbar navbar-toolbar-left navbar-left">
          <li class="hidden-float hidden-menubar-top">
            <a href="javascript:void(0)" role="button" id="menubar-fold-btn" class="hamburger hamburger--arrowalt is-active js-hamburger">
              <span class="hamburger-box"><span class="hamburger-inner"></span></span>
            </a>
          </li>
          <li>
            <h5 class="page-title hidden-menubar-top hidden-float">Dashboard</h5>
          </li>
        </ul>
  
        <ul class="nav navbar-toolbar navbar-toolbar-right navbar-right">
         
        
         
         <li class="dropdown">
           
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-hc-lg zmdi-notifications"></i></a>
         
          </li>
  
          <li class="dropdown">
            <a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
            
          </li>
  
         
  
          
        </ul>
      </div>
    </div><!-- navbar-container -->
  </nav>