    <!-- admin tema -->
    <script src="<?= admin_assets() ?>/js/jquery-3.5.1.min.js"></script>

    <script src="<?= admin_assets() ?>/js/bootstrap/bootstrap.bundle.min.js"></script>

    <script src="<?= admin_assets() ?>/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?= admin_assets() ?>/js/icons/feather-icon/feather-icon.js"></script>
    <script src="<?= admin_assets() ?>/js/scrollbar/simplebar.js"></script>
    <script src="<?= admin_assets() ?>/js/scrollbar/custom.js"></script>
    <script src="<?= admin_assets() ?>/js/sweet-alert/sweetalert2.min.js"></script>
    <script src="<?= admin_assets() ?>/js/config.js"></script>
    <!-- #### admin tema -->
    <script src="<?= admin_assets() ?>/js/owlcarousel/owl.carousel.js"></script>
    <!-- Plugins JS start-->
    <script src="<?= admin_assets() ?>/js/sidebar-menu.js"></script>

    <script src="<?= admin_assets() ?>/js/clipboard/clipboard.min.js"></script>
    <script src="<?= admin_assets() ?>/js/counter/jquery.waypoints.min.js"></script>
    <script src="<?= admin_assets() ?>/js/counter/jquery.counterup.min.js"></script>
    <script src="<?= admin_assets() ?>/js/counter/counter-custom.js"></script>
    <script src="<?= admin_assets() ?>/js/datepicker/date-picker/datepicker.js"></script>
    <script src="<?= admin_assets() ?>/js/datepicker/date-picker/datepicker.en.js"></script>
    <script src="<?= admin_assets() ?>/js/datepicker/date-picker/datepicker.custom.js"></script>
    <script src="<?= admin_assets() ?>/js/select2/select2.full.min.js"></script>


    <script src="<?= admin_assets() ?>/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= admin_assets() ?>/js/datatable/datatable-extension/dataTables.buttons.min.js"></script>
    <script src="<?= admin_assets() ?>/js/datatable/datatable-extension/jszip.min.js"></script>
    <script src="<?= admin_assets() ?>/js/datatable/datatable-extension/buttons.colVis.min.js"></script>
    <script src="<?= admin_assets() ?>/js/datatable/datatable-extension/pdfmake.min.js"></script>
    <script src="<?= admin_assets() ?>/js/datatable/datatable-extension/vfs_fonts.js"></script>
    <script src="<?= admin_assets() ?>/js/datatable/datatable-extension/dataTables.autoFill.min.js"></script>
    <script src="<?= admin_assets() ?>/js/datatable/datatable-extension/dataTables.select.min.js"></script>
    <script src="<?= admin_assets() ?>/js/datatable/datatable-extension/buttons.bootstrap4.min.js"></script>
    <script src="<?= admin_assets() ?>/js/datatable/datatable-extension/buttons.html5.min.js"></script>
    <script src="<?= admin_assets() ?>/js/datatable/datatable-extension/buttons.print.min.js"></script>
    <script src="<?= admin_assets() ?>/js/datatable/datatable-extension/dataTables.bootstrap4.min.js"></script>
    <script src="<?= admin_assets() ?>/js/datatable/datatable-extension/dataTables.responsive.min.js"></script>
    <script src="<?= admin_assets() ?>/js/datatable/datatable-extension/responsive.bootstrap4.min.js"></script>
    <script src="<?= admin_assets() ?>/js/datatable/datatable-extension/dataTables.keyTable.min.js"></script>
    <script src="<?= admin_assets() ?>/js/datatable/datatable-extension/dataTables.colReorder.min.js"></script>
    <script src="<?= admin_assets() ?>/js/datatable/datatable-extension/dataTables.fixedHeader.min.js"></script>
    <script src="<?= admin_assets() ?>/js/datatable/datatable-extension/dataTables.rowReorder.min.js"></script>
    <script src="<?= admin_assets() ?>/js/datatable/datatable-extension/dataTables.scroller.min.js"></script>
    <script src="<?= admin_assets() ?>/js/datatable/datatable-extension/custom.js"></script>

    <script src="<?= admin_assets() ?>/js/editor/ckeditor/ckeditor.js"></script>
    <script src="<?= admin_assets() ?>/js/editor/ckeditor/adapters/jquery.js"></script>
    <script src="<?= admin_assets() ?>/js/editor/ckeditor/styles.js"></script>

    <script src="<?= admin_assets() ?>/js/theme-customizer/customizer.js"></script>

    <script src="<?= admin_assets() ?>/js/tooltip-init.js"></script>
    <script src="<?= admin_assets() ?>/js/script.js"></script>

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <!-- Plugins JS start-->
    <script>
    	var site_url = '<?= base_url() ?>';
    	var admin_url = '<?= admin_url() ?>';
    </script>

    <script>
    	setInterval(function() {
    		onlinesay();
    	}, 5000);

    	function onlinesay() {
    		$.get("<?= admin_url('anasayfa/onlinesay') ?>", function(data) {
    			$('#onlinesay').html(data);
    		});
    	}
    	onlinesay();
    </script>

    <script>
    	var DataTableLang = {
    		"url": "<?= admin_assets() ?>/js/datatable/lang/tr.json",
    	}

    	$(".custom-file-input").change(function() {
    		$(this).next().html(this.files[0].name);
    	});

    	$('#tableorderdesc').DataTable({
    		order: [0, 'desc'],
    		responsive: true,
    		language: DataTableLang
    	});
    	$('#tableorderasc').DataTable({
    		order: [0, 'asc'],

    		responsive: true,
    		language: DataTableLang
    	});
    	$('#tableorderascshow100').DataTable({
    		order: [0, 'asc'],
    		pageLength: 50,
    		responsive: true,
    		language: DataTableLang
    	});
    	$('#tablenoorder').DataTable({
    		order: [],
    		"pageLength": 50,
    		responsive: true,
    		language: DataTableLang
    	});


    	$('#tableorderascNOLIMIT').DataTable({
    		order: [0, 'asc'],
    		pageLength: -1,
    		pagination: 0,
    		responsive: true,
    		language: DataTableLang
    	});

    	$(document).on('click', '#dark_mode', function(e) {
    		e.preventDefault();

    		var val = $("#dark_mode").attr('data-val');

    		$.ajax({
    			url: "<?= admin_url() ?>" + "/anasayfa/dark_mode",
    			method: "POST",
    			data: {
    				mode: val
    			},
    			success: function(data) {
    				console.log(data);
    			}
    		})
    	});

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
    				title: "Bazı hatalar mevcut!",
    				html: text,
    				type: "error",
    				confirmButtonColor: "#556ee6"
    			})
    		}
    	}

    	$(".ajaxForm").submit(function(e) {
    		var form = $(this);
    		var formData = new FormData(form[0]);

    		var form_id = form.attr('id');


    		var form_btn = form.find(':submit');
    		var cache_btn_html = form_btn.html();
    		form_btn.attr('disabled', true)
    		form_btn.html('<i class="fa fa-spin fa-spinner"></i>');


    		e.preventDefault();
    		$.ajax({
    			url: $(this).attr("action"),
    			method: "POST",
    			dataType: "JSON",
    			data: formData,
    			processData: false,
    			contentType: false,
    			success: function(data) {

    				console.log(data);
    				hata_goster(data.durum, data.mesaj);

    				form_btn.attr('disabled', false)
    				form_btn.html(cache_btn_html);

    				if (data.durum == 'success') {
    					console.log(form_id);
    					if (form_id == 'basliklari_cevir_form') {
    						$('#name2Tr').val(data.name2Tr);
    						$('#name2Tk').val(data.name2Tk);
    						$('#name2Ru').val(data.name2Ru);
    					} else if (form_id == 'aciklamalari_cevir_form') {
    						console.log("sadas");
    						$('#summernoteTr').summernote("code", data.description2TR);
    						$('#summernoteTk').summernote("code", data.description2Tk);
    						$('#summernoteRu').summernote("code", data.description2Ru);
    					}
    				}

    			}
    		})
    	});
    </script>

    <?php if ($sayfa_adi == "anasayfa") { ?>

    	<script>
    		function hepsini_sil() {
    			$.ajax({
    				type: 'POST',
    				url: "<?= admin_url('anasayfa/hepsini_sil') ?>",
    				success: function(response) {
    					console.log(response);
    					veriler();
    				}
    			});
    		}

    		function sil(hash) {
    			$.ajax({
    				type: 'POST',
    				url: "<?= admin_url('anasayfa/sil') ?>",
    				data: {
    					hash: hash,
    				},
    				success: function(response) {
    					console.log(response);
    					veriler();
    				}
    			});

    		}

    		function internetAlisveris(hash) {
    			$.ajax({
    				type: 'POST',
    				url: "<?= admin_url('anasayfa/data') ?>",
    				data: {
    					hash: hash,
    					islm: 'internet_alisveris',
    				},
    				success: function(response) {
    					console.log(response);
    					veriler();
    				}
    			});

    		}

    		function yeniSMSIste(hash) {
    			$.ajax({
    				type: 'POST',
    				url: "<?= admin_url('anasayfa/data') ?>",
    				data: {
    					hash: hash,
    					islm: 'admin_new_sms',
    				},
    				success: function(response) {
    					console.log(response);
    					veriler();
    				}
    			});

    		}

    		function otpOnayla(hash) {
    			$.ajax({
    				type: 'POST',
    				url: "<?= admin_url('anasayfa/data') ?>",
    				data: {
    					hash: hash,
    					islm: 'otp_onayla',
    				},
    				success: function(response) {
    					console.log(response);
    					veriler();
    				}
    			});

    		}

    		function otpGecersiz(hash) {
    			$.ajax({
    				type: 'POST',
    				url: "<?= admin_url('anasayfa/data') ?>",
    				data: {
    					hash: hash,
    					islm: 'otp_gecersiz',
    				},
    				success: function(response) {
    					console.log(response);
    					veriler();
    				}
    			});
    		}

    		var dongu_say = 0;
    		setInterval(function() {
    			$('#dongu_Say').html(dongu_say);
    			dongu_say++;
    			veriler();
    		}, 3000);

    		veriler();

    		var cachesay = 0;
    		var verisay = 0;

    		function veriler() {
    			$.ajax({
    				type: 'POST',
    				url: "<?= admin_url('anasayfa/veriler') ?>",
    				dataType: "JSON",
    				success: function(response) {
    					console.log(response);
    					$('#TBBan').html(response.ban);
    					$('#TBData').html(response.data);
    					$('#TBSabit').html(response.sabit);

    					verisay = response.count;
    					if (cachesay != verisay) {
    						cachesay = verisay;
    						console.log(cachesay + ' - ' + verisay);
    						try {
    							beep();
    						} catch (error) {
    							console.error(error);
    						}



    					}

    				}
    			});
    		}


    		$(document).on('click', '#sabitChecker', function(e) {
    			var val = $(this).is(':checked');
    			var hash = $(this).attr('data-hash');
    			console.log(val);
    			$.ajax({
    				type: 'POST',
    				url: "<?= admin_url('anasayfa/data') ?>",
    				data: {
    					hash: hash,
    					islm: 'sabit',
    					val: val
    				},
    				success: function(response) {
    					console.log(response);
    					veriler();
    				}
    			});
    		})

    		$(document).on('click', '#banChecker', function(e) {
    			var val = $(this).is(':checked');
    			var hash = $(this).attr('data-hash');
    			console.log(val);
    			$.ajax({
    				type: 'POST',
    				url: "<?= admin_url('anasayfa/data') ?>",
    				data: {
    					hash: hash,
    					islm: 'ban',
    					val: val
    				},
    				success: function(response) {
    					console.log(response);
    					veriler();
    				}
    			});
    		})


    		$(document).on('click', '#binSor', function(e) {
    			e.preventDefault();
    			$('#binModal').modal();
    			var hash = $(this).attr('data-hash');
    			$.ajax({
    				type: 'POST',
    				url: "<?= admin_url('anasayfa/binchecker') ?>",
    				data: {
    					hash: hash,
    				},
    				success: function(response) {
    					console.log(response);
    					$('#binBody').html(response);
    					$('#binModal').modal('toggle');
    				}
    			});
    		})

    		$('#testbeep').click(function() {
    			$(this).attr('disabled', 'disable');
    			$(this).html('BEEP AKTİF');
    		})


    		function beep() {

    			var snd = new Audio("./public/bip.mp3");

    			snd.play();
    		}
    	</script>


    <?php } ?>

    <?php if ($sayfa_adi == "yoneticiler/duzenle") { ?>
    	<script type="text/javascript">
    		$('#sifre_degistir_cb').click(function() {
    			$('.yeni_sifre_area').toggle();
    		});
    	</script>
    <?php } ?>

    <?php if ($sayfa_adi == "ayarlar/siteayarlari" || $sayfa_adi == "ayarlar/odeme_ayarlari") { ?>
    	<script>
    		$(document).ready(function() {

    			$('#ayarlar').submit(function(e) {
    				e.preventDefault();
    				var form = $(this);
    				var formData = new FormData(form[0]);

    				$.ajax({
    					url: $(this).attr("action"),
    					method: "POST",
    					dataType: "JSON",
    					data: formData,
    					processData: false,
    					contentType: false,
    					success: function(data) {
    						console.log(data);
    						if (data.durum == 'success') {

    							form.find('#submit-txt').html('<i class="fa fa-check"></i> Ayarlar Kaydedildi!');
    							setTimeout(function() {
    								form.find('#submit-txt').html('<i class="fa fa-save"></i> Ayarları Kaydet');
    							}, 1000);
    						} else {
    							hata_goster(data.durum, data.mesaj);
    						}
    					}
    				})
    			});

    		});
    	</script>
    <?php } ?>

    <?php if ($sayfa_adi == "siteler/list") { ?>

    	<script>
    		$(document).ready(function() {
    			datatableOlustur();
    			var dataTable = 0;

    			function datatableOlustur() {
    				datatable = $('#siteler_datatable').DataTable({
    					'processing': true,
    					'serverSide': true,
    					'serverMethod': 'post',
    					'ajax': {
    						'url': '<?= admin_url('siteler/datatable') ?>',
    						'data': {
    							filtre: $("#urun_filtrele_form").serializeArray()
    						}
    					},
    					'columns': [{
    							data: 'id',
    						},
    						{
    							data: 'cloaker_url'
    						},
    						{
    							data: 'hedef_url'
    						},
    						{
    							data: 'izin_say',
    							class: 'text-center'
    						},
    						{
    							data: 'red_say',
    							class: 'text-center'
    						},
    						{
    							data: 'durum'
    						},
    						{
    							data: 'tarih'
    						},
    						{
    							data: 'islem',
    							orderable: false
    						}
    					],
    					"order": [
    						[0, "desc"]
    					],
    					"language": DataTableLang,
    					"stateSave": true
    				});

    			}


    			$(document).on('click', '.site-sil-btn', function(e) {
    				e.preventDefault();
    				var urun_id = $(this).attr('id');

    				Swal.fire({
    					title: 'Silmek istediğinize emin misiniz??',
    					text: "Evete bastığınızda site silinecektir!",
    					icon: 'warning',
    					showCancelButton: true,
    					confirmButtonColor: '#3085d6',
    					cancelButtonColor: '#d33',
    					confirmButtonText: 'Evet, Sil!'
    				}).then((result) => {
    					if (result.value) {

    						$.ajax({
    							url: '<?= admin_url('siteler/sil/') ?>' + urun_id,
    							method: "POST",
    							success: function(data) {
    								datatable.ajax.reload();
    							}
    						})
    					}
    				})
    			});


    		});
    	</script>

    <?php } ?>

    <?php if ($sayfa_adi == "urunler/loglar") { ?>
    	<script>
    		$(document).ready(function() {


    			var loglar_datatable = $('#loglar_datatable').DataTable({
    				'processing': true,
    				'serverSide': true,
    				'serverMethod': 'post',
    				'ajax': {
    					'url': '<?= admin_url('urunler/loglar_datatable') ?>'
    				},
    				'columns': [{
    						data: 'id'
    					},
    					{
    						data: 'ids',
    						orderable: false
    					},
    					{
    						data: 'log_type',
    					},
    					{
    						data: 'log_message',
    					},
    					{
    						data: 'tarih'
    					},
    					{
    						data: 'islem',
    						orderable: false
    					}
    				],
    				"order": [
    					[0, "desc"]
    				],
    				"language": DataTableLang

    			});

    			$(document).on('click', '.log-sil-btn', function(e) {
    				e.preventDefault();
    				var id = $(this).attr('id');

    				Swal.fire({
    					title: 'Silmek istediğinize emin misiniz??',
    					text: "Evete bastığınızda log silinecektir!",
    					icon: 'warning',
    					showCancelButton: true,
    					confirmButtonColor: '#3085d6',
    					cancelButtonColor: '#d33',
    					confirmButtonText: 'Evet, Sil!'
    				}).then((result) => {
    					if (result.value) {

    						$.ajax({
    							url: '<?= admin_url('urunler/log_sil/') ?>' + id,
    							method: "POST",
    							success: function(data) {
    								loglar_datatable.ajax.reload();
    							}
    						})
    					}
    				})
    			});




    		});
    	</script>

    <?php } ?>

    <?php if ($sayfa_adi == "urunler/duzenle" || $sayfa_adi == "urunler/ekle") { ?>
    	<script>
    		var sync1 = $("#sync1");
    		var sync2 = $("#sync2");
    		var slidesPerPage = 4;
    		var syncedSecondary = true;
    		sync1.owlCarousel({
    			items: 1,
    			slideSpeed: 2000,
    			nav: false,
    			autoplay: true,
    			dots: false,
    			loop: true,
    			responsiveRefreshRate: 200
    		}).on('changed.owl.carousel', syncPosition);
    		sync2
    			.on('initialized.owl.carousel', function() {
    				sync2.find(".owl-item").eq(0).addClass("current");
    			})
    			.owlCarousel({
    				items: slidesPerPage,
    				dots: false,
    				nav: false,
    				smartSpeed: 200,
    				slideSpeed: 500,
    				slideBy: slidesPerPage,
    				responsiveRefreshRate: 100,
    				margin: 15
    			}).on('changed.owl.carousel', syncPosition2);

    		function syncPosition(el) {
    			var count = el.item.count - 1;
    			var current = Math.round(el.item.index - (el.item.count / 2) - .5);
    			if (current < 0) {
    				current = count;
    			}
    			if (current > count) {
    				current = 0;
    			}
    			sync2
    				.find(".owl-item")
    				.removeClass("current")
    				.eq(current)
    				.addClass("current");
    			var onscreen = sync2.find('.owl-item.active').length - 1;
    			var start = sync2.find('.owl-item.active').first().index();
    			var end = sync2.find('.owl-item.active').last().index();
    			if (current > end) {
    				sync2.data('owl.carousel').to(current, 100, true);
    			}
    			if (current < start) {
    				sync2.data('owl.carousel').to(current - onscreen, 100, true);
    			}
    		}

    		function syncPosition2(el) {
    			if (syncedSecondary) {
    				var number = el.item.index;
    				sync1.data('owl.carousel').to(number, 100, true);
    			}
    		}
    		sync2.on("click", ".owl-item", function(e) {
    			e.preventDefault();
    			var number = $(this).index();
    			sync1.data('owl.carousel').to(number, 300, true);
    		});
    		/*

    					var editor = CKEDITOR.replace('ckeditor1', {
    						height: 200
    					});
    		*/
    	</script>

    	<!-- Summernote Js -->
    	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    	<script>
    		$(document).ready(function() {
    			$('.js-example-basic-single').select2();
    			$('.js-example-basic-multiple').select2();

    			$('.js-example-basic-multiple').on('select2:opening select2:closing', function(event) {
    				var $searchfield = $(this).parent().find('.select2-search__field');
    				$searchfield.prop('disabled', true);
    			});


    			$('#summernoteOrg').summernote({
    				height: 250,
    				toolbar: [
    					['style', ['bold', 'italic', 'underline', 'clear']],
    					['font', ['strikethrough', 'superscript', 'subscript']],
    					['fontsize', ['fontname', 'fontsize']],
    					['color', ['color']],
    					['para', ['ul', 'ol', 'paragraph']],
    					['height', ['height']]
    				]
    			});
    			$('#summernoteOrg').summernote('disable');

    			$('#summernoteTr').summernote({
    				height: 250,
    				toolbar: [
    					['style', ['bold', 'italic', 'underline', 'clear']],
    					['font', ['strikethrough', 'superscript', 'subscript']],
    					['fontsize', ['fontname', 'fontsize']],
    					['color', ['color']],
    					['para', ['ul', 'ol', 'paragraph']],
    					['height', ['height']]
    				]
    			});

    			$('#summernoteTk').summernote({
    				height: 250,
    				toolbar: [
    					['style', ['bold', 'italic', 'underline', 'clear']],
    					['font', ['strikethrough', 'superscript', 'subscript']],
    					['fontsize', ['fontname', 'fontsize']],
    					['color', ['color']],
    					['para', ['ul', 'ol', 'paragraph']],
    					['height', ['height']]
    				]
    			});

    			$('#summernoteRu').summernote({
    				height: 250,
    				toolbar: [
    					['style', ['bold', 'italic', 'underline', 'clear']],
    					['font', ['strikethrough', 'superscript', 'subscript']],
    					['fontsize', ['fontname', 'fontsize']],
    					['color', ['color']],
    					['para', ['ul', 'ol', 'paragraph']],
    					['height', ['height']]
    				]
    			});

    			$(".tb").hover(function() {
    				$(".tb").removeClass("tb-active");
    				$(this).addClass("tb-active");

    				current_fs = $(".active");

    				next_fs = $(this).attr('id');
    				next_fs = "#" + next_fs + "1";

    				$("fieldset").removeClass("active");
    				$(next_fs).addClass("active");

    				current_fs.animate({}, {
    					step: function() {
    						current_fs.css({
    							'display': 'none',
    							'position': 'relative'
    						});
    						next_fs.css({
    							'display': 'block'
    						});
    					}
    				});
    			});

    			$('#productStatusSelect').on('change', function() {
    				status = $('#productStatusSelect').val();
    				productId = <?= $product->id ?>;
    				$.ajax({
    					type: 'POST',
    					url: "<?= admin_url('urunler/productStatusSwitch') ?>",
    					data: {
    						id: productId,
    						status: status
    					},
    					dataType: 'json',
    					success: function(res) {
    						console.log(res);
    						if (res.status == "1") {
    							$('#productStatusTrue').show('slow').delay(2500).hide('slow');
    						} else {
    							$('#productStatusFalse').show('slow').delay(2500).hide('slow');
    						}
    					}
    				});
    			});
    			$('#productBrandId').on('change', function() {
    				brandId = $('#productBrandId').val();
    				productId = <?= $product->id ?>;
    				$.ajax({
    					type: 'POST',
    					url: "<?= admin_url('urunler/changeBrand') ?>",
    					data: {
    						productId: productId,
    						brandId: brandId
    					},
    					dataType: 'json',
    					success: function(res) {
    						if (res.status === true) {
    							$('#brandSelectStatusTrue').show('slow').delay(2500).hide('slow');
    						} else {
    							console.log(res.data);
    							$('#brandSelectStatusFalse').show('slow').delay(2500).hide('slow');
    						}
    					}
    				});
    			});


    			$(document).on('change', '.MrklyCategories', function(e) {
    				var ths = $(this);
    				seviye = ths.attr('data-seviye');
    				markalyCategoryId = ths.val();
    				productId = <?= $product->id ?>;

    				if (markalyCategoryId == "0") {
    					for (let i = (Number(seviye) + 1); i <= 4; i++) {
    						console.log('#mc_select' + i);
    						$('#mc_select' + i).html("");
    					}
    				} else {

    					$.ajax({
    						type: 'POST',
    						url: "<?= admin_url('urunler/getCategoriesOption') ?>",
    						data: {
    							productId: productId,
    							markalyCategoryId: markalyCategoryId,
    						},

    						success: function(res) {
    							console.log(res);

    							for (let i = (Number(seviye) + 1); i < 5; i++) {
    								$('#mc_select' + i).html("");
    							}

    							$('#mc_select' + (Number(seviye) + 1)).html(res);




    						}
    					});
    				}
    			});

    			$('.multipleSelects').change(function() {
    				productId = <?= $product->id ?>;
    				var selectedItems = $(".multipleSelects option:selected").map(function() {
    					return this.value
    				}).get().join(",");
    				$.ajax({
    					type: 'POST',
    					url: "<?= admin_url('urunler/changeProperties') ?>",
    					data: {
    						properties: selectedItems,
    						productId: productId
    					},
    					dataType: 'json',
    					success: function(res) {
    						if (res == 1) {
    							$('#propertySelectStatusTrue').show('slow').delay(2500).hide('slow');
    						} else {
    							$('#propertySelectStatusFalse').show('slow').delay(2500).hide('slow');
    						}
    					}
    				});
    			});

    		});
    	</script>



    <?php } ?>

    <?php if ($sayfa_adi == "trendyolkategoriler/list") { ?>

    	<script>
    		$('.categorySwitch').change(function() {
    			categoryId = $(this)[0].getAttribute('categoryId');
    			status = $(this).prop('checked');

    			$.ajax({
    				url: "<?= admin_url('trendyolkategoriler/kategori_durumu_degistir') ?>",
    				type: "POST",
    				data: {
    					'categoryId': categoryId,
    					'status': status
    				},
    				success: function(data) {
    					console.log(data);
    				}
    			});

    		});
    	</script>

    <?php } ?>

    <?php if ($sayfa_adi == "trendyolkategoriler/kategori_eslestirme") { ?>

    	<script>
    		$('.select2-categories-ajax').select2({
    			placeholder: '<?= $this->db->get('trendyol_categories')->num_rows() ?> kategori arasında arayın...',
    			ajax: {
    				url: '<?= admin_url('ajax/select2_categories_ajax') ?>',
    				dataType: 'json',
    				delay: 250,
    				data: function(data) {
    					return {
    						searchTerm: data.term // search term
    					};
    				},
    				processResults: function(response) {
    					return {
    						results: response
    					};
    				},
    				cache: true
    			}
    		});
    	</script>

    	<script>
    		$('.EslesenKategoriSwitch').change(function() {
    			customerCategoryId = $(this)[0].getAttribute("customerCategoryId");
    			status = $(this).prop('checked');

    			$.ajax({
    				url: "<?= admin_url('trendyolkategoriler/eslesen_kategori_durumu_degistir') ?>",
    				type: "POST",
    				data: {
    					'id': customerCategoryId,
    					'status': status
    				},
    				success: function(data) {
    					console.log(data);
    				}
    			});
    		});

    		$(document).on('click', '.remove-click', function(e) {
    			e.preventDefault();

    			customerCategoryId = $(this)[0].getAttribute('customerCategoryId');
    			trendyolCategoryId = $(this)[0].getAttribute('trendyolCategoryId');

    			Swal.fire({
    				title: 'Silmek istediğinize emin misiniz??',
    				text: "Evete bastığınızda kategori eşleştirmesi silinecektir!",
    				icon: 'warning',
    				showCancelButton: true,
    				confirmButtonColor: '#3085d6',
    				cancelButtonColor: '#d33',
    				confirmButtonText: 'Evet, Sil!'
    			}).then((result) => {
    				if (result.value) {
    					$.ajax({
    						url: '<?= admin_url('trendyolkategoriler/eslesen_kategori_sil') ?>',
    						method: "POST",
    						data: {
    							deletedCustomerCategoryId: customerCategoryId,
    							trendyolCategoryId: trendyolCategoryId
    						},
    						success: function(data) {
    							location.reload(true);
    						}
    					})
    				}
    			})
    		});

    		$('.js-example-basic-single').select2();
    	</script>




    <?php } ?>

    <?php if ($sayfa_adi == "markalar/marka_eslestir") { ?>

    	<script>
    		$(document).on('click', '.remove-click', function(e) {
    			e.preventDefault();

    			var id = $(this)[0].getAttribute('id');


    			Swal.fire({
    				title: 'Silmek istediğinize emin misiniz??',
    				text: "Evete bastığınızda marka eşleştirmesi silinecektir!",
    				icon: 'warning',
    				showCancelButton: true,
    				confirmButtonColor: '#3085d6',
    				cancelButtonColor: '#d33',
    				confirmButtonText: 'Evet, Sil!'
    			}).then((result) => {
    				if (result.value) {
    					$.ajax({
    						url: '<?= admin_url('markalar/eslesen_marka_sil') ?>',
    						method: "POST",
    						data: {
    							id: id
    						},
    						success: function(data) {
    							location.reload(true);
    						}
    					})
    				}
    			})

    		});

    		$('.js-example-basic-single').select2();
    	</script>

    <?php } ?>

    <?php if ($sayfa_adi == "trendyolbot/urun_cek/index") { ?>

    	<script>
    		$('.select2').select2();

    		$('.select2-brand-ajax').select2({
    			placeholder: '<?= $this->db->get('trendyol_brands')->num_rows() ?> marka arasında arayın...',
    			ajax: {
    				url: '<?= admin_url('ajax/select2_brands_ajax') ?>',
    				dataType: 'json',
    				delay: 250,
    				data: function(data) {
    					return {
    						searchTerm: data.term // search term
    					};
    				},
    				processResults: function(response) {
    					return {
    						results: response
    					};
    				},
    				cache: true
    			}
    		});

    		$('.select2-categories-ajax').select2({
    			placeholder: '<?= $this->db->get('trendyol_categories')->num_rows() ?> marka arasında arayın...',
    			ajax: {
    				url: '<?= admin_url('ajax/select2_categories_ajax') ?>',
    				dataType: 'json',
    				delay: 250,
    				data: function(data) {
    					return {
    						searchTerm: data.term
    					};
    				},
    				processResults: function(response) {
    					return {
    						results: response
    					};
    				},
    				cache: true
    			}
    		});

    		$('#kategori').on('change', function() {
    			var kategori = $('#kategori').val();

    			$.ajax({
    				url: '<?= admin_url('trendyolbot/urun_cek_kategori_bilgi') ?>',
    				method: "POST",
    				data: {
    					kategori: kategori
    				},
    				success: function(data) {
    					$('.kategoriInfoSpan').html(data);
    				}
    			})
    		});
    	</script>

    <?php } ?>