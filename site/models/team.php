<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RCTeamModelTeam extends JModelItem
{
	var $teamid;
	
	function __construct()
	{
		$app = JFactory::getApplication('site');
		
		// Load state from the request.
		$this->teamid = $app->input->getInt('teamid', -1);
		$this->columns = $app->input->getInt('columns', 3);
		parent::__construct();
	}
	
	public function getColumns()
	{
		return $this->columns;
	}

	public function getTeam()
	{
		// query the database
		$db = JFactory::getDbo();
		$query = $db->getQuery(true)
			->select(array('TeamName', 'TeamDesc'))
			->from('#__rcteam_teams')
			->where('#__rcteam_teams.TeamID = ' . $this->teamid)
			->where('#__rcteam_teams.published = True')
		;
		$db->setQuery($query);

		return $db->loadObject();
	}

	public function getMembers() 
	{
		// query the database
		$db = JFactory::getDbo();
		$query = $db->getQuery(true)
			->select(array('MemberID', 
					'MemberName', 
					'MemberImage', 
					'MemberBio', 
					'MemberRole', 
					'MemberEmail', 
					'MemberTwitter', 
					'MemberFacebook', 
					'MemberWebsite',
					'MemberInstagram',
					'MemberLinkedin',
					'MemberTumblr',
					'MemberYoutube',
					'MemberGithub',
					'MemberGoogleplus'
					))
			->from('#__rcteam_members')
			->where('#__rcteam_members.TeamID = ' . $this->teamid, 'AND')
			->where('#__rcteam_members.published = True')
			->order('ordering ASC')
		;
		$db->setQuery($query);

		return $db->loadObjectList();
	}

	public function getConfig()
	{
		// query the database
		$db = JFactory::getDbo();
		$query = $db->getQuery(true)
			->select(array('ConfigID', 'StyleSheet'))
			->from('#__rcteam_config')
			->where('#__rcteam_config.ConfigID = ' . 1) //Always 1, because there's only 1 config record
		;
		$db->setQuery($query);

		return $db->loadObject();
	}
}