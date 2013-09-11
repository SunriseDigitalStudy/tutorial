<?php
/**
 * データベースを使った自動ログイン用。
 * データベースを使わない場合はSdx_Auth_Adapterを継承して下さい。
 **/
class Bd_Auth_Adapter_DbAutoLogin extends Sdx_Auth_Adapter_Db2
{
  /**
   * Cookieに保存したユニークなトークン
   */
  private $_token;

  /**
   * @param string $token Cookieに保存したユニークなトークン
   */
  public function __construct($token)
  {
    $this->_token = $token;
  }

  /**
   * アカウントのデータを検索して返す
   * @return boolean|Bd_Orm_Main_AutoLogin
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
   * パスワードが一致しているか検証する
   * @param Bd_Orm_Main_AutoLogin $account
   * @return bool|array array('login_id'=>'xxxx', 'role'=>'xxx')
   */
  protected function _auth($auto_login)
  {
    $account = $auto_login->getAccount();
      
    return array(
      'id' => $account->getId(),
      'login_id' => $account->getLoginId(),
    );
  }
}