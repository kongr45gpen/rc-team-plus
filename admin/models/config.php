<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RCTeamModelConfig extends JModelAdmin
{
	public function getTable($type = 'Config', $prefix = 'RCTeamTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getForm($data = array(), $loadData = true)
	{

		// Get the form.
		$form = $this->loadForm(
			'com_rcteam.config',
			'config',
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
			'com_rcteam.default.config.data',
			array()
		);

		if (empty($data))
		{
			$data = $this->getItem(1); //always ConfigID = 1, as there's only 1 config row
		}
		
		return $data;
	}

	public function update($updateObj) {
		if ($updateObj->ConfigID != 1) {return;}
		$result = JFactory::getDbo()->updateObject('#__rcteam_config', $updateObj, 'ConfigID');
		return $result;
	}
}