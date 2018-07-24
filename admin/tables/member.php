<?php

// No direct access
defined('_JEXEC') or die('Restricted access');

class RCTeamTableMember extends JTable
{
	var $ordering = 'ordering';
	
	function __construct(&$db)
	{
		parent::__construct('#__rcteam_members', 'MemberID', $db);
	}
}