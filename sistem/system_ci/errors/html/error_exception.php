<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>Bir hata ile karşılaşıldı - Lütfen yazılımcınıza başvurun.</h4>

<p>Tip: <?php echo get_class($exception); ?></p>
<p>Hata Mesajı: <?php echo $message; ?></p>
<p>Hata Dosyası: <?php echo $exception->getFile(); ?></p>
<p>Satır Numarası: <?php echo $exception->getLine(); ?></p>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

	<p>Geritakip:</p>
	<?php foreach ($exception->getTrace() as $error): ?>
		<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
			<p style="margin-left:10px">
			Dosya: <?php echo $error['file']; ?><br />
			Satır: <?php echo $error['line']; ?><br />
			Fonksiyon: <?php echo $error['function']; ?>
			</p>
		<?php endif ?>

	<?php endforeach ?>

<?php endif ?>

</div>