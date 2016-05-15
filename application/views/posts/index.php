<h2 class="sub-header">Posts List</h2>

<?php if ($this->session->flashdata('success')): ?>

  <div class="alert alert-success" role="alert">
  <?php echo $this->session->flashdata('success'); ?>
  </div>
  
<?php endif ?>

<a class="btn btn-warning btn-lg" href="<?php echo site_url("posts/create"); ?>" role="button">New Post</a>


<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Title</th>
      <th>Content</th>
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
      <td><?php echo $row->user_id; ?></td>
      <td><?php echo $row->date_published; ?></td>
      <td><?php echo $row->date_updated; ?></td>
      <td>

      <?php echo form_open('posts/delete'); ?>

      <?php echo form_hidden('post_id', $row->id); ?>
        
      <a class="btn btn-default" href="<?php echo site_url("posts/show/$row->id"); ?>" role="button">Show</a>
      <a class="btn btn-primary" href="<?php echo site_url("posts/edit/$row->id"); ?>" role="button">Edit</a>

      <button type="submit" class="btn btn-danger delete">Delete</button>

      <?php echo form_close(); ?>

      </td>
    </tr>

    <?php } ?>
    
  </tbody>
</table>
