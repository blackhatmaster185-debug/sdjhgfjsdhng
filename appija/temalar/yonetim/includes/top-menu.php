<div class="page-header">
    <div class="header-wrapper row m-0">


        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="<?= admin_url() ?>"><img class="img-fluid" src="<?= admin_assets() ?>/images/logo/logo.png" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
        </div>


        <div class="left-header col horizontal-wrapper ps-0">
            Online: <span class="text-primary" id="onlinesay"></span>
        </div>
        <div class="nav-right col-9 pull-right right-header p-0">
            <ul class="nav-menus">
                <!--
                        <li class="onhover-dropdown">
                            <div class="notification-box"><i data-feather="bell"> </i><span class="badge rounded-pill badge-secondary">4 </span></div>
                            <ul class="notification-dropdown onhover-show-div">
                                <li><i data-feather="bell"></i>
                                    <h6 class="f-18 mb-0">Notitications</h6>
                                </li>
                                <li>
                                    <p><i class="fa fa-circle-o me-3 font-primary"> </i>Delivery processing <span class="pull-right">10 min.</span></p>
                                </li>
                                <li>
                                    <p><i class="fa fa-circle-o me-3 font-success"></i>Order Complete<span class="pull-right">1 hr</span></p>
                                </li>
                                <li>
                                    <p><i class="fa fa-circle-o me-3 font-info"></i>Tickets Generated<span class="pull-right">3 hr</span></p>
                                </li>
                                <li>
                                    <p><i class="fa fa-circle-o me-3 font-danger"></i>Delivery Complete<span class="pull-right">6 hr</span></p>
                                </li>
                                <li><a class="btn btn-primary" href="#">Check all notification</a></li>
                            </ul>
                        </li>
                        -->
                <li>
                    <div class="mode" id="dark_mode" data-val="<?= isset($_COOKIE['dark_mode']) ? $_COOKIE['dark_mode'] : 0 ?>">
                        <i class="fa fa-moon-o"></i>
                    </div>
                </li>


                <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>

                <li class="profile-nav onhover-dropdown p-0 mr-0">
                    <div class="media profile-media"><img class="b-r-10" src="<?= admin_assets() ?>/images/dashboard/profile.jpg" alt="">
                        <div class="media-body"><span><?= admin()->adsoyad ?></span>
                            <p class="mb-0 font-roboto">Menü <i class="middle fa fa-angle-down"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li><a href="<?= admin_url('yoneticiler/duzenle/' . admin()->id) ?>"><i data-feather="user"></i><span>Hesabım </span></a></li>
                        <li><a href="<?= admin_url('giris/cikis') ?>"><i data-feather="log-in"> </i><span>Çıkış</span></a></li>
                    </ul>
                </li>

            </ul>
        </div>

    </div>
</div>