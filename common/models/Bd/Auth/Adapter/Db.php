<?php
/**
 *
 * @author  Masamoto Miyata <gomocoro@gmail.com>
 * @create  2011/12/21
 * @copyright 2010 Sincere co.
 **/
class Bd_Auth_Adapter_Db implements Zend_Auth_Adapter_Interface
{
    /**
     * Performs an authentication attempt
     *
     * @throws Zend_Auth_Adapter_Exception If authentication cannot be performed
     * @return Zend_Auth_Result
     */
	public function authenticate()
	{
		//TODO Please implement this method.
		throw new Sdx_Exception('This method is generated by enable-acl script. Please implement this method.');
	}
}

/**
 * 
 * RDBを利用したアダプタはこちら
 *
class Bd_Auth_Adapter_Db extends Sdx_Auth_Adapter_Db_Variable
{
	public function __construct($login_id, $password)
	{
		parent::__construct($login_id, $password, array('Bd_Util_Password', 'encrypt'));
	} 
	
	//@return Sdx_Db_Record
	protected function _getUserRecordWithDb(Sdx_Db_Adapter $db = null)
	{
		//TODO Please implement this method.
		throw new Sdx_Exception('This method is generated by enable-acl script. Please implement this method.');
	}
	
	protected function _getPassword(Sdx_Db_Record $record)
	{
		//TODO Please implement this method.
		throw new Sdx_Exception('This method is generated by enable-acl script. Please implement this method.');
	}
	
	protected function _getRole(Sdx_Db_Record $record)
	{
		//TODO Please implement this method.
		throw new Sdx_Exception('This method is generated by enable-acl script. Please implement this method.');
	}
}
*/