<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use SimpleMVC\Model\Article as ArticleModel;
use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class ArticleCreate extends AbstractArticle implements ControllerInterface
{
	public function execute(ServerRequestInterface $request)
	{
		$this->article->title = $request->getParsedBody()['title'];
		$this->article->content = $request->getParsedBody()['content'];
		$this->article->author_id = $this->auth->getIdentity()->id;

		$this->article->save();

		// non ho capito come inviare una response
		header('Location: /admin');
	}
}
