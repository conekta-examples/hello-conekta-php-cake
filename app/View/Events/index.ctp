<h1>Events</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Type</th>
        <th>Created At</th>
        <th>Charge Id</th>
    </tr>

    <?php foreach ($events as $event): ?>
    <tr>
		<td><?php echo $event['Event']['id']; ?></td>
        <td><?php echo $event['Event']['type']; ?></td>
        <td><?php echo $event['Event']['created_at']; ?></td>
        <td><?php echo $this->Html->link($event['Event']['charge_id'],
array('controller' => 'charges', 'action' => 'view', $event['Event']['charge_id'])); ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($event); ?>
</table>

<?php echo $this->Html->link(
    'Home',
    array('controller' => 'pages', 'action' => 'display')
); ?>
