<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RCTeamModelTeam extends JModelAdmin
{
	public function getTable($type = 'Team', $prefix = 'RCTeamTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm(
			'com_rcteam.team',
			'team',
			array(
				'control' => 'jform',
				'load_data' => $loadData
			)
		);

		if (empty($form))
		{
			return false;
		}

		return $form;
	}

	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState(
			'com_rcteam.edit.team.data',
			array()
		);

		if (empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}

	public function update($updateObj) {
		if ($updateObj->teamID == -1) {return;}
		
		$result = JFactory::getDbo()->updateObject('#__rcteam_teams', $updateObj, 'TeamID');

		return $result;
	}
}