<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use SimpleMVC\Model\Article as ArticleModel;
use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class ArticleUpdate extends AbstractArticle implements ControllerInterface
{
	public function execute(ServerRequestInterface $request)
	{
		$id = $request->getAttribute('id');

		$article = $this->article->find($id);

		$article->title = $request->getParsedBody()['title'];
		$article->content = $request->getParsedBody()['content'];
		$article->author_id = $this->auth->getIdentity()->id;

		$article->save();

		// non ho capito come inviare una response
		header('Location: /admin');
	}
}
