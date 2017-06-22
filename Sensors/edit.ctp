<div class="sensors form">
<?php echo $this->Form->create('Sensor'); ?>
	<fieldset>
		<legend><?php echo __('Edit Sensor'); ?></legend>
	<?php
		echo $this->Form->input('ID');
		echo $this->Form->input('Value');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Sensor.ID')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Sensor.ID')))); ?></li>
		<li><?php echo $this->Html->link(__('List Sensors'), array('action' => 'index')); ?></li>
	</ul>
</div>
