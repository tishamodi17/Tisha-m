<?php
include_once('header.php');
?>

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Course Content
      <small>Add new course content</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Courses</a></li>
      <li class="active">Add Course Content</li>
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
         <form method="post" action="add_content_course" enctype="multipart/form-data">
            <div class="box-body">
              <!-- Course Title -->
              <div class="form-group">
                <label for="course_title">Course Title</label>
                <input type="text" class="form-control" id="course_title" name="course_title" placeholder="Enter course title" required>
              </div>

              <!-- Course Description -->
              <div class="form-group">
                <label for="course_description">Course Description</label>
                <textarea class="form-control" id="course_description" name="course_description" rows="3" placeholder="Enter course description" required></textarea>
              </div>

              <!-- Course Duration -->
              <div class="form-group">
                <label for="course_duration">Course Duration (hours)</label>
                <input type="number" class="form-control" id="course_duration" name="course_duration" placeholder="Enter course duration in hours" required>
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

              <!-- Course Content File (optional) -->
              <div class="form-group">
                <label for="course_file">Upload Course File</label>
                <input type="file" id="course_file" name="course_file">
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
