<?php include dirname(__DIR__) . '/header.php' ?>
<p><a href='/admin/users/add'>Add user  through form</a></p>
<p><a href='/admin/users/csv'>Add user(s)  through sending CVS file</a></p>
<table border='1'>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($users as $user) { ?>
    <tr>
        <td><?php echo $user['id'] ?></td>
        <td><?php echo $user['name'] ?></td>
        <td><?php echo $user['email'] ?></td>
        <td><?php echo $user['status'] ?></td>
        <td><?php echo $user['created'] ?></td>
        <td><?php echo $user['updated'] ?></td>
        <td><form  action='/admin/users/edit' method='POST'><input type="submit" name='Action' value='Edit'></form></td>
        <td><form  action='/admin/users/delete' method='POST'><input type="submit" name='Action' value='Delete'></form></td>
    </tr>

<?php } ?>
</table>
<?php include dirname(__DIR__) . '/footer.php' ?>