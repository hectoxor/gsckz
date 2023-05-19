<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title><?=$title_for_layout?></title>
	<?php if(isset($meta['keywords'])): ?>
		<?php echo $this->Html->meta('keywords', $meta['keywords']); ?>
	<?php endif; ?>
	<?php if(isset($meta['description'])): ?>
		<?php echo $this->Html->meta('description', $meta['description']); ?>
	<?php endif; ?>

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

	<?php
	echo $this->Html->meta(
			'favicon.ico',
			'/favicon.svg?v=1.1',
			array('type' => 'icon')
	);
	?>

	<!-- <script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit" async defer></script> -->
	<link rel="stylesheet" href="/css/jquery.fancybox.min.css" />
	<link rel="stylesheet" href="/css/style.css" />

	<?php
	echo $this->Html->script(
			array('jquery-3.0.0.min', 'index')
	);
	?>
</head>

<body class="container--column gap-24">
<?php echo $this->element('modals') ?>

<?php echo $this->element('navbar') ?>
<?php echo $this->fetch('content') ?>
<?php echo $this->element('footer') ?>

<!-- https://book.cakephp.org/2/en/core-libraries/helpers/js.html -->
<?php echo $this->Js->writeBuffer(); ?>



<script src="/js/jquery-3.0.0.min.js"></script>
<script src="/js/slick.min.js"></script>
<script src="/js/jquery.maskedinput.min.js"></script>
<script src="/js/jquery.waypoints.min.js"></script>
<script src="/js/jquery.fancybox.min.js"></script>
<script src="/js/script.js?v=1.18"></script>
</body>
</html>

