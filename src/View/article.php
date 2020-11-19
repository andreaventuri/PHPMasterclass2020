<?php $this->layout('layout', ['title' => 'Home SimpleMVC']) ?>


<h1>Article</h1>

<form method="<?= $method ?>" action="">

	<div>
		<label for="title">Title</label>
		<input id="title" name="title" value="<?= isset($article) ? $this->e($article['title']) : '' ?>"/>
	</div>
	<div>
		<label for="content">Content</label>
		<textarea id="content" name="content"><?= isset($article) ? $this->e($article['content']) : '' ?></textarea>
	</div>
	<div>
		<button type="submit">Submit</button>
	</div>

</form>

<footer>
	<a href="/admin">Back</a>
</footer>
