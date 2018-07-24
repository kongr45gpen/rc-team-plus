<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_rcteam
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HelloWorlds View
 *
 * @since  0.0.1
 */
class RCTeamViewMembers extends JViewLegacy
{
	/**
	 * Display the Members view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		// Get data from the model
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');

		$this->state = $this->get('State');

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

	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function addToolBar()
	{
		JToolbarHelper::title(JText::_('COM_RCTEAM') . ": " . JText::_('COM_RCTEAM_MANAGER_MEMBERS'), 'members');
		JToolbarHelper::addNew('member.add');
		JToolbarHelper::editList('member.edit');
		JToolbarHelper::deleteList('', 'members.delete');
	}
	
	/**
	 * Add a sidebar
	 * 
	 * @return void
	 */
	protected function addSideBar()
	{
		require_once JPATH_COMPONENT . '/helpers/rcteam.php';
		RCTeamHelper::addSubmenu('members');
		$this->sidebar = JHtmlSidebar::render();
	}
	
}