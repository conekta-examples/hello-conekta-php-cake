<?php
class WebhooksController extends AppController {
	public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index() {
        $this->set('webhooks', $this->Webhook->find('all'));
    }
    public function process_webhook() {
		$body = @file_get_contents('php://input');
		$webhook = json_decode($body);
		$this->Webhook->create();
		$data = array(
					"id" => $webhook->id,
					"type" => $webhook->type,
					"charge_id" => $webhook->data->object->id,
					"created_at" => date('Y/m/d H:i:s', $webhook->created_at)
					);
		$this->Webhook->save($data);
    }
}
?>
