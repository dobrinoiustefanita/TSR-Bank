 <!-- Logo -->
 <a  class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>F</b>A</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Feedback</b>App</span>
      </a>
  
      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" id="notification-dropdown">
                @php
                    $user_notifications = App\Notification::where(function($query) {
                      $query->where('type',1)->where('to_user_id',Auth::user()->id)->whereNull('read_at');
                    })->orWhere(function($query) {
                      $query->where('type',2)->where('from_user_id',Auth::user()->id)->whereNull('read_at');
                    })->get()->toArray();

                    $count = count($user_notifications);
                    
                @endphp
                <i class="fa fa-bell-o fa-lg"></i>
                <span id="notifications_number" class="label label-warning">
                  {{ $count }}
                </span>
              </a>
              <ul class="dropdown-menu" >
                <li class="header">You have <b class="inline-notification-number">{{ $count }}</b> new notifications</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu" id="notification-wrapper" style="max-height: 300px;">
                    
                  </ul>
                </li>
                
              </ul>
            </li>
            
          </ul>
        </div>
      </nav>