<?php

require_once 'Bd/Db/Record.php';
require_once 'Bd/Orm/Main/Table/Account.php';
require_once 'Bd/Orm/Main/Const/Account.php';

abstract class Bd_Orm_Main_Base_Account extends Bd_Db_Record
{

    private static $_table_class = null;

    /**
     * @return Bd_Orm_Main_Table_Account
     */
    public static function getTable()
    {
        if(!self::$_table_class)
        {
            self::$_table_class = new Bd_Orm_Main_Table_Account();
            self::$_table_class->lock();
        }
        
        
        return self::$_table_class;
    }

    /**
     * @return Bd_Orm_Main_Table_Account
     */
    protected function _getTable()
    {
        return self::getTable();
    }

    /**
     * @return Bd_Orm_Main_Table_Account
     */
    public static function createTable()
    {
        return new Bd_Orm_Main_Table_Account();
    }

    /**
     * @return Bd_Orm_Main_Form_Account
     */
    public static function createForm(array $except = array())
    {
        return new Bd_Orm_Main_Form_Account('', array(), $except);
    }

    public function getId()
    {
        return $this->_get('id');
    }

    /**
     * @return Bd_Orm_Main_Account
     */
    public function setId($value)
    {
        return $this->_set('id', $value);
    }

    public function getLoginId()
    {
        return $this->_get('login_id');
    }

    /**
     * @return Bd_Orm_Main_Account
     */
    public function setLoginId($value)
    {
        return $this->_set('login_id', $value);
    }

    public function getPassword()
    {
        return $this->_get('password');
    }

    /**
     * @return Bd_Orm_Main_Account
     */
    public function setPassword($value)
    {
        return $this->_set('password', $value);
    }

    public function getName()
    {
        return $this->_get('name');
    }

    /**
     * @return Bd_Orm_Main_Account
     */
    public function setName($value)
    {
        return $this->_set('name', $value);
    }

    public function getUpdatedAt()
    {
        return $this->_get('updated_at');
    }

    /**
     * @return Bd_Orm_Main_Account
     */
    public function setUpdatedAt($value)
    {
        return $this->_set('updated_at', $value);
    }

    public function getCreatedAt()
    {
        return $this->_get('created_at');
    }

    /**
     * @return Bd_Orm_Main_Account
     */
    public function setCreatedAt($value)
    {
        return $this->_set('created_at', $value);
    }

    /**
     * Generated by Sdx_Generator_Model_Relation_OneMany
     *
     * @return Bd_Db_Record_List
     */
    public function getEntryList($arg = null)
    {
        $this->_relation_save = true;
        
        if($arg || !array_key_exists('Entry', $this->_relations))
        {
            list($select, $db) = $this->_detectGetterArg($arg, 'getEntrySelect');
        	
            $table = Bd_Orm_Main_Entry::getTable();
            $select->add('account_id', $this->getId(), 'entry');
            $records = $table->fetchAll($select);
            
        			foreach($records as $record)
        		    {
        				$record->bindAccount($this);
        		    }
        
                    
            $this->_relations['Entry'] = $records;
        }
        
        if(isset($this->_tmp_relations['Entry']))
        {
        	$this->_relations['Entry']->mergeList(
        		$this->_tmp_relations['Entry']
        	);
        	
        	$this->_tmp_relations['Entry']->clear();
        }
                
        return $this->_relations['Entry'];
    }

    /**
     * Generated by Sdx_Generator_Model_Relation_OneMany
     *
     * @return Bd_Orm_Main_Account
     */
    public function setEntryList($records)
    {
        $this->_relation_save = true;
        
        foreach($records as $key=>$record)
        {
        	$record->setAccountId($this->getId());
            $record->bindAccount($this);
        }
        
        if(is_array($records))
        {
        	$records = new Bd_Db_Record_List($records);
        }
        
        $this->_exception_relations['Entry'] = $records;
        $this->_relations['Entry'] = $records;
        if(isset($this->_tmp_relations['Entry']))
        {
        	$this->_tmp_relations['Entry']->clear();
        }
        return $this;
    }

    /**
     * Generated by Sdx_Generator_Model_Relation_OneMany
     *
     * @return Bd_Orm_Main_Account
     */
    public function bindEntry(Bd_Orm_Main_Entry $record = null, $oposite = false)
    {
        $this->_relation_save = true;
        
        if(!array_key_exists('Entry', $this->_relations))
        {
        	$this->_relations['Entry'] = new Bd_Db_Record_List();
        }
        
        if($record && !($record instanceof Sdx_Null))
        {
        	$this->_relations['Entry']->mergeRecord($record);
        	
        		if($oposite)
        	{
        		$record->bindAccount($this);
        	}
        
        }
        
        return $this;
    }

    /**
     * Generated by Sdx_Generator_Model_Relation_OneMany
     *
     * @return Sdx_Db_Select
     */
    public function getEntrySelect(Sdx_Db_Adapter $db = null)
    {
        return Bd_Orm_Main_Entry::getTable()->getSelect($db);
    }

    /**
     * Generated by Sdx_Generator_Model_Relation_OneMany
     *
     * @return Bd_Orm_Main_Account
     */
    public function addEntry(Bd_Orm_Main_Entry $record)
    {
        $this->_relation_save = true;
        
        $record->bindAccount($this);
        $record->setAccountId($this->getId());
        
        if(isset($this->_relations['Entry']))
        {
        	$this->_relations['Entry']->mergeRecord($record);
        }
        else
        {
        	if(!isset($this->_tmp_relations['Entry']))
        	{
        		$this->_tmp_relations['Entry'] = new Bd_Db_Record_List();
        	}
        	$this->_tmp_relations['Entry']->addRecord($record);
        }
        
        return $this;
    }

    /**
     * Generated by Sdx_Generator_Model_Relation_OneMany
     *
     * @return Bd_Orm_Main_Account
     */
    public function poolEntry(Bd_Orm_Main_Entry $record)
    {
        $this->_relation_save = true;
        
        if(!isset($this->_tmp_relations['Entry']))
        {
        	$this->_tmp_relations['Entry'] = new Bd_Db_Record_List();
        }
        
        $this->_tmp_relations['Entry']->addRecord($record);
        return $this;
    }


}
