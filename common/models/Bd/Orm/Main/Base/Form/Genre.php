<?php

abstract class Bd_Orm_Main_Base_Form_Genre extends Sdx_Form
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
    public static function createIdElement()
    {
        return new Sdx_Form_Element_Hidden(array('name'=>'id'));
    }

    public static function createIdValidator(Sdx_Form_Element $element)
    {
        
    }

    /**
     * @return Sdx_Form_Element
     */
    public static function createCodeElement()
    {
        return new Sdx_Form_Element_Text(array('name'=>'code'));
    }

    public static function createCodeValidator(Sdx_Form_Element $element)
    {
        $element->addValidator(new Sdx_Validate_NotEmpty());$element->addValidator(new Sdx_Validate_StringLength(array('max'=>45)));
    }

    /**
     * @return Sdx_Form_Element
     */
    public static function createTypeElement()
    {
        return new Sdx_Form_Element_Text(array('name'=>'type'));
    }

    public static function createTypeValidator(Sdx_Form_Element $element)
    {
        $element->addValidator(new Sdx_Validate_NotEmpty());
    }

    /**
     * @return Sdx_Form_Element
     */
    public static function createSequenceElement()
    {
        return new Sdx_Form_Element_Text(array('name'=>'sequence'));
    }

    public static function createSequenceValidator(Sdx_Form_Element $element)
    {
        $element->addValidator(new Sdx_Validate_NotEmpty());
    }

    protected function _init()
    {
        $this->setName('genre');
        $this->setAttribute('method', 'POST');
        if(!in_array('id', $this->_except_list))
        {
        	$element = call_user_func(array('Bd_Orm_Main_Form_Genre', 'createIdElement'));
        	$this->setElement($element);
        	call_user_func(array('Bd_Orm_Main_Form_Genre', 'createIdValidator'), $element);
        }
        
        if(!in_array('code', $this->_except_list))
        {
        	$element = call_user_func(array('Bd_Orm_Main_Form_Genre', 'createCodeElement'));
        	$this->setElement($element);
        	call_user_func(array('Bd_Orm_Main_Form_Genre', 'createCodeValidator'), $element);
        }
        
        if(!in_array('type', $this->_except_list))
        {
        	$element = call_user_func(array('Bd_Orm_Main_Form_Genre', 'createTypeElement'));
        	$this->setElement($element);
        	call_user_func(array('Bd_Orm_Main_Form_Genre', 'createTypeValidator'), $element);
        }
        
        if(!in_array('sequence', $this->_except_list))
        {
        	$element = call_user_func(array('Bd_Orm_Main_Form_Genre', 'createSequenceElement'));
        	$this->setElement($element);
        	call_user_func(array('Bd_Orm_Main_Form_Genre', 'createSequenceValidator'), $element);
        }
    }

    /**
     * @return Bd_Orm_Main_Table_Genre
     */
    public function getTable()
    {
        return call_user_func(array('Bd_Orm_Main_Genre', 'getTable'));
    }

    /**
     * @return Bd_Orm_Main_Table_Genre
     */
    public function createTable()
    {
        return call_user_func(array('Bd_Orm_Main_Genre', 'createTable'));
    }

    /**
     * @return Bd_Orm_Main_Genre
     */
    public function createRecord()
    {
        return new Bd_Orm_Main_Genre();
    }


}

