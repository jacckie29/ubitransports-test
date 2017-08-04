<?php
App::uses('AppModel', 'Model');

class StudentNote extends AppModel {

	 public $validate = array(
        'note' => array(
            'rule' => 'notBlank'
        ),
        'note_number' => array(
            'rule' => array('range', -1, 21),
			'message' => 'Please enter a number between 0 and 20'
        )
    );
}

?>