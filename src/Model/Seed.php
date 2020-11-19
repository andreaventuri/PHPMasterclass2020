<?php

namespace SimpleMVC\Model;

use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager;

class Seed
{
	protected $db;

	public function __construct(Manager $db)
	{
		$this->db = $db;
	}

	public function run()
	{
		$this->db->table('articles')->delete();
		$this->db->table('authors')->delete();

		$author = new Author();
		$author->name = 'Mario Rossi';
		$author->username = 'mrossi';
		$author->password = password_hash('mrossi', PASSWORD_DEFAULT);
		$author->save();

		$article = new Article();
		$article->title = 'Lorem lorem';
		$article->content = 'Lorem lorem lorem lorem lorem lorem';
		$author->articles()->save($article);

		$article = new Article();
		$article->title = 'Ipsum ipsum';
		$article->content = 'Ipsum ipsum ipsum ipsum ipsum ipsum ipsum ipsum';
		$article->created_at = Carbon::yesterday()->setTime(13, 26, 58);
		$author->articles()->save($article);

		$author = new Author();
		$author->name = 'Luca Verdi';
		$author->username = 'lverdi';
		$author->password = password_hash('lverdi', PASSWORD_DEFAULT);
		$author->save();

		$article = new Article();
		$article->title = 'Sit amet';
		$article->content = 'Sit amet sit amet sit amet sit amet sit amet';
		$author->articles()->save($article);

		$article = new Article();
		$article->title = 'Dolor';
		$article->content = 'Dolor dolor dolor dolor dolor dolor';
		$article->created_at = Carbon::yesterday()->setTime(07, 52, 41);
		$author->articles()->save($article);
	}
}
