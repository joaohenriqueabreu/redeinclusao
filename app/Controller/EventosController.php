<?php
/*
 * Controller/EventsController.php
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */

class EventosController extends AppController {

    function index() {
		$this->Evento->recursive = 1;
		$this->set('events', $this->paginate());
	}

	public function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid event', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('event', $this->Evento->read(null, $id));
	}

	public function add() {
		if (!empty($this->data)) {
			$this->Evento->create();
			if ($this->Evento->save($this->data)) {
				$this->Session->setFlash(__('The event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.', true));
			}
		}
		$this->set('eventTypes', $this->Evento->EventosTipo->find('list'));
	}

	public function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid event', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Evento->save($this->data)) {
				$this->Session->setFlash(__('The event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Event->read(null, $id);
		}
		$this->set('eventTypes', $this->Event->EventosTipo->find('list'));
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for event', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Evento->delete($id)) {
			$this->Session->setFlash(__('Event deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Event was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

        // The feed action is called from "webroot/js/ready.js" to get the list of events (JSON)
	public function feed($id=null) {
		$this->layout = "jquery";
		$vars = $this->params['url'];
		$conditions = array('conditions' => array('UNIX_TIMESTAMP(start) >=' => $vars['start'], 'UNIX_TIMESTAMP(start) <=' => $vars['end']));
		$events = $this->Evento->find('all', $conditions);
        $data = array();
		foreach($events as $event) {
			if($event['Evento']['all_day'] == 1) {
				$allday = true;
				$end = $event['Evento']['start'];
			} else {
				$allday = false;
				$end = $event['Evento']['end'];
			}
			$data[] = array(
					'id' => $event['Evento']['id'],
					'title'=>$event['Evento']['title'],
					'start'=>$event['Evento']['start'],
					'end' => $end,
					'allDay' => $allday,
					'url' => Router::url('/') . 'full_calendar/events/view/'.$event['Evento']['id'],
					'details' => $event['Evento']['details'],
					'className' => $event['EventosTipo']['color']
			);
		}
		$this->set("json", json_encode($data));
	}

        // The update action is called from "webroot/js/ready.js" to update date/time when an event is dragged or resized
	public function update() {
		$vars = $this->params['url'];
		$this->Evento->id = $vars['id'];
		$this->Evento->saveField('start', $vars['start']);
		$this->Evento->saveField('end', $vars['end']);
		$this->Evento->saveField('all_day', $vars['allday']);
	}

}
?>
