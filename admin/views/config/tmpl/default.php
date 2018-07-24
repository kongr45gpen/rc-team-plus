
<?php

// No direct access
defined('_JEXEC') or die('Restricted access');
$doc = JFactory::getDocument();
$css_path = JURI::root() .'administrator/components/com_rcteam/assets/css/rcteam_admin.css?'.filemtime(JPATH_ROOT .'/administrator/components/com_rcteam/assets/css/rcteam_admin.css');
$doc->addStyleSheet($css_path);
?>
<div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span10">
    <form action="<?php echo JRoute::_('index.php?option=com_rcteam&view=config'); ?>"
        method="post" name="adminForm" id="adminForm">
        <div class="form-horizontal">
            <fieldset class="adminform">
                <legend><?php echo JText::_('COM_RCTEAM_CONFIG'); ?></legend>
                <div class="row-fluid">
                    <div class="span6">
                        <?php foreach ($this->form->getFieldset() as $field): ?>
                            <div class="control-group">
                                <div class="control-label"><?php echo $field->label; ?></div>
                                <div class="controls"><?php echo $field->input; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </fieldset>
        </div>
        <input type="hidden" name="task" value="config.default" />
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>