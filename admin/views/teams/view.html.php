<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RCTeamViewTeams extends JViewLegacy
{

	function display($tpl = null)
	{
		// Get data from the model
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}
		
		// Set the toolbar and sidebar
		$this->addToolBar();
		$this->addSideBar();

		// Display the template
		parent::display($tpl);
	}

	protected function addToolBar()
	{
		JToolbarHelper::title(JText::_('COM_RCTEAM') . ": " . JText::_('COM_RCTEAM_MANAGER_TEAMS'), 'teams');
		JToolbarHelper::addNew('team.add');
		JToolbarHelper::editList('team.edit');
		JToolbarHelper::deleteList('', 'teams.delete');
	}

	protected function addSideBar()
	{
		require_once JPATH_COMPONENT . '/helpers/rcteam.php';
		RCTeamHelper::addSubmenu('teams');
		$this->sidebar = JHtmlSidebar::render();
	}
}