<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RCTeamModelTeams extends JModelList
{
	protected function getListQuery()
	{
		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);

		// Create the base select statement.
		$query->select('*')
                ->from($db->quoteName('#__rcteam_teams'));

		return $query;
	}

	public function delete($teamID = -1)
	{
		if ($teamID == -1) {return;}
		
		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);

		// Create the delete statement.
		$query->delete('*')
			->from($db->quoteName('#__rcteam_teams'))
			->where('TeamID = ' . $teamID);
		
		$db->setQuery($query);

		$result = $db->execute();

		return $result;
	}
}