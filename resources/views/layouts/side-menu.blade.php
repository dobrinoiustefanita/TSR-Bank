  <aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/assets/img/{{Auth()->user()->photo}} " class="img-circle" alt="Member Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth()->user()->name}}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>



    <ul class="sidebar-menu" data-widget="tree" id="side-menu-tree">
      <li class="header">MENU</li>
      <!-- Optionally, you can add icons to the links -->
      <li id="side-menu-profile">
        <a href="{{route('profile')}}">
          <i class="fa fa-user"></i>
          <span>My Profile</span>

        </a>

      </li>
      <li id="side-menu-members"><a href="{{route('member_list')}}"><i class="fa fa-male"></i><span>Members</a></span></li>
      <li id="side-menu-feedbacks">
        <a href="{{route('show_feedbacks')}}"><i class="fa fa-pencil"></i><span>FeedBacks</span></a>
      </li>

      @if(Auth()->user()->isAdmin==1)

      <li class="treeview">
        <a href=""><i class="fa fa-table"></i><span>Stats</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li id="side-menu-users"><a href="{{route('user_stats')}}"><i class="fa fa-table"></i><span>Members</span></a></li>
          <li id="side-menu-labels"><a href="{{route('label_stats')}}"><i class="fa fa-table"></i><span>Projects</span></a></li>
        </ul>
      </li>


      <li class="treeview">
        <a href=""><i class="fa fa-link"></i> <span>Admin Menu</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>


        <ul class="treeview-menu">
          <li id="side-menu-users-list"><a href="{{route('GetUserList')}}"><i class="fa fa-link"></i> <span>Members</span></a></li>
          <li id="side-menu-values"><a href="{{route('GetValueList')}}"><i class="fa fa-link"></i> <span>Values</span></a></li>
          <li id="side-menu-skills"><a href="{{route('GetSkillList')}}"><i class="fa fa-link"></i> <span>Skills</span></a></li>
          <li id="side-menu-labels-list"><a href="{{route('GetLabelList')}}"><i class="fa fa-link"></i> <span>Projects</span></a></li>


        </ul>
      </li>
      @endif
      @if(Auth()->user()->isAdmin==0)

      <li id="side-menu-label"><a href="{{route('label_stats')}}"><i class="fa fa-table"></i><span>Stats</span></a></li>

      @endif

      <li id="side-menu-settings"><a href="{{route('show-edit-user')}}"><i class="fa fa-wrench"></i><span>Settings</span></a></li>
      <li class="treeview">
      <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
          <i class="fa fa-arrow-left"></i><span>{{ __('Logout') }}</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>

