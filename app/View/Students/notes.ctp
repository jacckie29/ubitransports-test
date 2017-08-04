<h1><?php echo $this->Html->link("Student List",array('controller' => 'students', 'action' => 'index')); ?> <b>//</b> <?php echo $student['Student']['first_name']." ".$student['Student']['last_name'];?> <b>//</b> <?php echo $this->Html->link("Create Note",array('controller' => 'students', 'action' => 'create_note', $student['Student']['id'])); ?></h1>
<table>
    <tr>
        <th>Id</th>
        <th>Note</th>
        <th>Number</th>
    </tr>

    <?php foreach ($studentNotes as $studentNote): ?>
    <tr>
        <td><?php echo $studentNote['StudentNote']['id']; ?></td>
        <td><?php echo $studentNote['StudentNote']['note']; ?></td>
        <td><?php echo $studentNote['StudentNote']['note_number']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>