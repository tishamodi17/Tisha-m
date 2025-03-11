<?php
include_once('header.php');
?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add IT Course
            <small>Add a new IT course</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">course</a></li>
            <li class="active">Add IT course</li>
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
                <form method="post" action="add_course" >
                  <div class="box-body">
                    <!-- Category Name -->
                    <div class="form-group">
                      <label for="course_name">course Name</label>
                      <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Enter IT course name" required>
                    </div>

                   <div class="form-group">
                      <label>Select Categories</label>
                      <select name="cate_id" class="form-control">
                        <option value="">Select Categories</option>
            <?php 
            foreach($cate_arr as $data)
            {
              ?>
              <option value="<?php echo $data->id?>"><?php echo $data->cate_name?></option>
              <?php
            }
            ?>
                      </select>
                    </div>
                    
                    <!-- Category Description -->
                    <div class="form-group">
                      <label for="course_description">course Description</label>
                      <textarea class="form-control" id="course_description" name="course_description" rows="3" placeholder="Enter a brief description"></textarea>
                    </div>


                    <div class="form-group">
                      <label for="exampleInputFile">Upload course image</label>
                      <input type="file" name="image" id="exampleInputFile">
                    
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
