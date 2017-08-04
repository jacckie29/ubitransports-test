<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
class StudentsController extends AppController {

	public $helpers = array('Html', 'Form','Flash');
	public $components = array('Flash');
	public $uses = array('StudentNote','Student');
	 
	 
	public function index()
	{
		$students = $this->Student->find('all');
		$this->set('students', $students);
	}
	
	public function create()
	{
		if ($this->request->is('post')) {
            $this->Student->create();
            if ($this->Student->save($this->request->data)) {
                $this->Flash->success(__('Your data has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to add data.'));
        }
	}
	
	public function edit($id = null) 
	{
		$student = $this->Student->findById($id);
		if (!$student) {
			$this->Flash->error('The said Student data not found');
			return $this->redirect(array('action' => 'index'));
		}

		if ($this->request->is(array('post','put'))) {
			$this->Student->id = $id;
			if ($this->Student->save($this->request->data)) {
				$this->Flash->success('Your data has been updated.');
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error('Unable to update your data.');
		}
		else {
			$this->request->data = $student;
		}
	}
	
	public function delete($id) 
	{
		if ($this->Student->delete($id)) {
			$this->Flash->success('The Student data is deleted');
		} else {
			$this->Flash->error('The said Student data not found');
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function notes($id)
	{
		$student = $this->Student->findById($id);
		$studentNotes = $this->StudentNote->find('all',array('conditions' => array('student_id'=>$id)));
		if (!$student) {
			$this->Flash->error('The said Student data not found');
			return $this->redirect(array('action' => 'index'));
		}
		
		$this->set('student', $student);
		$this->set('studentNotes', $studentNotes);
	}
	
	public function create_note($id)
	{
		$student = $this->Student->findById($id);
		if (!$student) {
			$this->Flash->error('The said Student data not found');
			return $this->redirect(array('action' => 'index'));
		}
		$this->set('student', $student);
		if ($this->request->is('post')) {
            $this->StudentNote->create();
            if ($this->StudentNote->save($this->request->data)) {
                $this->Flash->success(__('Your data has been saved.'));
                return $this->redirect(array('action' => 'notes',$this->request->data['StudentNote']['student_id']));
            }
            $this->Flash->error(__('Unable to add data.'));
			
        }
		
	}
}
