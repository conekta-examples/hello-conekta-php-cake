<?php
class ChargesController extends AppController {
	public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index() {
        $this->set('charges', $this->Charge->find('all'));
    }
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid charge'));
        }

        $charge = $this->Charge->findById($id);
        if (!$charge) {
            throw new NotFoundException(__('Invalid charge'));
        }
        $this->set('charge', $charge);
    }
}
?>
