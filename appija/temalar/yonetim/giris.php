<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Panel Girişi">

    <link rel="icon" href="<?= admin_assets() ?>/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= admin_assets() ?>/images/favicon.png" type="image/x-icon">
    <title><?= $sayfa_title ?></title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= admin_assets() ?>/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?= admin_assets() ?>/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?= admin_assets() ?>/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?= admin_assets() ?>/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?= admin_assets() ?>/css/vendors/feather-icon.css">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?= admin_assets() ?>/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?= admin_assets() ?>/css/style.css">
    <link id="color" rel="stylesheet" href="<?= admin_assets() ?>/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?= admin_assets() ?>/css/responsive.css">
</head>

<body>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="login-card">
                    <div>
                        <div class="login-main">
                            <?php echo form_open('admin/giris', 'class="theme-form"'); ?>
                            <h4>Yönetim Paneli</h4>
                            <div class="form-group">
                                <label class="col-form-label">Kullanıcı Adınız</label>
                                <input class="form-control" type="text" name="email" required="" placeholder="Kullanıcı Adınızı Girin">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Şifreniz</label>
                                <input class="form-control" type="password" name="sifre" required="" placeholder="*********">
                            </div>
                            <div class="text-danger">
                                <?= $hata ?>
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block" type="submit">Giriş Yap</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- latest jquery-->
        <script src="<?= admin_assets() ?>/js/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap js-->
        <script src="<?= admin_assets() ?>/js/bootstrap/popper.min.js"></script>
        <script src="<?= admin_assets() ?>/js/bootstrap/bootstrap.js"></script>
        <!-- feather icon js-->
        <script src="<?= admin_assets() ?>/js/icons/feather-icon/feather.min.js"></script>
        <script src="<?= admin_assets() ?>/js/icons/feather-icon/feather-icon.js"></script>
        <!-- Sidebar jquery-->
        <script src="<?= admin_assets() ?>/js/config.js"></script>
        <!-- Plugins JS start-->
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="<?= admin_assets() ?>/js/script.js"></script>
        <!-- login js-->
        <!-- Plugin used-->
    </div>
</body>

</html>