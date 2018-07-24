<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RCTeamModelMember extends JModelAdmin
{
	public function getTable($type = 'Member', $prefix = 'RCTeamTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function save($data = array())
	{	
		// override the save method so that we can have the 
		// 'ordering' field set to what we need it to be
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select('MAX('.$db->quoteName('ordering').') AS '.$db->quoteName('maxorder'))
				->from($db->quoteName('#__rcteam_members'));
		
		$db->setQuery($query);
		$result = $db->loadResult();

		$data['ordering'] = $result + 1;
		return parent::save($data);
	}

	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm(
			'com_rcteam.member',
			'member',
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
			'com_rcteam.edit.member.data',
			array()
		);

		if (empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}

	public function update($updateObj) {
		if ($updateObj->memberID == -1) {return;}

		$result = JFactory::getDbo()->updateObject('#__rcteam_members', $updateObj, 'MemberID');

		return $result;
	}

	public function getScript() 
	{
		return 'administrator/components/com_rcteam/models/forms/validation.js';
	}
}