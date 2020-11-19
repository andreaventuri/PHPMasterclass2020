<?php $this->layout('layout', ['title' => 'Home SimpleMVC']) ?>

<header>
	<h1>Admin panel</h1>
</header>

<a href="/article">Add new article</a>

<table class="tblArticles">

	<?php foreach($articles as $article): ?>

		<tr>
			<td><?= $this->e($article['title']) ?></td>
			<td><?= $this->e($article['content']) ?></td>
			<td><?= $article['created_at']->toDateTimeString() ?></td>
			<td><?= $article['author']['name'] ?></td>
			<td><a href="/article/<?=$article['id']?>">Edit</a></td>
			<td><a href="/article/delete/<?=$article['id']?>">Delete</a></td>
		</tr>

	<?php endforeach; ?>


</table>

<footer>
	<a href="/">Home page</a> - <a href="/auth/logout">Logout</a>
</footer>
