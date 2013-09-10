<?php

require_once 'Bd/Orm/Main/Base/Account.php';

class Bd_Orm_Main_Account extends Bd_Orm_Main_Base_Account
{
  private $_raw_password;

  public function setRawPassword($raw_password)
  {
    $this->_raw_password = $raw_password;
    return $this;
  }

  public function save(Sdx_Db_Adapter $db = null, $recursive = false)
  {
    if($this->_raw_password !== null)
    {
      if($this->isNew())
      {
        if($this->_raw_password)
        {
          $this->setPassword('temp');
        }

        parent::save($db, $recursive);
      }

      $this->setPassword(Bd_Util_Encrypt::calcPassword($this->getId(), $this->_raw_password));
    	$this->_raw_password = null;
    }

    parent::save($db, $recursive);
  }

  public function getRole()
  {
    return 'user';
  }
}

