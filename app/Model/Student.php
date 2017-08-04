<?php
App::uses('AppModel', 'Model');

class Student extends AppModel {

	 public $validate = array(
        'first_name' => array(
            'rule' => 'notBlank'
        ),
        'last_name' => array(
            'rule' => 'notBlank'
        )
    );
}

?>