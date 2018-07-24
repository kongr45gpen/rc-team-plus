<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

$doc = JFactory::getDocument();
$css_path = JURI::root() .'administrator/components/com_rcteam/assets/css/rcteam_admin.css?'.filemtime(JPATH_ROOT .'/administrator/components/com_rcteam/assets/css/rcteam_admin.css');
$doc->addStyleSheet($css_path);

// sorting
$listOrder  = $this->escape($this->state->get('list.ordering'));
//$listOrder = 'ordering';
$listDirn   = $this->escape($this->state->get('list.direction'));
//$listDirn = 'asc';
$ordering   = ($listOrder == 'a.ordering');
$saveOrder  = ($listOrder == 'a.ordering' && strtolower($listDirn) == 'asc');

JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

$saveOrderingUrl = 'index.php?option=com_rcteam&task=members.saveOrderAjax&tmpl=component';
JHtml::_('sortablelist.sortable', 'itemList', 'adminForm', strtolower($listDirn), $saveOrderingUrl, false, true);

//$order_heading = '<a href="javascript:saveorder('.($numrows - 1). ', \'saveorder\')" class="hasTooltip btn btn-warning btn-micro "
//        title="'.JText::_('JLIB_HTML_SAVE_ORDER').'"><span class="icon-redo"></span></a>';

?>
<div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span10">
	<form action="index.php?option=com_rcteam&view=members" method="post" id="adminForm" name="adminForm">	
		<table class="table table-striped table-hover">
			<thead>
			<tr>
				<th width="2%">
					<?php echo JHtml::_('grid.checkall'); ?>
				</th>
				<th width="1%">
					<?php echo JHtml::_('grid.sort', JText::_('COM_RCTEAM_NUM'), 'a.ordering', $listDirn, $listOrder); ?>
				</th>
				<th width="10%">
					<?php echo JText::_('COM_RCTEAM_MEMBER_IMAGE_LABEL') ;?>
				</th>
				<th width="15%">
					<?php echo JHtml::_('grid.sort', JText::_('COM_RCTEAM_MEMBERS_NAME'), 'a.MemberName', $listDirn, $listOrder);?>
				</th>
				<th width="15%">
					<?php echo JHtml::_('grid.sort', JText::_('COM_RCTEAM_TEAM'), 'b.TeamName', $listDirn, $listOrder);?>
				</th>
				<th width="30%">
					<?php echo JText::_('COM_RCTEAM_MEMBER_BIO_LABEL') ;?>
				</th>
				<th width="5%">
					<?php echo JText::_('COM_RCTEAM_PUBLISHED'); ?>
				</th>
				<th width="2%">
					<?php echo JText::_('COM_RCTEAM_ID'); ?>
				</th>
			</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="5">
						<?php echo $this->pagination->getListFooter(); ?>
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php if (!empty($this->items)) : ?>
					<?php foreach ($this->items as $i => $row) : 
						$link = JRoute::_('index.php?option=com_rcteam&task=member.edit&MemberID=' . $row->MemberID);
						?>
						<tr class="row<?php echo $i % 2; ?>" sortable-group-id="1" item-id="<?php echo $row->MemberID; ?>" parents="" level="1">
							<td>
								<?php echo JHtml::_('grid.id', $i, $row->MemberID); ?>
							</td>
							<td style="text-align:center;">
								<?php if ($saveOrder) {?>
									<div><?php echo $this->pagination->orderUpIcon($i, true, 'members.orderup'); ?></div>
								<?php } ?>
									<div style="padding:6px 6px; margin:0; height:14px;"><span><?php echo $row->ordering; ?></span></div>
								<?php if ($saveOrder) {?>
									<div><?php echo $this->pagination->orderDownIcon($i, count($this->items), true, 'members.orderdown'); ?></div>
								<?php } ?>
							</td>
							<td>
								<a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_RCTEAM_EDIT_MEMBER'); ?>">
									<img src="<?php echo JURI::root() . $row->MemberImage; ?>" style="max-width:100px; max-height:100px;" />
								</a>
							</td>
							<td>
								<a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_RCTEAM_EDIT_MEMBER'); ?>">
									<?php echo $row->MemberName; ?>
								</a>
							</td>
							<td>
								<?php echo $row->TeamName; ?>
							</td>
							<td>
								<?php echo $row->MemberBio; ?>
							</td>
							<td align="center">
								<?php echo JHtml::_('jgrid.published', $row->published, $i, 'members.', true, 'cb'); ?>
							</td>
							<td align="center">
								<?php echo $row->MemberID; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
		<input type="hidden" name="task" value=""/>
		<input type="hidden" name="boxchecked" value="0"/>
		<input type="hidden" name="ordering" value="<?php echo $this->common_data->ordering; ?>" />
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />	
		<input type="hidden" name="controller" value="members" />
		<?php echo JHtml::_('form.token'); ?>
	</form>
</div>
