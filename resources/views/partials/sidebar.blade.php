<!-- Sidebar navigation-->
<nav class="sidebar-nav">
    <ul id="sidebarnav" class="p-t-30">
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/') }}"
                aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
        </li>

        @if (Auth::guard('user')->check())
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="{{ url('dashboard/datapegawai') }}" aria-expanded="false"><i
                        class="mdi mdi-view-dashboard"></i><span class="hide-menu">Data
                        Pegawai</span></a>
            </li>

            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="{{ url('dashboard/dataatasan') }}" aria-expanded="false"><i
                        class="mdi mdi-view-dashboard"></i><span class="hide-menu">Data
                        Atasan</span></a>
            </li>
        @endif

        @if (Auth::guard('pegawai')->check())
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="{{ url('dashboard/pengajuancuti') }}" aria-expanded="false"><i
                        class="mdi mdi-view-dashboard"></i><span class="hide-menu">Ajukan Cuti</span></a>
            </li>
        @endif

        @if (Auth::guard('atasan')->check())
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="{{ url('dashboard/persetujuanpertama') }}" aria-expanded="false"><i
                        class="mdi mdi-view-dashboard"></i><span class="hide-menu">Ajukan Cuti</span></a>
            </li>
        @endif
    </ul>
</nav>
<!-- End Sidebar navigation -->
