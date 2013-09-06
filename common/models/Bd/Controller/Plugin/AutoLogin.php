<?php
class Bd_Controller_Plugin_AutoLogin extends Sdx_Controller_Plugin_AutoLogin
{
	/**
	*
	* @return Zend_Auth_Adapter_Interface
	* @param string $cookie
	*/
	protected function _getAutoLoginAdapter($token)
	{
		return new Bd_Auth_Adapter_DbAutoLogin($token);
	}
	
	protected function _preClearCookie(Sdx_User $user, $id)
	{
		if($id)
		{
			$rec = Bd_Orm_Main_AutoLogin::getTable()->findByPkey($id);
			if(!$rec instanceof Sdx_Null)
			{
				$rec->beginTransaction();
				$rec->delete();
				$rec->commit();
			}
		}
	}
	
	protected function _saveAutoLoginId(Sdx_User $user, $id)
	{
		$record = Bd_Orm_Main_Account::getTable()->findByColumn('login_id', $user->getLoginId());

		if($record instanceof Sdx_Null)
		{
			throw new Sdx_Exception('Not exists login id is '.$user->getLoginId());
		}

		$today = new Zend_Date();

		$user->setAttribute('auto_login_expire', $this->_cookie_expire);
		$al = new Bd_Orm_Main_AutoLogin();
		$al
			->setHash($id)
			->setAccountId($record->getId())
			->setExpireDate($today->addSecond($this->_cookie_expire)->toString("yyyy-MM-dd HH:mm:ss"))
			->beginTransaction();
		$al->save();
		$al->commit();
	}
}