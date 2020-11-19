<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use SimpleMVC\Model\Article as ArticleModel;
use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class Article extends AbstractArticle implements ControllerInterface
{
	public function execute(ServerRequestInterface $request)
	{
		$id = intval($request->getAttribute('id'));

		if(!empty($id))
		{
			$data = [
				'article' => $this->article->find($id)->toArray(),
				'method'  => 'POST', // PUT
			];
		}
		else
		{
			$data = ['method' => 'POST', 'article' => null];
		}

		echo $this->plates->render('article', $data);
	}
}
