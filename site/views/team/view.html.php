<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RCTeamViewTeam extends JViewLegacy
{

	function display($tpl = null)
	{
		// Assign data to the view
		$team = $this->get('team');
		$this->columns = $this->get('columns');
		$this->teamName = $team->TeamName;
		$this->teamDesc = $team->TeamDesc;
		$this->teamMembers = $this->get('members');

		$config = $this->get('Config');

		$this->styleSheet = $config->StyleSheet;

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');

			return false;
		}

		// Display the view
		parent::display($tpl);
	}
}