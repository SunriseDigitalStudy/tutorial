<?php
/**
 *
 * @author  Masamoto Miyata <gomocoro@gmail.com>
 * @create  2011/12/21
 * @copyright 2010 Sincere co.
 **/
class Bd_Auth_Adapter_DbAutoLogin extends Sdx_Auth_Adapter_Db2
{
	private $_token;

	public function __construct($token)
	{
		$this->_token = $token;
	}

	/**
	 * アカウントのデータを検索して返す
	 * @return boolean|\Bd_Orm_Main_AutoLogin
	 */
	protected function _find()
	{
		$t_auto_login = Bd_Orm_Main_AutoLogin::getTable();
		$auto_login = $t_auto_login->findByPkey($this->_token);
		if (!$auto_login instanceof Bd_Orm_Main_AutoLogin)
		{
			return false;
		}

		return $auto_login;
	}

	/**
	 * 自動ログインできるか検証する
	 * @param Bd_Orm_Main_AutoLogin $auto_login
	 * @return bool|array
	 */
	protected function _auth($auto_login)
	{
		/* @var $auto_login Bd_Orm_Main_AutoLogin */
		$account = $auto_login->getAccount();

		$auto_login->beginTransaction();
		try
		{
			$auto_login->delete();
			$auto_login->commit();
		}
		catch(Exception $e)
		{
			$auto_login->rollback();
			throw $e;
		}
			
		return array(
			'login_id' => $account->getLoginId(),
			'role' => $account->getRole(),
		);
	}
}