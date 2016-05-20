

<?php if(validation_errors() != false):  ?>

  <div class="alert alert-danger" role="alert">
  Validation Error. Please correct the value before proceed.
  </div>

<?php endif ?>


<h2>Add Post</h2>
<!-- Gantikan <form> kepada code di bawah, untuk sekuriti -->
<?php echo form_open('posts/create', 'class="" id="myform"'); ?>

  <div class="form-group">

  	<?php
	    echo form_label('Title','title');
	    echo form_error('title', '<p class="text-danger">', '</p>');
	    echo form_input('title',set_value('title'),'class="form-control"');
    ?>

  </div>
  <div class="form-group">

    	<?php
  	    echo form_label('Content','content');
  	    echo form_error('content');
  	    echo form_textarea('content',set_value('content'),'class="form-control" id="editor"');
      ?>

  </div>
  <div class="form-group">

    	<?php
  	    
  	    echo form_label('Category','category_id');
  	    echo form_error('category_id');
  	    echo form_dropdown('category_id',$category_records,set_value('category_id'),'class="form-control"');

      ?>

  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
  <a class="btn btn-warning" href="<?php echo site_url('posts/index'); ?>" role="button">Cancel</a>


<!-- femove </form> dan gantikan dengan code di bawah -->
<?php echo form_close(); ?>