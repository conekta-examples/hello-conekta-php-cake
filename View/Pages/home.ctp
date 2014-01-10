<?php
	echo $this->Html->link(
    'Charges',
    array('controller' => 'charges', 'action' => 'index')
	);
	echo "<br/>";
	echo $this->Html->link(
    'Products',
    array('controller' => 'products', 'action' => 'index')
	); 
	echo "<br/>";
	echo $this->Html->link(
    'Notifications',
    array('controller' => 'events', 'action' => 'index')
	);
?>
