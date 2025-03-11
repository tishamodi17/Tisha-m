<?php
include_once('header.php');
?>

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Course Video
      <small>Add a new video to a course</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Courses</a></li>
      <li class="active">Add Course Video</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header">
          </div><!-- /.box-header -->

          <!-- form start -->
          <form method="post" action="videos_of_course" enctype="multipart/form-data">
            <div class="box-body">
              <!-- Video Title -->
              <div class="form-group">
                <label for="video_title">Video Title</label>
                <input type="text" class="form-control" id="video_title" name="video_title" placeholder="Enter video title" required>
              </div>

              <!-- Video Description -->
              <div class="form-group">
                <label for="video_description">Video Description</label>
                <textarea class="form-control" id="video_description" name="video_description" rows="3" placeholder="Enter video description"></textarea>
              </div>

              <!-- Course Category -->
              <div class="form-group">
                      <label>Select Course</label>
                      <select name="course_id" class="form-control">
                        <option value="">Select Course</option>
            <?php 
            foreach($course_arr as $data)
            {
              ?>
              <option value="<?php echo $data->id?>"><?php echo $data->course_name?></option>
              <?php
            }
            ?>
                      </select>
                    </div>

              <!-- Video File Upload -->
              <div class="form-group">
                <label for="video_file">Upload Video</label>
                <input type="file" id="video_file" name="video_file" required>
                <p class="help-block">Upload a video file (MP4, AVI, etc.).</p>
              </div>

            </div><!-- /.box-body -->

            <div class="box-footer">
              <input type="submit" name="submit" class="btn btn-primary py-3 px-5" >
            </div>
          </form>
        </div><!-- /.box -->
      </div><!--/.col (left) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php
include_once('footer.php');
?>
