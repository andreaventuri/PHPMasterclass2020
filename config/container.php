<?php

use League\Plates\Engine;
use Psr\Container\ContainerInterface;
use SimpleMVC\Model\Article;
use SimpleMVC\Model\Author;
use SimpleMVC\Model\Seed;
use Illuminate\Database\Capsule\Manager as Capsule;
use SimpleMVC\Model\Auth\Adapter as AuthAdapter;
use Laminas\Authentication\AuthenticationService;
use \Illuminate\Database\Schema\Grammars\SQLiteGrammar as Grammar;

return [
	'view_path'                  => 'src/View',
	'dsn'                        => 'sqlite:' . realpath(__DIR__ . '/../database/newspaper.sqlite'),
	'tableName'                  => 'authors',
	'identityColumn'             => 'username',
	'credentialColumn'           => 'password',
	'database_driver'            => 'sqlite',
	'database_name'              => realpath(__DIR__ . '/../database/newspaper.sqlite'),
	Engine::class                => function(ContainerInterface $c) {
		return new Engine($c->get('view_path'));
	},
	Grammar::class               => function(ContainerInterface $c) {
		return new Grammar();
	},
	Capsule::class               => function(ContainerInterface $c) {
		$capsule = new Capsule;

		$capsule->addConnection([
			'driver'   => $c->get('database_driver'),
			'database' => $c->get('database_name'),
		]);

		$capsule->getConnection()->setSchemaGrammar($c->get(Grammar::class));

		$capsule->setAsGlobal();
		$capsule->bootEloquent();

		return $capsule;
	},
	Article::class               => function(ContainerInterface $c) {
		$c->get(Capsule::class);
		return new Article();
	},
	Author::class                => function(ContainerInterface $c) {
		$c->get(Capsule::class);
		return new Author();
	},
	Seed::class                  => function(ContainerInterface $c) {
		return new Seed($c->get(Capsule::class));
	},
	AuthAdapter::class           => function(ContainerInterface $c) {
		return new AuthAdapter($c->get(Capsule::class), $c->get('tableName'), $c->get('identityColumn'), $c->get('credentialColumn'));
	},
	AuthenticationService::class => function(ContainerInterface $c) {
		$auth = new AuthenticationService();
		$auth->setAdapter($c->get(AuthAdapter::class));
		return $auth;
	},
];
