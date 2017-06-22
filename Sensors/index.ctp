<div class="sensors index">
	<h2><?php echo __('Sensors'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('ID'); ?></th>
			<th><?php echo $this->Paginator->sort('Value'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($sensors as $sensor): ?>
	<tr>
		<td><?php echo h($sensor['Sensor']['ID']); ?>&nbsp;</td>
		<td><?php echo h($sensor['Sensor']['Value']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sensor['Sensor']['ID'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sensor['Sensor']['ID'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sensor['Sensor']['ID']), array('confirm' => __('Are you sure you want to delete # %s?', $sensor['Sensor']['ID']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {

		var data = new google.visualization.DataTable();

		data.addColumn('number', 'ID');
		data.addColumn('number', 'sensor');

		<?php foreach ($sensors as $sensor): ?>
		data.addRows([
			[<?php echo h($sensor['Sensor']['ID']); ?>,<?php echo h($sensor['Sensor']['Value']); ?>]
		]);
		<?php endforeach ?>

		var options = {
			title: 'データグラフ',
			curveType: 'function',
			legend: { position: 'bottom' }
		};

		var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

		chart.draw(data, options);
	}
	</script>
	<div id="curve_chart" style="width: 900px; height: 500px"></div>


	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Sensor'), array('action' => 'add')); ?></li>
	</ul>
</div>
