<h2 class="sub-header"><?php echo $records->title; ?></h2>

<form>

  <div class="form-group">

    <?php echo $records->content; ?>

  </div>

  <div class="form-group">

    <?php echo $records->category_name; ?>

  </div>
  
  <a class="btn btn-primary" href="<?php echo site_url("posts/edit/$records->id"); ?>" role="button">Edit</a>
  <a class="btn btn-default" href="<?php echo site_url("posts/index"); ?>" role="button">Go Back</a>

</form>
