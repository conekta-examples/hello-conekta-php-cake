<h1><?php echo h($charge['Charge']['id']); ?></h1>

<p><small>Amount: <?php echo $charge['Charge']['amount']; ?></small></p>
<p><small>Status: <?php echo $charge['Charge']['status']; ?></small></p>
<p><small>Amount: <?php echo $charge['Charge']['amount']; ?></small></p>
<p><small>Currency: <?php echo $charge['Charge']['currency']; ?></small></p>
<p><small>Livemode: <?php echo ($charge['Charge']['livemode']) ? 'true' : 'false'; ?></small></p>
<p><small>Cardholder Name: <?php echo $charge['Charge']['card_name']; ?></small></p>
<p><small>Description: <?php echo $charge['Charge']['description']; ?></small></p>

<?php echo $this->Html->link(
    'Back',
    array('controller' => 'charges', 'action' => 'index')
); ?>
