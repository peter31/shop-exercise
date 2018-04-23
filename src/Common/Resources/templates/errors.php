<?php if (array_key_exists('saved_errors', $_SESSION)): ?>
    <?php $errors = $_SESSION['saved_errors']; ?>
    <?php unset($_SESSION['saved_errors']); ?>
<?php endif; ?>

<?php if (!empty($errors)) { ?>
    <?php foreach ($errors as $error) { ?>
        <span style="color: #C1272D;"><?php echo $error ?></span>
    <?php } ?>
<?php } ?>