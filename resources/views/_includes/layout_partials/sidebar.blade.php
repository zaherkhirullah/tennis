<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('/bower_components/admin-lte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{Auth::user()->adisoyadi}}</p>
              <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
              <a href="{{route('admin')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Rezervasyounlar</span>
                <span class="pull-right-container">
                  <span class="fa fa-angle-left pull-right"></span>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="{{route('rezervasyon.list')}}">
                    <i class="fa fa-circle-o" style="color:yellow;"></i>
                    All Rezervasyounlar
                  </a>
                </li>
                <li>
                  <a href="{{route('rezervasyon.create')}}">
                    <i class="fa fa-circle-o" style="color:green;"></i>
                    Rezervasyon oluştur
                  </a>
                  </li>
                <li>
                  <a href="{{route('rezervasyon.all_deleted')}}">
                    <i class="fa fa-circle-o" style="color:red;"></i>
                    all_deleted rezervasyonlar
                  </a>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Kortlar</span>
                <span class="pull-right-container">
                  <span class="fa fa-angle-left pull-right"></span>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="{{route('kort.index')}}">
                    <i class="fa fa-circle-o" style="color:yellow;"></i>
                    All Kortlar
                  </a>
                </li>
                <li>
                  <a href="{{route('kort.create')}}">
                    <i class="fa fa-circle-o" style="color:green;"></i>
                    kort oluştur
                  </a>
                  </li>
                <li>
                  <a href="{{route('kort.all_deleted')}}">
                    <i class="fa fa-circle-o" style="color:red;"></i>
                    all_deleted kortlar
                  </a>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>servisler</span>
                <span class="pull-right-container">
                  <span class="fa fa-angle-left pull-right"></span>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="{{route('servis.index')}}">
                    <i class="fa fa-circle-o" style="color:yellow;"></i>
                    All servisler
                  </a>
                </li>
                <li>
                  <a href="{{route('servis.create')}}">
                    <i class="fa fa-circle-o" style="color:green;"></i>
                    servis oluştur
                  </a>
                  </li>
                <li>
                  <a href="{{route('servis.all_deleted')}}">
                    <i class="fa fa-circle-o" style="color:red;"></i>
                    all deleted servisler
                  </a>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>kiralayanlar</span>
                <span class="pull-right-container">
                  <span class="fa fa-angle-left pull-right"></span>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="{{route('kiralayan.index')}}">
                    <i class="fa fa-circle-o" style="color:yellow;"></i>
                    All kiralayanlar
                  </a>
                </li>
                <li>
                  <a href="{{route('kiralayan.all_deleted')}}">
                    <i class="fa fa-circle-o" style="color:red;"></i>
                    all_deleted kiralayanlar
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a href="{{route('Acontacts.index')}}">
                <i class="fa fa-th"></i> <span>Contacts</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-green">new</small>
                </span>
              </a>
            </li>
            {{--  site settings   --}}
            <li class="header">Site Settings</li>
          <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
    