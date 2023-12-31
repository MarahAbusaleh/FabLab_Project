<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="">
                <img src="{{ asset('logo.png') }}" width="60px">
                <span class="brand-name">FabLab</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-left" data-simplebar style="height: 100%;">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li class="{{ set_active(['dashboard']) }}">
                    <a class="sidenav-item-link" href="{{ url('admin/dashboard') }}">
                        <i class="mdi mdi-briefcase-account-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="{{ set_active(['admin-users.*']) }}">
                    <a class="sidenav-item-link" href="{{ route('admin-users.index') }}">
                        <i class="mdi mdi-account-star"></i>
                        <span class="nav-text">Admins</span>
                    </a>
                </li>
                <li class="{{ set_active(['home-page.*']) }}">
                    <a class="sidenav-item-link" href="{{ route('home-page.index') }}">
                        <i class="mdi mdi-book-variant"></i>
                        <span class="nav-text">Home Page</span>
                    </a>
                </li>
                <li class="{{ set_active(['home-content.*']) }}">
                    <a class="sidenav-item-link" href="{{ route('home-content.index') }}">
                        <i class="mdi mdi-book-variant"></i>
                        <span class="nav-text">Home Content Section</span>
                    </a>
                </li>
                <li class="{{ set_active(['home-about.*']) }}">
                    <a class="sidenav-item-link" href="{{ route('home-about.index') }}">
                        <i class="mdi mdi-book-variant"></i>
                        <span class="nav-text">Home About Section</span>
                    </a>
                </li>
                <li class="{{ set_active(['contact-info.*']) }}">
                    <a class="sidenav-item-link" href="{{ route('contact-info.index') }}">
                        <i class="mdi mdi-book-variant"></i>
                        <span class="nav-text">Contact Info</span>
                    </a>
                </li>
                <li class="{{ set_active(['components.*']) }}">
                    <a class="sidenav-item-link" href="{{ route('components.index') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="nav-text">Components</span>
                    </a>
                </li>
                <li class="{{ set_active(['teams.*']) }}">
                    <a class="sidenav-item-link" href="{{ route('teams.index') }}">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">Teams</span>
                    </a>
                </li>
                <li class="{{ set_active(['events.*']) }}">
                    <a class="sidenav-item-link" href="{{ route('events.index') }}">
                        <i class="mdi mdi-chart-histogram"></i>
                        <span class="nav-text">Events</span>
                    </a>
                </li>

                <li class="{{ set_active(['features.*']) }}">
                    <a class="sidenav-item-link" href="{{ route('features.index') }}">
                        <i class="mdi mdi-newspaper"></i>
                        <span class="nav-text">Features</span>
                    </a>
                </li>
                <li class="{{ set_active(['roadmap.*']) }}">
                    <a class="sidenav-item-link" href="{{ route('roadmap.index') }}">
                        <i class="mdi mdi-file-image"></i>
                        <span class="nav-text">Road Map</span>
                    </a>
                </li>
                {{-- <li class="{{ set_active(['admin.categories.*']) }}">
                    <a class="sidenav-item-link" href="{{ route('admin.categories.index') }}">
                        <i class="mdi mdi-certificate"></i>
                        <span class="nav-text">Categories</span>

                <li class="{{ set_active(['components.*']) }}">
                    <a class="sidenav-item-link" href="{{ route('components.index') }}">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">Components</span>
                    </a>
                </li>
                <li class="{{ set_active(['home-page.*']) }}">
                    <a class="sidenav-item-link" href="{{ route('home-page.index') }}">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">Home Page</span>
                    </a>
                </li>
                
                <li class="section-title">
                    Apps
                </li>
                <li>
                    <a class="sidenav-item-link" href="chat.html">
                        <i class="mdi mdi-wechat"></i>
                        <span class="nav-text">Chat</span>
                    </a>
                </li>
                <li>
                    <a class="sidenav-item-link" href="contacts.html">
                        <i class="mdi mdi-phone"></i>
                        <span class="nav-text">Contacts</span>
                    </a>
                </li>
                <li>
                    <a class="sidenav-item-link" href="team.html">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">Team</span>
                    </a>
                </li>
                <li>
                    <a class="sidenav-item-link" href="calendar.html">
                        <i class="mdi mdi-calendar-check"></i>
                        <span class="nav-text">Calendar</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</aside>
