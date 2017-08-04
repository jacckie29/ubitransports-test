<h1><?php echo $this->Html->link("Student List",array('controller' => 'students', 'action' => 'index')); ?> <b>//</b> <?php echo $this->Html->link("Create",array('controller' => 'students', 'action' => 'create')); ?></h1>
<table>
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Action</th>
    </tr>

    <?php foreach ($students as $student): ?>
    <tr>
        <td><?php echo $student['Student']['id']; ?></td>
        <td><?php echo $student['Student']['first_name']; ?></td>
        <td><?php echo $student['Student']['last_name']; ?></td>
        <td><?php echo $student['Student']['date_of_birth']; ?></td>
		<td>	
            <?php echo $this->Html->link("Edit",array('controller' => 'students', 'action' => 'edit', $student['Student']['id'])); ?>
			&nbsp;&nbsp;&nbsp;
            <?php echo $this->Html->link("Delete",array('controller' => 'students', 'action' => 'delete', $student['Student']['id']), array('onclick'=>'return confirm("Sure you wanna delete?")')); ?>
			&nbsp;&nbsp;&nbsp;
			<?php echo $this->Html->link("Add Notes",array('controller' => 'students', 'action' => 'notes', $student['Student']['id'])); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>