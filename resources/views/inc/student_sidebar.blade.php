<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('local_assets/pupLogo.webp')}}" class="img-circle" alt="User Image">
        </div>
      </div>
     

      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu"  data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="{{ url('student/announcement/') }}">
           <i class="fa fa-sticky-note"></i> <span>Announcements</span>
          </a>
        </li>
        <li class="active">
          <a href="{{ url('student/profile/') }}">
            <i class="fa fa-user"></i> <span>Profile</span>
          </a>
        </li>
      </ul>
  
    </section>
    <!-- /.sidebar -->
  </aside>