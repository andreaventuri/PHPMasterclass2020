<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use SimpleMVC\Model\Article as ArticleModel;
use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class ArticleDelete extends AbstractArticle implements ControllerInterface
{
	public function execute(ServerRequestInterface $request)
	{
		$id = $request->getAttribute('id');

		$article = $this->article->find($id);

		$article->delete();

		// non ho capito come inviare una response
		header('Location: /admin');
	}
}
