<?php
/**
 *
 * @author  Masamoto Miyata <gomocoro@gmail.com>
 * @create  2011/12/21
 * @copyright 2010 Sincere co.
 **/
class Bd_Auth_Adapter_Db extends Sdx_Auth_Adapter_Db_Variable
{
	public function __construct($login_id, $password)
	{
		parent::__construct($login_id, $password, array('Bd_Orm_Main_Account', 'hashPassword'));
	} 
	
	//@return Sdx_Db_Record
	protected function _getUserRecordWithDb(Sdx_Db_Adapter $db = null)
	{
		$t_account = Bd_Orm_Main_Account::getTable();
		return $t_account->findByColumn('login_id', $this->_login_id, $db);
	}
	
	protected function _getPassword(Sdx_Db_Record $record)
	{
		return $record->getPassword();
	}
	
	protected function _getRole(Sdx_Db_Record $record)
	{
		//今回はRoleを扱わないのでuserを返しておきます。
		return $record->getRole();
	}
}