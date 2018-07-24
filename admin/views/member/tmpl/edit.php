
<?php

// No direct access
defined('_JEXEC') or die('Restricted access');

$doc = JFactory::getDocument();
$css_path = JURI::root() .'administrator/components/com_rcteam/assets/css/rcteam_admin.css?'.filemtime(JPATH_ROOT .'/administrator/components/com_rcteam/assets/css/rcteam_admin.css');
$doc->addStyleSheet($css_path);

JHtml::_('behavior.formvalidator');
?>
<form action="<?php echo JRoute::_('index.php?option=com_rcteam&layout=edit&memberid=' . (int) $this->item->MemberID); ?>"
    method="post" name="adminForm" id="adminForm" class="form-validate">
<legend><?php echo JText::_('COM_RCTEAM_MEMBER_DETAILS'); ?></legend>

<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>
    <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_RCTEAM_MEMBER_TAB_1_NAME', true)); ?>

        
            
        <div class="form-horizontal">
            <fieldset class="adminform">
                <div class="row-fluid">
                    <div class="span9">
                        <?php foreach ($this->form->getFieldset('basicinfo') as $field): ?>
                            <div class="control-group">
                                <div class="control-label"><?php echo $field->label; ?></div>
                                <div class="controls"><?php echo $field->input; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="span3">
                        <div class="form-vertical">
                        <?php foreach ($this->form->getFieldset('misc') as $field): ?>
                            <div class="control-group">
                                <div class="control-label"><?php echo $field->label; ?></div>
                                <div class="controls"><?php echo $field->input; ?></div>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
            
        

    <?php echo JHtml::_('bootstrap.endTab'); ?>
    <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'advanced', JText::_('COM_RCTEAM_MEMBER_TAB_2_NAME', true)); ?>

        <div class="form-horizontal">
            <fieldset class="adminform">
                <div class="row-fluid">
                    <div class="span9">
                        <?php foreach ($this->form->getFieldset('contacticons') as $field): ?>
                            <div class="control-group">
                                <div class="control-label"><?php echo $field->label; ?></div>
                                <div class="controls"><?php echo $field->input; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </fieldset>
        </div>

    <?php echo JHtml::_('bootstrap.endTab'); ?>
<?php echo JHtml::_('bootstrap.endTabSet'); ?>

<input type="hidden" name="task" value="member.edit" />
            <?php echo JHtml::_('form.token'); ?>
</form>

