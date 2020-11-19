<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use SimpleMVC\Model\Article;
use Laminas\Authentication\AuthenticationService;
use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class Admin implements ControllerInterface
{
	protected $plates;

	protected $article;

	protected $auth;

	public function __construct(Engine $plates, Article $article, AuthenticationService $auth)
	{
		$this->plates = $plates;
		$this->article = $article;
		$this->auth = $auth;
	}

	public function execute(ServerRequestInterface $request)
	{
		if($this->auth->hasIdentity())
		{
			$articles = $this->article->all()->sortBy('created_at', SORT_REGULAR, true);
			echo $this->plates->render('admin', ['articles' => $articles]);
		}
		else
		{
			header('Location: /auth/login');
		}
	}
}
