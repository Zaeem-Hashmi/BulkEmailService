<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav pt-2">
            <li class=" d-flex justify-content-between">
                        <h1>Email</h1>
                    
                <a class="nav-link modern-nav-toggle pr-0 d-xl-none" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a>
            </li>
           
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content pt-5">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item pt-1"><a class="d-flex align-items-center border rounded" href="/user"><i class="fa-solid fa-euro-sign"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Users</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="/users"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">User List</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item pt-1"><a class="d-flex align-items-center border rounded" href="/roles"><i data-feather='award'></i><span class="menu-title text-truncate" data-i18n="Dashboards">Roles</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="/roles"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">Roles List</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item pt-1"><a class="d-flex align-items-center border rounded" href="/email"><i data-feather='mail'></i><span class="menu-title text-truncate" data-i18n="Dashboards">Emails</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="/email"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">Emails Info</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('emialList.create')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">Add Email List</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item pt-1"><a class="d-flex align-items-center border rounded" href="/roles"><i data-feather='award'></i><span class="menu-title text-truncate" data-i18n="Dashboards">Settings</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('settings.edit')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">Edit Mail Settings</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->