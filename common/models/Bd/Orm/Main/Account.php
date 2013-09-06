<?php

require_once 'Bd/Orm/Main/Base/Account.php';

class Bd_Orm_Main_Account extends Bd_Orm_Main_Base_Account
{
	const PWD_ALGO = 'sha256';

	public static function hashPassword($raw_password)
	{
		$hashed_pwd = hash(self::PWD_ALGO, $raw_password);
		foreach(array('GBw$t6C_', '[~[@-].P', '4.yWn!Q!', 'Z!UV)]Bn', 'uPT{>,+$') as $salt)
		{
			$hashed_pwd = hash(self::PWD_ALGO, $salt.$hashed_pwd);
		}

		return $hashed_pwd;
	}

	public function setRawPassword($raw_password)
	{
		$this->setPassword(self::hashPassword($raw_password));
		return $this;
	}

	public function isMatchPassword($raw_password)
	{
		return $this->getPassword() === self::hashPassword($raw_password);
	}

	public function getRole()
	{
		return 'user';
	}
}

