<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RCTeamControllerMember extends JControllerForm
{
     public function update() {
        $jinput = JFactory::getApplication()->input; 

        //cast input to object so it can be easily used in the query
        $updateObj = (object) $jinput->post->getArray()['jform'];

        $model = $this->getModel();
        $model->update($updateObj);

        $this->setRedirect('index.php?option=com_rcteam&view=members');
        JFactory::getApplication()->enqueueMessage(JText::_("Member updated")); 
     }
}