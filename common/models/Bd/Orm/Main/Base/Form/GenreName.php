<?php

abstract class Bd_Orm_Main_Base_Form_GenreName extends Sdx_Form
{

    private $_except_list = array();

    public function __construct($name = "", array $attributes = array(), array $except_list = array())
    {
        $this->_except_list = $except_list;
        parent::__construct($name, $attributes);
    }

    /**
     * @return Sdx_Form_Element
     */
    public static function createGenreIdElement()
    {
        return new Sdx_Form_Element_Hidden(array('name'=>'genre_id'));
    }

    public static function createGenreIdValidator(Sdx_Form_Element $element)
    {
        
    }

    /**
     * @return Sdx_Form_Element
     */
    public static function createLangElement()
    {
        return new Sdx_Form_Element_Hidden(array('name'=>'lang'));
    }

    public static function createLangValidator(Sdx_Form_Element $element)
    {
        $element->addValidator(new Sdx_Validate_StringLength(array('max'=>2)));
    }

    /**
     * @return Sdx_Form_Element
     */
    public static function createValueElement()
    {
        return new Sdx_Form_Element_Text(array('name'=>'value'));
    }

    public static function createValueValidator(Sdx_Form_Element $element)
    {
        $element->addValidator(new Sdx_Validate_NotEmpty());$element->addValidator(new Sdx_Validate_StringLength(array('max'=>80)));
    }

    protected function _init()
    {
        $this->setName('genre_name');
        $this->setAttribute('method', 'POST');
        if(!in_array('genre_id', $this->_except_list))
        {
        	$element = call_user_func(array('Bd_Orm_Main_Form_GenreName', 'createGenreIdElement'));
        	$this->setElement($element);
        	call_user_func(array('Bd_Orm_Main_Form_GenreName', 'createGenreIdValidator'), $element);
        }
        
        if(!in_array('lang', $this->_except_list))
        {
        	$element = call_user_func(array('Bd_Orm_Main_Form_GenreName', 'createLangElement'));
        	$this->setElement($element);
        	call_user_func(array('Bd_Orm_Main_Form_GenreName', 'createLangValidator'), $element);
        }
        
        if(!in_array('value', $this->_except_list))
        {
        	$element = call_user_func(array('Bd_Orm_Main_Form_GenreName', 'createValueElement'));
        	$this->setElement($element);
        	call_user_func(array('Bd_Orm_Main_Form_GenreName', 'createValueValidator'), $element);
        }
    }

    /**
     * @return Bd_Orm_Main_Table_GenreName
     */
    public function getTable()
    {
        return call_user_func(array('Bd_Orm_Main_GenreName', 'getTable'));
    }

    /**
     * @return Bd_Orm_Main_Table_GenreName
     */
    public function createTable()
    {
        return call_user_func(array('Bd_Orm_Main_GenreName', 'createTable'));
    }

    /**
     * @return Bd_Orm_Main_GenreName
     */
    public function createRecord()
    {
        return new Bd_Orm_Main_GenreName();
    }


}

