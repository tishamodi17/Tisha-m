<?php
include_once('header.php');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            COURSE VIDEOS
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Videos</a></li>
            <li class="active">Manage Course Videos</li>
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
                                    <th>video_title</th>
                                    <th>video_description</th>
                                    <th>course_id</th>
                                    <th>video_file</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                
                                <?php
                    foreach($vid_arr as $data)
                    {
                    ?>
                      <tr>
                        <td><?php echo $data->ID?></td>
                        <td><?php echo $data->video_title?></td>
                        <td><?php echo $data->video_description?></td>
                        <td><?php echo $data->course_id?></td>
                        <td><img src="upload/img/<?php echo $data->video_file ?>" width="50px">
</td>
                    <td> 
                      <a href="delete?del_Categories=<?php echo $data->cate_id ?>" class="btn btn-danger">Delete</a>
                      <a href="edit_Categories?editbtn=<?php echo $data->cate_id ?>" class="btn btn-primary">Edit</a>
                        </td>
                        
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
