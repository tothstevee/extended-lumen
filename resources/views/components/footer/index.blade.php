</body>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="module" src="<?= url('scripts/core/app.js') ?>"></script>

<?php if (isset($runtime['resources']['scripts'])): ?>
	<?php foreach ($runtime['resources']['scripts'] as $key => $value): ?>
		<script type="<?= $value['type'] ?>" src="<?= $value['src'] ?>"></script>
	<?php endforeach ?>
<?php endif ?>

</html>