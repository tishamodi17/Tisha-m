<?php
include_once('header.php');
?>
<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            INTERVIEW QUESTIONS
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Interview Questions</a></li>
            <li class="active">Manage Interview Questions</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <!-- You can add a button to add new interview questions -->
                       
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>question</th>
                                    <th>answer</th>
                                    <th>course_id</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                  
                                
                                <?php
                    foreach($int_arr as $data)
                    {
                    ?>
                      <tr>
                        <td><?php echo $data->ID?></td>
                        <td><?php echo $data->question?></td>
                        <td><?php echo $data->answer?></td>
                        <td><?php echo $data->course_id?></td>
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
