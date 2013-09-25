<?php

require_once 'Bd/Db/Record.php';
require_once 'Bd/Orm/Main/Table/GenreName.php';
require_once 'Bd/Orm/Main/Const/GenreName.php';

abstract class Bd_Orm_Main_Base_GenreName extends Bd_Db_Record
{

    private static $_table_class = null;

    /**
     * @return Bd_Orm_Main_Table_GenreName
     */
    public static function getTable()
    {
        if(!self::$_table_class)
        {
            self::$_table_class = new Bd_Orm_Main_Table_GenreName();
            self::$_table_class->lock();
        }
        
        
        return self::$_table_class;
    }

    /**
     * @return Bd_Orm_Main_Table_GenreName
     */
    protected function _getTable()
    {
        return self::getTable();
    }

    /**
     * @return Bd_Orm_Main_Table_GenreName
     */
    public static function createTable()
    {
        return new Bd_Orm_Main_Table_GenreName();
    }

    /**
     * @return Bd_Orm_Main_Form_GenreName
     */
    public static function createForm(array $except = array())
    {
        return new Bd_Orm_Main_Form_GenreName('', array(), $except);
    }

    public function getGenreId()
    {
        return $this->_get('genre_id');
    }

    /**
     * @return Bd_Orm_Main_GenreName
     */
    public function setGenreId($value)
    {
        return $this->_set('genre_id', $value);
    }

    public function getLang()
    {
        return $this->_get('lang');
    }

    /**
     * @return Bd_Orm_Main_GenreName
     */
    public function setLang($value)
    {
        return $this->_set('lang', $value);
    }

    public function getValue()
    {
        return $this->_get('value');
    }

    /**
     * @return Bd_Orm_Main_GenreName
     */
    public function setValue($value)
    {
        return $this->_set('value', $value);
    }


}

