<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RCTeamViewAbout extends JViewLegacy
{
    function display($tpl = null)
	{
        // Set the toolbar and sidebar
		$this->addToolBar();
		$this->addSideBar();

        // Display the template
		parent::display($tpl);
    }

	protected function addToolBar()
	{
		JToolbarHelper::title(JText::_('COM_RCTEAM_ABOUT_TITLE'), 'about');
    }

	protected function addSideBar()
	{
		require_once JPATH_COMPONENT . '/helpers/rcteam.php';
		RCTeamHelper::addSubmenu('about');
		$this->sidebar = JHtmlSidebar::render();
	}
}