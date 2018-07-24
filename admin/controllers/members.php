<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');


class RCTeamControllerMembers extends JControllerAdmin
{

	public function getModel($name = 'Member', $prefix = 'RCTeamModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
    }

	public function delete()
	{
		$jinput = JFactory::getApplication()->input;
		$cids = $jinput->get('cid', array(0), 'ARRAY');
		$membersModel = $this->getModel();
		foreach ($cids as $memberID) {
			$membersModel->delete($memberID);
			echo $memberID;
		}
		$this->setRedirect('index.php?option=com_rcteam&view=members');
	}

	public function orderup()
	{
		$jinput = JFactory::getApplication()->input;
		$cid = $jinput->get('cid',  array(0 => 0), 'ARRAY');
		$id = (int) $cid[0];
		$membersModel = $this->getModel();
		$membersModel->move($id, -1);
		$this->setRedirect('index.php?option=com_rcteam&view=members');
	}

	public function orderdown()
	{
		$jinput = JFactory::getApplication()->input;
		$cid = $jinput->get('cid',  array(0 => 0), 'ARRAY');
		$id = (int) $cid[0];
		$membersModel = $this->getModel();
		$membersModel->move($id, 1);
		$this->setRedirect('index.php?option=com_rcteam&view=members');
	}

	public function new()
	{
		
	}

}