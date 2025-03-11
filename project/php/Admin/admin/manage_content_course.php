<?php
include_once('header.php');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            COURSE CONTENT
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Content</a></li>
            <li class="active">Manage Course Content</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                       
                        
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>course_title</th>
                                    <th>course_description</th>
                                    <th>course_name</th>
                                    <th>course_file</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                 
                                <?php
                    foreach($conte_arr as $data)
                    {
                    ?>
                      <tr>
                        <td><?php echo $data->ID?></td>
                        <td><?php echo $data->course_title?></td>
                        <td><?php echo $data->course_description?></td>
                        <td><?php echo $data->course_id?></td>
                        <td><img src="File/Admin/<?php echo $data->course_file?>" width="50px"/></td>
                        <td>
                                        <a href="" class="btn btn-primary">Edit</a>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                  <?php
                    }
                   ?>   

                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include_once('footer.php');
?>