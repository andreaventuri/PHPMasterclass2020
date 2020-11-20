<?php $this->layout('layout', ['title' => 'Home SimpleMVC']) ?>


<h1>Article</h1>

<?php if(!empty($messages)): ?>

	<?php foreach($messages as $message): ?>

		<p style="color:red"><?= $message ?></p>

	<?php endforeach ?>

<?php endif ?>


<form method="POST" action="/auth">

	<div>
		<label for="username">Username</label>
		<input id="username" name="username"/>
	</div>
	<div>
		<label for="password">Password</label>
		<input id="password" name="password" type="password"/>
	</div>
	<div>
		<button type="submit">Login</button>
	</div>

</form>

<p>
	Username: <strong>mrossi</strong><br>
	Password: <strong>mrossi</strong>
</p>
<p>
	Username: <strong>lverdi</strong><br>
	Password: <strong>lverdi</strong>
</p>

<footer>
	<a href="/">Back</a>
</footer>
