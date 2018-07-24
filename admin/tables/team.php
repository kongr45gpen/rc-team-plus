<?php

// No direct access
defined('_JEXEC') or die('Restricted access');

class RCTeamTableTeam extends JTable
{
	function __construct(&$db)
	{
		parent::__construct('#__rcteam_teams', 'TeamID', $db);
	}
}