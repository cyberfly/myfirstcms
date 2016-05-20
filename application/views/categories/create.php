<h2>Add Category</h2>
<!-- Gantikan <form> kepada code di bawah, untuk sekuriti -->
<?php echo form_open('categories/create', 'class="" id="myform"'); ?>

  <div class="form-group">

  	<?php
	    echo form_label('Category Name','category_name');
	    echo form_error('category_name');
	    echo form_input('category_name',set_value('category_name'),'class="form-control"');
    ?>

  </div>
  <div class="form-group">

    	<?php
  	    echo form_label('Category Description','category_description');
  	    echo form_error('category_description');
  	    echo form_textarea('category_description',set_value('category_description'),'class="form-control"');
      ?>

  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
  <a class="btn btn-warning" href="<?php echo site_url('categories/index'); ?>" role="button">Cancel</a>


<!-- femove </form> dan gantikan dengan code di bawah -->
<?php echo form_close(); ?>