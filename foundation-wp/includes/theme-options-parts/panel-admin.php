<h1>Admin Panel</h1>
<hr>

<div class="alert alert-info">
  <p>This table is a list of all current values saved into the theme options. Please use this page to troubleshoot any configurations.
</div>

<section>

  <?php global $theme_options; ?>

  <table class="table table-striped">

  <?php foreach ($theme_options as $option => $value) { ?>
    <tr>
      <td><?php echo $option; ?></td>
      <td><?php echo $value; ?></td>
    </tr>

  <?php } ?>
  
  </table>

  
</section>
