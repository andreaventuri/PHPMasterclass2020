<?php

namespace SimpleMVC\Model\Auth;

use Illuminate\Database\Capsule\Manager as Capsule;
use Laminas\Authentication\Adapter\AbstractAdapter;
use Laminas\Authentication\Result;

class Adapter extends AbstractAdapter
{
	/**
	 * @var \Illuminate\Database\Connection
	 */
	protected $db;

	protected $tableName;

	protected $identityColumn;

	protected $credentialColumn;

	public function __construct(
		Capsule $db,
		$tableName = null,
		$identityColumn = null,
		$credentialColumn = null
	) {
		$this->db = $db->getConnection();

		if(null!==$tableName)
		{
			$this->setTableName($tableName);
		}

		if(null!==$identityColumn)
		{
			$this->setIdentityColumn($identityColumn);
		}

		if(null!==$credentialColumn)
		{
			$this->setCredentialColumn($credentialColumn);
		}
	}

	public function setTableName($tableName)
	{
		$this->tableName = $tableName;
		return $this;
	}

	public function setIdentityColumn($identityColumn)
	{
		$this->identityColumn = $identityColumn;
		return $this;
	}

	public function setCredentialColumn($credentialColumn)
	{
		$this->credentialColumn = $credentialColumn;
		return $this;
	}

	public function authenticate()
	{
		$user = $this->db->table($this->tableName)
						 ->where($this->identityColumn, $this->identity)
						 ->first();

		if(!empty($user))
		{
			if(password_verify($this->credential, $user->password))
			{
				return new Result(Result::SUCCESS, $user);
			}
		}

		return new Result(Result::FAILURE, $user, ['Supplied credential is invalid']);
	}
}
