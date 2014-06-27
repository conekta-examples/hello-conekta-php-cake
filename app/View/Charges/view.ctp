<h1><?php echo h($charge['Charge']['id']); ?></h1>

<p><small>Status: <?php echo $charge['Charge']['status']; ?></small></p>
<p><small>Amount: <?php echo number_format($charge['Charge']['amount'] / 100.0, 2, ".", ""); ?></small></p>
<p><small>Currency: <?php echo $charge['Charge']['currency']; ?></small></p>
<p><small>Livemode: <?php echo ($charge['Charge']['livemode']) ? 'true' : 'false'; ?></small></p>
<p><small>Cardholder Name: <?php echo $charge['Charge']['card_name']; ?></small></p>
<p><small>Description: <?php echo $charge['Charge']['description']; ?></small></p>

<?php echo $this->Html->link(
    'Back',
    array('controller' => 'charges', 'action' => 'index')
); ?>
