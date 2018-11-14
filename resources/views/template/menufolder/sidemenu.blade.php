<aside id="menubar" class="menubar light">
    <div class="app-user">
      <div class="media">
        <div class="media-left">
          <div class="avatar avatar-md avatar-circle">
            <a href="javascript:void(0)"><img class="img-responsive" src="assets/images/221.jpg" alt="avatar"/></a>
          </div><!-- .avatar -->
        </div>
        <div class="media-body">
          <div class="foldable">
            <h5><a href="javascript:void(0)" class="username">Hi {{Auth::user()->username}}</a></h5>
            <input type="hidden" id="user_username" value="{{Auth::user()->username}}">
            <ul>
              <li class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <small>{{Auth::user()->platform}}
                      <input type="hidden" id="user_platform" value="{{Auth::user()->platform}}">
                      </small>
                  <span class="caret"></span>
                </a>
                
              </li>
            </ul>
          </div>
        </div><!-- .media-body -->
      </div><!-- .media -->
    </div><!-- .app-user -->
  
    <div class="menubar-scroll">
      <div class="menubar-scroll-inner">
        <ul class="app-menu">
    
           <li class="has-submenu" >
            <a href="profile" >
              <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
               <span class="menu-text" style="color:red;">Refresh</span> 
              
            </a>
       
          </li>
        
          
      </div>
            <!--super menu close here-->
  
            
           
           
  
           
      
       
          
         
        </ul><!-- .app-menu -->
      </div><!-- .menubar-scroll-inner -->
    </div><!-- .menubar-scroll -->
  </aside>