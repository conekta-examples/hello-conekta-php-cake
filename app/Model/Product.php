<?php
class Product extends AppModel {
	public $validate = array(
        'price' => array(
            'rule' => 'notEmpty'
        ),
        'name' => array(
            'rule' => 'notEmpty'
        )
    );
}
?>
