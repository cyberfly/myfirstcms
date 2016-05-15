<h2 class="sub-header">Edit Post</h2>

<!-- success alert and validation error alert -->

<?php if ($this->session->flashdata('success')): ?>

  <div class="alert alert-success" role="alert">
  <?php echo $this->session->flashdata('success'); ?>
  </div>
  
<?php endif ?>

<?php if(validation_errors() != false):  ?>

  <div class="alert alert-error" role="alert">
  Validation Error
  </div>

<?php endif ?>

<!-- start form -->

<?php echo form_open("posts/edit", 'class="" id="myform"'); ?>

  <div class="form-group">
    
    <?php
	    echo form_label('Title','title');
	    echo form_error('title');
	    echo form_input('title',set_value('title',$records->title),'class="form-control"');
    ?>

  </div>
  <div class="form-group">

  	<?php
	    echo form_label('Content','content');
	    echo form_error('content');
	    echo form_textarea('content',set_value('content',$records->content),'class="form-control"');
    ?>

  </div>

  <div class="form-group">

  	<?php
	    
	    echo form_label('Category','category_id');
	    echo form_error('category_id');
	    echo form_dropdown('category_id',array(),set_value('category_id',$records->category_id),'class="form-control"');

    ?>

  </div>

  <?php echo form_hidden('post_id',set_value('post_id',$records->id));?>

  
  <button type="submit" class="btn btn-primary">Submit</button>
  <a class="btn btn-default" href="<?php echo site_url("posts/index"); ?>" role="button">Cancel</a>

<?php echo form_close(); ?>
