<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use Laminas\Authentication\AuthenticationService;
use League\Plates\Engine;
use SimpleMVC\Model\Article;

abstract class AbstractArticle
{
	/**
	 * @var \League\Plates\Engine
	 */
	protected $plates;

	/**
	 * @var \SimpleMVC\Model\Article
	 */
	protected $article;

	/**
	 * @var \Laminas\Authentication\AuthenticationService
	 */
	protected $auth;

	public function __construct(Engine $plates, Article $article, AuthenticationService $auth)
	{
		$this->plates = $plates;
		$this->article = $article;
		$this->auth = $auth;

		if(!$auth->hasIdentity())
		{
			header('Location: /auth/login');
		}
	}
}
