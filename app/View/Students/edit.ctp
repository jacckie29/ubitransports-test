<h1><?php echo $this->Html->link("Student List",array('controller' => 'students', 'action' => 'index')); ?> <b>//</b> <?php echo $this->Html->link("Edit",array('controller' => 'students', 'action' => 'edit', $this->request->data['Student']['id'])); ?></h1>
<?php
echo $this->Form->create('Student');
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('date_of_birth', array('minYear' => '1950','maxYear' => date('Y')));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->submit('Update Data');
echo $this->Form->button('Cancel', array('type' => 'button','onclick' => "homepage();"));
?>