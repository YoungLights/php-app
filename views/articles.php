<h1>This is my blog</h1>

<?php foreach($articles as $article): ?>
	<div>
		<h4>Articl: <?= $article->id ?></h4>
		<?= $article->title ?>
	</div>
<?php endforeach ?>

