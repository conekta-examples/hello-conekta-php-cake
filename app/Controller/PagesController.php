<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * This controller does not use a model
 *
 * @var array
 */
	var $uses = array('Charge');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}
	
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function process_payment() {
		Conekta::setApiKey("1tv5yJp3xnVZ7eK67m4h");
		try {
			if($_POST['isSubscription']) {
				$customer = Conekta_Customer::create(array(
						'cards' => array($_POST['conektaTokenId'])));
				try {  
					$plan = Conekta_Plan::find($_POST['planId']); 
				} catch (Exception $e) {	
					$plan = Conekta_Plan::create(array(
						'id' => $_POST['planId'],
						'name' => $_POST['productDescription'],
						'amount' => number_format($_POST['productPrice'] * 100, 0, ".", ""),
						'currency' => "MXN",
						'interval' => "month",
						'trial_period_days' => 15,
						'expiry_count' => 12
						)
					);					
				}
				$subscription = $customer->createSubscription(array(
				'plan' => $_POST['planId']
				));
				return $this->redirect(array('controller' => 'charges','action' => 'index'));
			} else {
				$charge = Conekta_Charge::create(array('amount' => number_format($_POST['productPrice'] * 100, 0, ".", ""),
				'currency' => 'mxn', 'description' => $_POST['productDescription'],
				'card'=>$_POST['conektaTokenId']
				));
			}
			$this->Charge->create();
			$data = array(
					"id" => $charge->id,
					"amount" => $charge->amount,
					"livemode" => $charge->livemode,
					"created_at" => date('Y/m/d H:i:s', $charge->created_at),
					"status" => $charge->status,
					"currency" => $charge->currency,
					"description" => $charge->description,
					"reference_id" => $charge->reference_id,
					"failure_code" => $charge->failure_code,
					"failure_message" => $charge->failure_message,
					"card_name"=> $charge->payment_method->name,
					"card_exp_month"=> $charge->payment_method->exp_month,
					"card_exp_year"=> $charge->payment_method->exp_year,
					"card_auth_code"=> $charge->payment_method->auth_code,
					"card_last4"=> $charge->payment_method->last4,
					"card_brand"=> $charge->payment_method->brand
				);
			if ($this->Charge->save($data)) {
				return $this->redirect(array('controller' => 'charges','action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to create your charge.'));
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
}
