
<?php if ($correct != 1): ?>
    <?php foreach($message as $value): ?>
          <p class="bg-danger">
                <?php echo $value; ?>
          </p>
    <?php endforeach; ?>
<?php elseif ($correct === 1): ?>
    <?php foreach($message as $value): ?>
          <p class="bg-success">
                <?php echo $value; ?>
          </p>
    <?php endforeach; ?>
<?php endif; ?>
