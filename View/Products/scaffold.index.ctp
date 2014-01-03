<h1>products</h1>
<table>
    <tr>
		<th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Buy One Unit!</th>
    </tr>

    <?php foreach ($products as $product): ?>
    <tr>
        <td><?php echo $this->Html->link($product['Product']['id'],
array('controller' => 'products', 'action' => 'view', $product['Product']['id'])); ?></td>
		<td><?php echo $product['Product']['name']; ?></td>
        <td><?php echo '$'.number_format($product['Product']['price'], 2); ?></td>
        <td><?php echo $product['Product']['description']; ?></td>
        <td><form action="/pages/order" method="POST"> 
		  <span class="card-errors"></span>
		  <div class="form-row">
			<input type="hidden" name="price" value="<?php echo number_format($product['Product']['price'],2); ?>" />
			<input type="hidden" name="description" value="<?php echo $product['Product']['description']; ?>" />
			<input type="hidden" name="is_subscription" value="<?php echo $product['Product']['is_subscription']; ?>" />
			<input type="hidden" name="plan_id" value="<?php echo str_replace(" ", "-", $product['Product']['name'].$product['Product']['id']); ?>" />
			<button type="submit"><?php echo ($product['Product']['is_subscription'] ?  "Subscribe" : "Buy now"); ?></button>
		  </div>
		</form></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($product); ?>
</table>

<?php echo $this->Html->link(
    'Create a Product',
    array('controller' => 'products', 'action' => 'add')
);
 echo "<br/>";
 echo $this->Html->link(
    'Home',
    array('controller' => 'pages', 'action' => 'display')
); ?>
