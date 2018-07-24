<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RCTeamControllerTeams extends JControllerAdmin
{

	public function getModel($name = 'Team', $prefix = 'RCTeamModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
    }

	public function delete() {
		$jinput = JFactory::getApplication()->input;
		$cids = $jinput->get('cid', array(0), 'ARRAY');
		$teamsModel = $this->getModel();
		foreach ($cids as $teamID) {
			$teamsModel->delete($teamID);
			echo $teamID;
		}
		$this->setRedirect('index.php?option=com_rcteam&view=teams');
	}

	public function new() {
		
	}

}