
<?php if ($this->session->flashdata('success')): ?>

  <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
  
<?php endif ?>

<h2>Manage Categories</h2>

<a class="btn btn-warning" href="<?php echo site_url('categories/create'); ?>" role="button">New Post</a>

<table class="table table-bordered"> 
<thead> 
<tr> 
<th>#</th>
<th>Category Name</th>
<th>Category Description</th> 
<th>Action</th>
</tr> 
</thead> 
<tbody>

<?php foreach ($records as $key => $row) { ?>

<tr> 
<td><?php echo $row->id; ?></td>
<td><?php echo $row->category_name; ?></td> 
<td><?php echo $row->category_description; ?></td> 
<td>
	
<?php echo form_open('categories/delete'); ?>

   <!-- butang edit je ni, ignore semua dah ada :D -->
   <a class="btn btn-primary" href="<?php echo site_url('categories/edit/'.$row->id); ?>" role="button">Edit</a>

  <!-- passkan hidden field untuk DELETE -->

  <?php echo form_hidden('category_id',set_value('category_id',$row->id));?>

  <!-- ini button delete, submit button dengan label DELETE -->
  <button type="submit" class="btn btn-danger">Delete</button>


<?php echo form_close(); ?>

</td> 
</tr>

<?php } ?>

</tbody> 
</table>