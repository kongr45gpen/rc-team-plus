<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RCTeamViewTeams extends JViewLegacy
{

	function display($tpl = null)
	{
		// Assign data to the view
		$this->columns = $this->get('columns');
		$this->teams = $this->getAllTeams();

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

    private function getAllTeams()
    {
        // query the database
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
            ->select(array('TeamID', 
                    'TeamName',
                    'TeamDesc'
                    ))
            ->from('#__rcteam_teams')
            ->where('#__rcteam_teams.published = True')
            ->order('TeamID ASC')
        ;
        $db->setQuery($query);

        $objects = $db->loadObjectList();
        foreach ($objects as $object) {
            $object->Members = $this->getMembers($object->TeamID);
        }

        return $objects;
    }

     private function getMembers($teamid) 
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
            ->where('#__rcteam_members.TeamID = ' . (int) $teamid, 'AND')
            ->where('#__rcteam_members.published = True')
            ->order('ordering ASC')
        ;
        $db->setQuery($query);

        return $db->loadObjectList();
    }

}
