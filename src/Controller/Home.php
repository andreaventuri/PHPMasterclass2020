<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use Carbon\Carbon;
use SimpleMVC\Model\Article;
use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class Home implements ControllerInterface
{
	protected $plates;

	protected $article;

	public function __construct(Engine $plates, Article $article)
	{
		$this->plates = $plates;
		$this->article = $article;
	}

	public function execute(ServerRequestInterface $request)
	{
		$articles = $this->article->where('created_at', '>=', Carbon::today())
								  ->orderBy('created_at', 'desc')
								  ->get();

		echo $this->plates->render('home', ['articles' => $articles]);
	}
}
