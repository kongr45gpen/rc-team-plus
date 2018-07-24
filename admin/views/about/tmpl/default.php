<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
$doc = JFactory::getDocument();
$css_path = JURI::root() .'administrator/components/com_rcteam/assets/css/rcteam_admin.css?'.filemtime(JPATH_ROOT .'/administrator/components/com_rcteam/assets/css/rcteam_admin.css');
$doc->addStyleSheet($css_path);

?><div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span10">
    <legend><?php echo JText::_('COM_RCTEAM_ABOUT_TITLE'); ?></legend>
    <p><?php echo JText::_('COM_RCTEAM_ABOUT_DESC'); ?><a href="http://therichcourt.com/joomla" target="_blank">therichcourt.com/joomla</a></p>
    <p><?php echo JText::_('COM_RCTEAM_ABOUT_HELP'); ?><a href="http://therichcourt.com/support" target="_blank">therichcourt.com/support</a></p>
</div>