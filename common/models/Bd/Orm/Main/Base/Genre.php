<?php

require_once 'Bd/Db/Record.php';
require_once 'Bd/Orm/Main/Table/Genre.php';
require_once 'Bd/Orm/Main/Const/Genre.php';

abstract class Bd_Orm_Main_Base_Genre extends Bd_Db_Record
{

    private static $_table_class = null;

    /**
     * @return Bd_Orm_Main_Table_Genre
     */
    public static function getTable()
    {
        if(!self::$_table_class)
        {
            self::$_table_class = new Bd_Orm_Main_Table_Genre();
            self::$_table_class->lock();
        }
        
        
        return self::$_table_class;
    }

    /**
     * @return Bd_Orm_Main_Table_Genre
     */
    protected function _getTable()
    {
        return self::getTable();
    }

    /**
     * @return Bd_Orm_Main_Table_Genre
     */
    public static function createTable()
    {
        return new Bd_Orm_Main_Table_Genre();
    }

    /**
     * @return Bd_Orm_Main_Form_Genre
     */
    public static function createForm(array $except = array())
    {
        return new Bd_Orm_Main_Form_Genre('', array(), $except);
    }

    public function getId()
    {
        return $this->_get('id');
    }

    /**
     * @return Bd_Orm_Main_Genre
     */
    public function setId($value)
    {
        return $this->_set('id', $value);
    }

    public function getName()
    {
        return $this->_get('name');
    }

    /**
     * @return Bd_Orm_Main_Genre
     */
    public function setName($value)
    {
        return $this->_set('name', $value);
    }

    public function getSequence()
    {
        return $this->_get('sequence');
    }

    /**
     * @return Bd_Orm_Main_Genre
     */
    public function setSequence($value)
    {
        return $this->_set('sequence', $value);
    }

    /**
     * Generated by Sdx_Generator_Model_Relation_OneMany
     *
     * @return Bd_Db_Record_List
     */
    public function getThreadList($arg = null)
    {
        $this->_relation_save = true;
        
        if($arg || !array_key_exists('Thread', $this->_relations))
        {
            list($select, $db) = $this->_detectGetterArg($arg, 'getThreadSelect');
        	
            $table = Bd_Orm_Main_Thread::getTable();
            $select->add('genre_id', $this->getId(), 'thread');
            $records = $table->fetchAll($select);
            
        			foreach($records as $record)
        		    {
        				$record->bindGenre($this);
        		    }
        
                    
            $this->_relations['Thread'] = $records;
        }
        
        if(isset($this->_tmp_relations['Thread']))
        {
        	$this->_relations['Thread']->mergeList(
        		$this->_tmp_relations['Thread']
        	);
        	
        	$this->_tmp_relations['Thread']->clear();
        }
                
        return $this->_relations['Thread'];
    }

    /**
     * Generated by Sdx_Generator_Model_Relation_OneMany
     *
     * @return Bd_Orm_Main_Genre
     */
    public function setThreadList($records)
    {
        $this->_relation_save = true;
        
        foreach($records as $key=>$record)
        {
        	$record->setGenreId($this->getId());
            $record->bindGenre($this);
        }
        
        if(is_array($records))
        {
        	$records = new Bd_Db_Record_List($records);
        }
        
        $this->_exception_relations['Thread'] = $records;
        $this->_relations['Thread'] = $records;
        if(isset($this->_tmp_relations['Thread']))
        {
        	$this->_tmp_relations['Thread']->clear();
        }
        return $this;
    }

    /**
     * Generated by Sdx_Generator_Model_Relation_OneMany
     *
     * @return Bd_Orm_Main_Genre
     */
    public function bindThread(Bd_Orm_Main_Thread $record = null, $oposite = false)
    {
        $this->_relation_save = true;
        
        if(!array_key_exists('Thread', $this->_relations))
        {
        	$this->_relations['Thread'] = new Bd_Db_Record_List();
        }
        
        if($record && !($record instanceof Sdx_Null))
        {
        	$this->_relations['Thread']->mergeRecord($record);
        	
        		if($oposite)
        	{
        		$record->bindGenre($this);
        	}
        
        }
        
        return $this;
    }

    /**
     * Generated by Sdx_Generator_Model_Relation_OneMany
     *
     * @return Sdx_Db_Select
     */
    public function getThreadSelect(Sdx_Db_Adapter $db = null)
    {
        return Bd_Orm_Main_Thread::getTable()->getSelect($db);
    }

    /**
     * Generated by Sdx_Generator_Model_Relation_OneMany
     *
     * @return Bd_Orm_Main_Genre
     */
    public function addThread(Bd_Orm_Main_Thread $record)
    {
        $this->_relation_save = true;
        
        $record->bindGenre($this);
        $record->setGenreId($this->getId());
        
        if(isset($this->_relations['Thread']))
        {
        	$this->_relations['Thread']->mergeRecord($record);
        }
        else
        {
        	if(!isset($this->_tmp_relations['Thread']))
        	{
        		$this->_tmp_relations['Thread'] = new Bd_Db_Record_List();
        	}
        	$this->_tmp_relations['Thread']->addRecord($record);
        }
        
        return $this;
    }

    /**
     * Generated by Sdx_Generator_Model_Relation_OneMany
     *
     * @return Bd_Orm_Main_Genre
     */
    public function poolThread(Bd_Orm_Main_Thread $record)
    {
        $this->_relation_save = true;
        
        if(!isset($this->_tmp_relations['Thread']))
        {
        	$this->_tmp_relations['Thread'] = new Bd_Db_Record_List();
        }
        
        $this->_tmp_relations['Thread']->addRecord($record);
        return $this;
    }


}

