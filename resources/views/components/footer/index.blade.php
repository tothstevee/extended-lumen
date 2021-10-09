</body>

<?php if (isset($runtime['resources']['scripts'])): ?>
	<?php foreach ($runtime['resources']['scripts'] as $key => $value): ?>
		<script type="<?= $value['type'] ?>" src="<?= $value['src'] ?>"></script>
	<?php endforeach ?>
<?php endif ?>

</html>