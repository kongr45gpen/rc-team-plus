<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RCTeamHelper extends JHelperContent
{
    public static function addSubmenu($vName)
    {
        JHtmlSidebar::addEntry(
            JText::_('COM_RCTEAM_SIDEBAR_CONFIG'),
            'index.php?option=com_rcteam&view=config&layout=edit',
            $vName == 'config'
        );
        JHtmlSidebar::addEntry(
            JText::_('COM_RCTEAM_SIDEBAR_TEAMS'),
            'index.php?option=com_rcteam&view=teams',
            $vName == 'teams'
        );
        JHtmlSidebar::addEntry(
            JText::_('COM_RCTEAM_SIDEBAR_MEMBERS'),
            'index.php?option=com_rcteam&view=members',
            $vName == 'members'
        );
        JHtmlSidebar::addEntry(
            JText::_('COM_RCTEAM_SIDEBAR_ABOUT'),
            'index.php?option=com_rcteam&view=about',
            $vName == 'about'
        );
    }
}