<?php


class AccountController extends Sdx_Controller_Action_Http
{
	public function createAction()
	{
		$form = new Sdx_Form();
		$form
			->setActionCurrentPage()
			->setMethodToPost();

		//login_id
		$t_account = Bd_Orm_Main_Account::createTable();
		$elem = new Sdx_Form_Element_Text();
		$elem
			->setName('login_id')
			->addValidator(new Sdx_Validate_NotEmpty())
			->addValidator(new Sdx_Validate_Regexp(
				'/^[a-zA-Z0-9]+$/u',
				'英数字と@_-のみ使用可能です'
			))
			->addValidator(new Sdx_Validate_Db_Unique(
				$t_account,
				'login_id',
				$t_account->getSelect()->forUpdate()
			));
		$form->setElement($elem);

		//password
		$elem = new Sdx_Form_Element_Password();
		$elem
			->setName('password')
			->addValidator(new Sdx_Validate_NotEmpty())
			->addValidator(new Sdx_Validate_StringLength(array('min'=>4)));
		$form->setElement($elem);

		//name
		$elem = new Sdx_Form_Element_Text();
		$elem
			->setName('name')
			->addValidator(new Sdx_Validate_NotEmpty())
			->addValidator(new Sdx_Validate_StringLength(array('max'=>18)));
		$form->setElement($elem);

		//formがsubmitされていたら
		if($this->_getParam('submit'))
		{
			//formにsubmitされた値をformの各elementに戻す
			$form->bind($this->_getAllParams());
			$account = new Bd_Orm_Main_Account();
			$db = $account->updateConnection();
			//全てのエラーチェックを通過
			$db->beginTransaction();
			try
			{
				//Validateを実行
				if($form->execValidate())
				{
					$account
						->setLoginId($this->_getParam('login_id'))
						->setRawPassword($this->_getParam('password'))
						->setName($this->_getParam('name'));

					$account->save();

					$db->commit();

					$this->redirectAfterSave('/account/create');
				}
				else
				{
					$db->rollback();
				}
			}
			catch (Exception $e)
			{
				$db->rollback();
				throw $e;
			}
		}

		$this->view->assign('form', $form);
	}
}