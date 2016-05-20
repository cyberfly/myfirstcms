        <div class="col-sm-8 blog-main">

          
        <?php foreach ($post_records as $key => $row) { ?>

          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row->title; ?></h2>
            <p class="blog-post-meta"><?php echo $row->date_published; ?> by <a href="#">Mark</a></p>

            <?php echo $row->content; ?>

          </div><!-- /.blog-post -->

        <?php } ?>

          <nav>
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </nav>

        </div><!-- /.blog-main -->