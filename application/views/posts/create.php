<h2 class="sub-header">Create Post</h2>

<!-- success alert and validation error alert -->

<?php if(validation_errors() != false):  ?>

  <div class="alert alert-error" role="alert">
  Validation Error
  </div>

<?php endif ?>

<!-- start form -->

<?php echo form_open('posts/create', 'class="" id="myform"'); ?>

  <div class="form-group">
    
    <?php
	    echo form_label('Title','title');
	    echo form_error('title');
	    echo form_input('title',set_value('title'),'class="form-control"');
    ?>

  </div>
  
  <div class="form-group">

  	<?php
	    echo form_label('Content','content');
	    echo form_error('content');
	    echo form_textarea('content',set_value('content'),'class="form-control"');
    ?>

  </div>

  <div class="form-group">

  	<?php
	    
	    echo form_label('Category','category_id');
	    echo form_error('category_id');
	    echo form_dropdown('category_id',array(),set_value('category_id'),'class="form-control"');

    ?>

  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
  <a class="btn btn-default" href="<?php echo site_url("posts/index"); ?>" role="button">Cancel</a>

<?php echo form_close(); ?>
