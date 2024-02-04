<div class="main-menu menu-fixed menu-dark menu-accordion menu-bordered menu-shadow">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ request()->is('home*') ? 'active' : '' }}">
                <a class="menu-item" href="{{ route('home') }}" data-i18n="nav.dash.crm">
                    <i class="icon-home"></i>
                    Dashboard
                </a>
            </li>
            @role('admin')
                <li class=" nav-item">
                    <a href="">
                        <i class="icon-layers"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">
                            Master Data
                        </span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{ request()->is('ayam*') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('ayam.index') }}" data-i18n="nav.dash.crm">
                                Ayam
                            </a>
                        </li>
                        <li class="{{ request()->is('kandang*') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('kandang.index') }}" data-i18n="nav.dash.crm">
                                Kandang
                            </a>
                        </li>
                        <li class="{{ request()->is('barang*') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('barang.index') }}" data-i18n="nav.dash.crm">
                                Barang
                            </a>
                        </li>
                        <li class="{{ request()->is('inventaris*') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('inventaris.index') }}" data-i18n="nav.dash.crm">
                                Inventaris
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=" navigation-header">
                    <span data-i18n="nav.category.layouts">
                        Pemasukan
                    </span>
                    <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right"
                        data-original-title="Pemasukan"></i>
                </li>
                <li class=" nav-item">
                    <a href="">
                        <i class="icon-grid"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">
                            Pemasukan Inventaris
                        </span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{ request()->is('pemasukan-inventaris*') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('pemasukan-inventaris.data-new') }}"
                                data-i18n="nav.dash.crm">
                                Data Baru
                            </a>
                        </li>
                        <li class="{{ request()->is('kelola-pemasukan-inventaris*') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('kelola-pemasukan-inventaris.time-index') }}"
                                data-i18n="nav.dash.crm">
                                Kelola Inventaris
                            </a>
                        </li>
                        <li class="{{ request()->is('laporan-pemasukan-inventaris*') ? 'active' : '' }}">
                            <a class="menu-item"
                                href="{{ route('laporan-pemasukan-inventaris.report-pemasukan-inventaris') }}"
                                data-i18n="nav.dash.crm">
                                Laporan Inventaris
                            </a>
                        </li>
                    </ul>
                </li>

                <li class=" nav-item">
                    <a href="">
                        <i class="icon-grid"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">
                            Pemasukan Ayam
                        </span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{ request()->is('pemasukan-ayam*') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('pemasukan-ayam.new-data-ayam') }}"
                                data-i18n="nav.dash.crm">
                                Data Baru
                            </a>
                        </li>
                        <li class="{{ request()->is('kelola-pemasukan-ayam*') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('kelola-pemasukan-ayam.form-tanggal') }}"
                                data-i18n="nav.dash.crm">
                                Kelola Pemasukan Ayam
                            </a>
                        </li>
                        <li class="{{ request()->is('laporan-pemasukan-ayam*') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('laporan-pemasukan-ayam.report-pemasukan-ayam') }}"
                                data-i18n="nav.dash.crm">
                                Laporan Pemasukan Ayam
                            </a>
                        </li>
                    </ul>
                </li>

                <li class=" navigation-header">
                    <span data-i18n="nav.category.layouts">
                        Pengeluaran
                    </span>
                    <i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right"
                        data-original-title="Pemasukan"></i>
                </li>
                <li class="{{ request()->is('pengeluaran*') ? 'active' : '' }}">
                    <a class="menu-item" href="{{ route('pengeluaran.index-ayam') }}" data-i18n="nav.dash.crm">
                        <i class="icon-docs"></i>
                        Pengeluaran
                    </a>
                </li>

                <li class=" nav-item">
                    <a href="">
                        <i class="icon-social-dropbox"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">
                            Produksi
                        </span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{ request()->is('produksi*') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('produksi.create-produksi') }}" data-i18n="nav.dash.crm">
                                Data Baru
                            </a>
                        </li>
                        <li class="{{ request()->is('kelola-produksi*') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('kelola-produksi.form-tanggal') }}"
                                data-i18n="nav.dash.crm">
                                Kelola Produksi
                            </a>
                        </li>
                        <li class="{{ request()->is('laporan-produksi*') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('laporan-produksi.report') }}"
                                data-i18n="nav.dash.crm">
                                Laporan Produksi
                            </a>
                        </li>
                    </ul>
                </li>
            @endrole

            @role('user')
                <li class=" nav-item">
                    <a href="">
                        <i class="icon-social-dropbox"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">
                            Produksi
                        </span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{ request()->is('produksi*') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('produksi.create-produksi') }}"
                                data-i18n="nav.dash.crm">
                                Data Baru
                            </a>
                        </li>
                        <li class="{{ request()->is('kelola-pemasukan-ayam*') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('kelola-pemasukan-ayam.form-tanggal') }}"
                                data-i18n="nav.dash.crm">
                                Kelola Pemasukan Ayam
                            </a>
                        </li>
                        <li class="{{ request()->is('laporan-pemasukan-ayam*') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('laporan-pemasukan-ayam.report-pemasukan-ayam') }}"
                                data-i18n="nav.dash.crm">
                                Laporan Pemasukan Ayam
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item">
                    <a href="">
                        <i class="icon-grid"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">
                            Pemasukan Inventaris
                        </span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{ request()->is('pemasukan-inventaris*') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('pemasukan-inventaris.data-new') }}"
                                data-i18n="nav.dash.crm">
                                Data Baru
                            </a>
                        </li>
                        <li class="{{ request()->is('kelola-pemasukan-inventaris*') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('kelola-pemasukan-inventaris.time-index') }}"
                                data-i18n="nav.dash.crm">
                                Kelola Inventaris
                            </a>
                        </li>
                        <li class="{{ request()->is('laporan-pemasukan-inventaris*') ? 'active' : '' }}">
                            <a class="menu-item"
                                href="{{ route('laporan-pemasukan-inventaris.report-pemasukan-inventaris') }}"
                                data-i18n="nav.dash.crm">
                                Laporan Inventaris
                            </a>
                        </li>
                    </ul>
                </li>
            @endrole
        </ul>
    </div>
</div>
