<h1><?php echo $this->Html->link("Student List",array('controller' => 'students', 'action' => 'index')); ?> <b>//</b> <?php echo $student['Student']['first_name']." ".$student['Student']['last_name'];?> <b>//</b> <?php echo $this->Html->link("Create Note",array('controller' => 'students', 'action' => 'create_note', $student['Student']['id'])); ?></h1>
<?php
echo $this->Form->create('StudentNote');
echo $this->Form->input('note');
echo $this->Form->input('note_number', array('type' => 'number','min' => 0,'max' => 20));
echo $this->Form->input('student_id', array('type' => 'hidden','default'=>$student['Student']['id']));
echo $this->Form->submit('Save Data');
echo $this->Form->button('Cancel', array('type' => 'button','onclick' => "homepage();"));
?>