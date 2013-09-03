<?php


class ControlController extends Sdx_Controller_Action_Http
{
	public function threadAction()
	{
		$helper = new Sdx_Controller_Action_Helper_Scaffold();
		$this->addHelper($helper);
	
		$helper->setViewRendererPath('default/control/scaffold.tpl');
		$helper->run();
	}

}