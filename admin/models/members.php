<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RCTeamModelMembers extends JModelList
{
	public function __construct($config = array())
	{
		$config['filter_fields'] = array(
			'a.ordering',
			'a.MemberName',
			'b.TeamName'
		);
		parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null) {
		parent::populateState('a.ordering', 'ASC');
	}
	
	protected function getListQuery()
	{
		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);

		// Create the base select statement.
		$query->select(array('a.*', 'b.TeamID', 'b.TeamName', 'b.TeamDesc'))
				->from($db->quoteName('#__rcteam_members', 'a'))
				->join('LEFT', $db->quoteName('#__rcteam_teams', 'b') . ' ON (' . $db->quoteName('a.TeamID') . ' = ' . $db->quoteName('b.TeamID') . ')')
				->order($db->escape($this->getState('list.ordering', 'a.ordering')).' '.$db->escape($this->getState('list.direction', 'ASC')))
			;
		return $query;
	}

	public function delete($memberID = -1)
	{
		if ($memberID == -1) {return;}
		
		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);

		// Create the delete statement.
		$query->delete($db->quoteName('#__rcteam_members.*'))
			->from($db->quoteName('#__rcteam_members'))
			->where($db->quoteName('MemberID') . ' = ' . $memberID);
		
		$db->setQuery($query);

		$result = $db->execute();

		return $result;
	}

	function move($id, $direction)
	{
		$row = JTable::getInstance('Member', 'Table', array());
		$row->load($id);
		$row->move($direction);
	}

}