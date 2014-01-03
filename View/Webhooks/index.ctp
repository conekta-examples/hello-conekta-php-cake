<h1>Webhooks</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Type</th>
        <th>Created At</th>
        <th>Charge Id</th>
    </tr>

    <?php foreach ($webhooks as $webhook): ?>
    <tr>
		<td><?php echo $webhook['Webhook']['id']; ?></td>
        <td><?php echo $webhook['Webhook']['type']; ?></td>
        <td><?php echo $webhook['Webhook']['created_at']; ?></td>
        <td><?php echo $this->Html->link($webhook['Webhook']['charge_id'],
array('controller' => 'charges', 'action' => 'view', $webhook['Webhook']['charge_id'])); ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($webhook); ?>
</table>

<?php echo $this->Html->link(
    'Home',
    array('controller' => 'pages', 'action' => 'display')
); ?>
