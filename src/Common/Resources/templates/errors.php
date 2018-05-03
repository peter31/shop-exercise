<div>
  <?php if (array_key_exists('saved_errors', $_SESSION)): ?>
      <?php $errors = $_SESSION['saved_errors']; ?>
      <?php unset($_SESSION['saved_errors']); ?>
  <?php endif; ?>

  <?php if (isset($errors)) { ?>
      <?php foreach ($errors as $error) { ?>
          <p style="color: #C1272D;"><?php echo $error ?></p>
      <?php } ?>
  <?php } ?>
</div>
