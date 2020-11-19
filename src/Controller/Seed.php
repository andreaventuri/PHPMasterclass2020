<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use SimpleMVC\Model\Seed as SeedModel;
use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class Seed implements ControllerInterface
{
	protected $plates;

	protected $seed;

	public function __construct(Engine $plates, SeedModel $seed)
	{
		$this->plates = $plates;
		$this->seed = $seed;
	}

	public function execute(ServerRequestInterface $request)
	{
		$this->seed->run();

		header('Location: /');
	}
}
