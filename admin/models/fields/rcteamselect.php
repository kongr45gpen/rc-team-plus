<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('list');

class JFormFieldRCTeamSelect extends JFormFieldList
{

	protected $type = 'HelloWorld';

	protected function getOptions()
	{
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('TeamID, TeamName');
		$query->from('#__rcteam_teams');
		$db->setQuery((string) $query);
		$messages = $db->loadObjectList();
		$options  = array();

		if ($messages)
		{
			foreach ($messages as $message)
			{
				$options[] = JHtml::_('select.option', $message->TeamID, $message->TeamName);
			}
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}