<?php $this->layout('layout', ['title' => 'Home SimpleMVC']) ?>

<header>
	<h1>Today's news</h1>
</header>

<?php foreach($articles as $article): ?>

	<article>
		<h2><?= $this->e($article['title']) ?></h2>
		<p>Written by <?= $article['author']['name'] ?> on <?= $article['created_at']->toFormattedDateString() ?></p>
		<p><?= $this->e($article['content']) ?></p>
	</article>

<?php endforeach; ?>


<footer>
	<a href="/admin">Admin</a> - <a href="/seed">Seed database</a>
</footer>
