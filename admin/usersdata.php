<?php
require 'dbconfig.php';
$sql = "SELECT * FROM counter ";
$result = mysqli_query($conn, $sql);
$users = array();
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>DID</th>
            <th>USER</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['did'];?></td>
            <td><?php echo $user['username']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>