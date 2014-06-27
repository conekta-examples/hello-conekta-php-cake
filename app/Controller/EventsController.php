<?php
class EventsController extends AppController {
	public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index() {
        $this->set('events', $this->Event->find('all'));
    }
    public function process_event() {
		$body = @file_get_contents('php://input');
		$event = json_decode($body);
		$this->Event->create();
		$data = array(
					"id" => $event->id,
					"type" => $event->type,
					"charge_id" => $event->data->object->id,
					"created_at" => date('Y/m/d H:i:s', $event	->created_at)
					);
		$this->Event->save($data);
    }
}
?>
