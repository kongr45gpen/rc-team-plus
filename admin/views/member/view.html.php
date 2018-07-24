<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RCTeamViewMember extends JViewLegacy
{

	protected $form = null;

	public function display($tpl = null)
	{
		// Get the Data
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');
		$this->script = $this->get('Script');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	protected function addToolBar()
	{
		$input = JFactory::getApplication()->input;

		// Hide Joomla Administrator Main menu
		$input->set('hidemainmenu', true);

		$this->isNew = ($this->item->MemberID == 0);

		if ($this->isNew)
		{
			$title = JText::_('COM_RCTEAM_MANAGER_MEMBER_NEW');
		}
		else
		{
			$title = JText::_('COM_RCTEAM_MANAGER_MEMBER_EDIT');
		}

		JToolbarHelper::title($title, 'member');
		if ($this->isNew) {
			JToolbarHelper::save('member.save');
			JToolbarHelper::save2new('member.save2new');
		} else {
			$jinput = JFactory::getApplication()->input;
			JToolbarHelper::save('member.update');
		}
		JToolbarHelper::cancel(
			'member.cancel',
			$this->isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE'
		);
	}

	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->addScript(JURI::root() . $this->script);
		$document->addScript(JURI::root() . "/administrator/components/com_rcteam"
		                                  . "/views/submitbutton.js");
		JText::script('COM_RCTEAM_UNACCEPTABLE');
	}
}