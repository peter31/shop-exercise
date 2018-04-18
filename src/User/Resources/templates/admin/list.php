<?php
include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/header.php' ?>
<div class="content">
    <a href="/admin/users/add"><b>Add user  through form</b></a>
    <p></p>
    <a href="/admin/users/csv"><b>Add user(s)  through sending CVS file</b></a>
    <p></p>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
            <th>*</th>
            <th>*</th>
        </tr>
<?php foreach ($users as $user) { ?>
        <tr>
            <td align="center"><?php echo $user['id'] ?></td>
            <td><?php echo $user['name'] ?></td>
            <td><?php echo $user['email'] ?></td>
            <td align="center"><?php echo $user['status'] ?></td>
            <td><?php echo $user['created'] ?></td>
            <td><?php echo $user['updated'] ?></td>
            <td><a href="/admin/users/edit?id=<?php echo $user['id'] ?>">Edit</a></td>
            <td><a href="/admin/users/delete_action?id=<?php echo $user['id'] ?>">Delete</a></td>
        </tr>
<?php } ?>
    </table>
</div>
<?php include dirname(__DIR__, 4) . '/Common/Resources/templates/admin/footer.php' ?>