<?php
include_once('header.php');
?>

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Interview Question
      <small>Add a new interview question to a course</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Courses</a></li>
      <li class="active">Add Interview Question</li>
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
        <form method="post" action="" enctype="multipart/form-data">
            <div class="box-body">
              <!-- Question -->
              <div class="form-group">
                <label for="question">Question</label>
                <textarea class="form-control" id="question" name="question" rows="3" placeholder="Enter interview question" required></textarea>
              </div>

              <!-- Answer -->
              <div class="form-group">
                <label for="answer">Answer</label>
                <textarea class="form-control" id="answer" name="answer" rows="5" placeholder="Enter the answer for the question" required></textarea>
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
