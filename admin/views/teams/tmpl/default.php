<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
$doc = JFactory::getDocument();
$css_path = JURI::root() .'administrator/components/com_rcteam/assets/css/rcteam_admin.css?'.filemtime(JPATH_ROOT .'/administrator/components/com_rcteam/assets/css/rcteam_admin.css');
$doc->addStyleSheet($css_path);
?>
<div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span10">
	<form action="index.php?option=com_rcteam&view=teams" method="post" id="adminForm" name="adminForm">
		<table class="table table-striped table-hover">
			<thead>
			<tr>
				<th width="1%"><?php echo JText::_('COM_RCTEAM_NUM'); ?></th>
				<th width="2%">
					<?php echo JHtml::_('grid.checkall'); ?>
				</th>
				<th width="20%">
					<?php echo JText::_('COM_RCTEAM_TEAMS_NAME') ;?>
				</th>
				<th width="70%">
					<?php echo JText::_('COM_RCTEAM_TEAM_DESC') ;?>
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
						$link = JRoute::_('index.php?option=com_rcteam&task=team.edit&TeamID=' . $row->TeamID);
						?>
						<tr>
							<td>
								<?php echo $this->pagination->getRowOffset($i); ?>
							</td>
							<td>
								<?php echo JHtml::_('grid.id', $i, $row->TeamID); ?>
							</td>
							<td>
								<a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_RCTEAM_EDIT_TEAM'); ?>">
									<?php echo $row->TeamName; ?>
								</a>
							</td>
							<td>
								<?php echo $row->TeamDesc; ?>
							</td>
							<td align="center">
								<?php echo JHtml::_('jgrid.published', $row->published, $i, 'teams.', true, 'cb'); ?>
							</td>
							<td align="center">
								<?php echo $row->TeamID; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
		<input type="hidden" name="task" value=""/>
		<input type="hidden" name="boxchecked" value="0"/>
		<?php echo JHtml::_('form.token'); ?>
	</form>
</div>
