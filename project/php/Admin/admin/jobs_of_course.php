<?php
include_once('header.php');
?>

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Course Job Role
      <small>Add a new job role related to a course</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Courses</a></li>
      <li class="active">Add Course Job Role</li>
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
          <form method="post" action="jobs_of_course">
            <div class="box-body">
              <!-- Job Title -->
              <div class="form-group">
                <label for="job_title">Job Title</label>
                <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Enter job title" required>
              </div>

              <!-- Job Description -->
              <div class="form-group">
                <label for="job_description">Job Description</label>
                <textarea class="form-control" id="job_description" name="job_description" rows="3" placeholder="Enter job description"></textarea>
              </div>

              <!-- Course -->
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

            <div class="box-footer">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
