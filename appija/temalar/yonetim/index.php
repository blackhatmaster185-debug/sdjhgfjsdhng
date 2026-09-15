<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= admin_assets() ?>/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= admin_assets() ?>/images/favicon.png" type="image/x-icon">
    <title><?php echo $sayfa_title; ?></title>

    <?php $this->load->view('yonetim/includes/inc_css.php'); ?>
    <style>
        .customizer-links.open {
            right: 0px;
            border-radius: 8px 0 0 8px;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        .customizer-links {
            top: 20%;
        }
    </style>
</head>

<body <?= isset($_COOKIE['dark_mode']) ? ($_COOKIE['dark_mode'] ? 'class="dark-only"' : "") : "" ?> data-siteurl="<?= base_url() ?>">
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <div class="bg-overlay1"></div>
    <div class="page-wrapper compact-wrapper" id="pageWrapper">

        <?php $this->load->view('yonetim/includes/top-menu.php'); ?>

        <div class="page-body-wrapper">

            <?php $this->load->view('yonetim/includes/yan-menu.php'); ?>
            <?php $this->load->view('yonetim/sayfalar/' . $sayfa_adi . '.php'); ?>
            <?php $this->load->view('yonetim/includes/footer.php'); ?>

        </div>
    </div>

    <?php $this->load->view('yonetim/includes/inc_js.php'); ?>
</body>

</html>