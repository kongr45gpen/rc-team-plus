<?php

// No direct access
defined('_JEXEC') or die('Restricted access');

class RCTeamTableConfig extends JTable
{
	function __construct(&$db)
	{
		parent::__construct('#__rcteam_config', 'ConfigID', $db);
	}
}