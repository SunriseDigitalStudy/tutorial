<?php
class Bd_Scaffold_Filter_Thread extends Sdx_Scaffold_Filter
{
  public function createFilterForm()
  {
    $form  = new Sdx_Form();

    $elem = new Sdx_Form_Element_Text();
    $elem
      ->setLabel('タイトル')
      ->setName('title');
    $form->setElement($elem);

    $elem = Bd_Orm_Main_Form_Thread::createMMTagIdElement();
    $elem
      ->setLabel('タグ')
      ->setId('tag_search');
    $form->setElement($elem);

    // $elem = new Sdx_Form_Element_Group_Radio(array('name'=>'hoge'));
    // $elem
    //   ->setChildren(array('hoge', 'huga', 'foo'));
    // $form->setElement($elem);

    // $elem = new Sdx_Form_Element_Group_Select(array('name'=>'huga'));
    // $elem
    //   ->enableMultiple()
    //   ->setChildren(array('hoge', 'huga', 'foo'));
    // $form->setElement($elem);

    // $elem = new Sdx_Form_Element_Checkbox();
    // $elem
    //   ->setLabel('有り')
    //   ->setName('ari');
    // $form->setElement($elem);

    // $elem = new Sdx_Form_Element_Radio();
    // $elem
    //   ->setLabel('ほげ')
    //   ->setName('nasi');
    // $form->setElement($elem);

    return $form;
  }

  protected function _selectTitle(Sdx_Db_Select $select, $column, $value, Sdx_Db_Table $table)
  {
    $select->like('title', '%'.$value.'%', $table);
  }

  public function buildTable(Sdx_Db_Table $table)
  {
    $this->_enableTwoPhasesQuery();
    $table->joinLeft('ThreadTag'); 
  }

  protected function _selectTagId(Sdx_Db_Select $select, $column, $value, Sdx_Db_Table $table)
  {
    $t_tt = $table->getJoinedTable('ThreadTag');
    $select->add('tag_id', $value, $t_tt);
    $select->having('COUNT(tag_id) = '.count($value));
  }
}