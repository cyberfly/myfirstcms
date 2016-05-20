
<?php if ($this->session->flashdata('success')): ?>

  <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
  
<?php endif ?>

<h2>Manage Posts</h2>

<a class="btn btn-warning" href="<?php echo site_url('posts/create'); ?>" role="button">New Post</a>

<table class="table table-bordered"> 
<thead> 
<tr> 
<th>#</th>
<th>Title</th>
<th>Content</th> 
<th>Category</th> 
<th>Author</th> 
<th>Date Published</th>
<th>Date Updated</th>
<th>Action</th>
</tr> 
</thead> 
<tbody>

<?php foreach ($records as $key => $row) { ?>

<tr> 
<td><?php echo $row->id; ?></td>
<td><?php echo $row->title; ?></td> 
<td><?php echo $row->content; ?></td> 
<td><?php echo $row->category_name; ?></td> 
<td><?php echo $row->username; ?></td> 
<td><?php echo $row->date_published; ?></td> 
<td><?php echo $row->date_updated; ?></td>
<td>
	
<?php echo form_open('posts/delete'); ?>

   <!-- butang edit je ni, ignore semua dah ada :D -->
   <a class="btn btn-primary" href="<?php echo site_url('posts/edit/'.$row->id); ?>" role="button">Edit</a>

  <!-- passkan hidden field untuk DELETE -->

  <?php echo form_hidden('post_id',set_value('post_id',$row->id));?>

  <!-- ini button delete, submit button dengan label DELETE -->
  <button type="submit" class="btn btn-danger">Delete</button>


<?php echo form_close(); ?>

</td> 
</tr>

<?php } ?>

</tbody> 
</table>

<!-- test tabs bootstrap -->

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">...</div>
    <div role="tabpanel" class="tab-pane" id="profile">...</div>
    <div role="tabpanel" class="tab-pane" id="messages">...</div>
    <div role="tabpanel" class="tab-pane" id="settings">...</div>
  </div>

</div>
