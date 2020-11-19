<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use SimpleMVC\Model\Auth\Adapter as AuthAdapter;
use Laminas\Authentication\AuthenticationService;
use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class Auth implements ControllerInterface
{
	protected $plates;

	protected $authAdapter;

	protected $authService;

	public function __construct(Engine $plates, AuthAdapter $authAdapter, AuthenticationService $authService)
	{
		$this->plates = $plates;
		$this->authAdapter = $authAdapter;
		$this->authService = $authService;
	}

	public function execute(ServerRequestInterface $request)
	{
		if($request->getMethod()=='POST')
		{
			$body = $request->getParsedBody();
			$this->authAdapter->setIdentity($body['username'])->setCredential($body['password']);
			$result = $this->authService->authenticate($this->authAdapter);

			if($result->isValid())
			{
				// TODO non ho capito come fare il redirect
				header('Location: /admin');
				exit;
			}

			header('Location: /auth/login');
			exit;
		}
		else
		{
			$action = $request->getAttribute('action', 'login');

			if($action=='login')
			{
				echo $this->plates->render('login');
			}
			else
			{
				$this->authService->clearIdentity();
				header('Location: /');
				exit;
			}
		}
	}
}
