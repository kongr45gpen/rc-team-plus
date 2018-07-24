<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RCTeamViewConfig extends JViewLegacy
{

	protected $form = null;
	
	public function display($tpl = null)
	{
		// Get the Data
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		// Set the toolbar, sidebar
		$this->addToolBar();
		$this->addSideBar();

		// Display the template
		parent::display($tpl);
	}

	protected function addToolBar()
	{
		$input = JFactory::getApplication()->input;

		$title = JText::_('COM_RCTEAM') . ": " . JText::_('COM_RCTEAM_CONFIG');
		
        $jinput = JFactory::getApplication()->input;

		JToolbarHelper::title($title, 'config');
		JToolbarHelper::apply('config.update');
		
		JToolbarHelper::cancel(
			'config.cancel',
			'JTOOLBAR_CANCEL'
		);
	}

	protected function addSideBar()
	{
		require_once JPATH_COMPONENT . '/helpers/rcteam.php';
		RCTeamHelper::addSubmenu('config');
		$this->sidebar = JHtmlSidebar::render();
	}
}