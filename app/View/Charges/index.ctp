<h1>Charges</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Status</th>
        <th>Amount</th>
        <th>Currency</th>
        <th>Livemode</th>
        <th>Cardholder Name</th>
        <th>Description</th>
    </tr>

    <?php foreach ($charges as $charge): ?>
    <tr>
        <td><?php echo $this->Html->link($charge['Charge']['id'],
array('controller' => 'charges', 'action' => 'view', $charge['Charge']['id'])); ?></td>
		<td><?php echo $charge['Charge']['status']; ?></td>
        <td><?php echo number_format($charge['Charge']['amount'] / 100.0, 2, ".", ""); ?></td>
        <td><?php echo $charge['Charge']['currency']; ?></td>
        <td><?php echo ($charge['Charge']['livemode']) ? 'true' : 'false'; ?></td>
        <td><?php echo $charge['Charge']['card_name']; ?></td>
        <td><?php echo $charge['Charge']['description']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($charge); ?>
</table>

<?php echo $this->Html->link(
    'Home',
    array('controller' => 'pages', 'action' => 'display')
); ?>
