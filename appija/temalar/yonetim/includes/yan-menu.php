<!-- Page Sidebar Start-->
<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href="<?= admin_url() ?>">
				<img class="img-fluid for-light" style="width:75% !important" src="<?= admin_assets() ?>/images/logo/logo.png" alt="">
				<img class="img-fluid for-dark" style="width:75% !important" src="<?= admin_assets() ?>/images/logo/logo_dark.png" alt="">
			</a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
		</div>
		<div class="logo-icon-wrapper">
			<a href="<?= admin_url() ?>">
				<img class="img-fluid" src="<?= admin_assets() ?>/images/logo/logo-icon.png" alt="">
			</a>
		</div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<style>
						.simplebar-content {
							text-align: center;
						}

						.simplebar-content-wrapper .simplebar-content>li {

							text-align: left;
						}
					</style>
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1">Genel <br></h6>
							<p>İstatistikler, veriler</p>
						</div>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title link-nav" href="<?= admin_url() ?>">
							<i data-feather="home"> </i>
							<span>İstatistikler</span>
						</a>
					</li>

					<li class="sidebar-main-title">
						<div>
							<h6>Yönetim</h6>
							<p>Düzenlemeler, araçlar</p>
						</div>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title" href="#">
							<i data-feather="credit-card"></i><span>Binler</span>
						</a>
						<ul class="sidebar-submenu">
							<li><a href="<?= admin_url("binler") ?>">Binler</a></li>
							<li><a href="<?= admin_url("binler/ekle") ?>">Bin Ekle</a></li>
						</ul>
					</li>

					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title" href="#">
							<i data-feather="shield"></i><span>Banlananlar</span>
						</a>
						<ul class="sidebar-submenu">
							<li><a href="<?= admin_url("banlar") ?>">Banlananlar</a></li>
							<li><a href="<?= admin_url("banlar/ekle") ?>">IP Banla</a></li>
						</ul>
					</li>

					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title" href="#">
							<i data-feather="users"></i><span>Yöneticiler</span>
						</a>
						<ul class="sidebar-submenu">
							<li><a href="<?= admin_url("yoneticiler") ?>">Yöneticiler</a></li>
							<li><a href="<?= admin_url("yoneticiler/ekle") ?>">Yönetici Ekle</a></li>
						</ul>
					</li>

					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title link-nav" href="<?= admin_url('ayarlar') ?>">
							<i data-feather="settings"> </i>
							<span>Ayarlar</span>
						</a>
					</li>

					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= admin_url("giris/cikis") ?>"><i data-feather="log-out"> </i><span>Çıkış Yap</span></a></li>
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div>