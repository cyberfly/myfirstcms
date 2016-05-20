<?php if ($this->session->flashdata('success')): ?>

  <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
  
<?php endif ?>

<h2>Edit Post</h2>
<!-- Gantikan <form> kepada code di bawah, untuk sekuriti -->
<?php echo form_open('posts/edit', 'class="" id="myform"'); ?>

  <?php echo form_hidden('post_id',set_value('post_id',$records->id));?>

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
  	    echo form_textarea('content',set_value('content',$records->content),'class="form-control" id="editor"');
      ?>

  </div>
  <div class="form-group">

    	<?php
  	    
  	    echo form_label('Category','category_id');
  	    echo form_error('category_id');
  	    echo form_dropdown('category_id',$category_records,set_value('category_id',$records->category_id),'class="form-control"');

      ?>

  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
  <a class="btn btn-warning" href="<?php echo site_url('posts/index'); ?>" role="button">Cancel</a>

<!-- femove </form> dan gantikan dengan code di bawah -->
<?php echo form_close(); ?>