<?php
include_once('header.php');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            COURSES
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Courses</a></li>
            <li class="active">Manage Courses</li> 
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                     
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>course_name </th>
                                    <th>course_description</th>
                                    <th>Image</th>
                                    <th>cate_name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                    foreach($cour_arr as $data)
                    {
                    ?>
                      <tr>
                        <td><?php echo $data->id?></td>
                        <td><?php echo $data->course_name?></td>
                        <td><?php echo $data->course_description?></td>
                        <td><img src="upload/course/<?php echo $data->image ?>" width="50px">
</td>

                        <td><?php echo $data->cate_id?></td>

                       
                        <td>
                            <a href="edit_course?editbtn=<?php echo $data->id ?>" class="btn btn-primary">Edit</a>
                      <a href="delete?del_course=<?php echo $data->id ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php
                    }
                   ?>   
                                <!-- Additional rows would be generated here -->
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include_once('footer.php');
?>
