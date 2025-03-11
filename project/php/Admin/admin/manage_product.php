<?php
include_once('header.php');
?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
       
           User Authentication form
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Product</a></li>
            <li class="active">Add Product</li>
          </ol>
        </section>
<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <!-- form start -->
                
<h2 id="forum">Forum Module</h2>
    <form action="add-forum-post.php" method="post">
        <label for="post-title">Post Title:</label>
        <input type="text" id="post-title" name="post-title" required>
        
        <label for="post-content">Content:</label>
        <textarea id="post-content" name="post-content" required></textarea>
        
        <button type="submit">Add Post</button>
    </form>
    
	
	</div>
	</div>
	</div>
	
	</section>
	</div>
	<?php
	  include_once('footer.php');
	  ?>