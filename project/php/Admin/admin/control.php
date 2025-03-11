<?php


include_once('model.php');   // step 1 load model 


class control extends model  // step 2 extends model class
{


	function __construct()
	{
		session_start();		
		model::__construct();
 
		

		$url=$_SERVER['PATH_INFO'];
		switch ($url) {

			case '/admin-login':
				if(isset($_REQUEST['login']))
				{
					$email=$_REQUEST['email'];
					$password=md5($_REQUEST['password']);
					
					$where=array("email"=>$email,"password"=>$password);
					
					$res=$this->select_where('admin',$where);
					$chk=$res->num_rows; //check row wise condition
					if($chk==1) // 1 true 0 false
					{
						// session
						$fetch=$res->fetch_object();
						
						$_SESSION['adminname']=$fetch->name;
						$_SESSION['adminid']=$fetch->id;
						echo "<script>
							alert('Login suuccessfully');
							window.location='dashboard';
						</script>";
					}
					else
					{
						echo "<script>
							alert('Login failed due to wrong crendential');
							window.location='admin-login';
						</script>";
					}
				}
				include_once('index.php');
			break;
case '/adminlogout':
			
				unset($_SESSION['adminid']);
				unset($_SESSION['adminname']);
				echo "<script>
							alert('Logout Succesfull');
							window.location='admin-login';
						</script>";
				
			break; 
			
	
			case '/dashboard':
				include_once('dashboard.php');
				break;

				case '/add_it_categories':
              if(isset($_REQUEST['submit']))
                {
                    $cate_name=$_REQUEST['cate_name'];
                    
                    echo $cate_img=$_FILES['cate_img']['name'];
    
                    // upload img in folder
                   
					// upload img in folder
					$path='upload/categories/'.$cate_img;     // path
					$dupcate_image=$_FILES['cate_img']['tmp_name'];  // duplicate imag get
					move_uploaded_file($dupcate_image,$path);  // move duplicate img in path
                     
                     $arr=array("cate_name"=>$cate_name,"cate_img"=>$cate_img);
                    
                    $res=$this->insert('manage_it_categories',$arr);
                    if($res)
                    {
                        echo "<script>
                            alert('Categories add suuccessfully');
                            window.location='add_it_categories';
                        </script>";
                    }
                    else
                    {
                        echo "Not success";
                    }
                }
				include_once('add_it_categories.php');
				break;

				
			case '/manage_it_categories':
				$cate_arr=$this->select('manage_it_categories');
				include_once('manage_it_categories.php');
			break;



			case '/edit_it_categories':
				if(isset($_REQUEST['editbtn']))
				{
					$id=$_REQUEST['editbtn'];
					
					$where=array("id"=>$id);
					$res=$this->select_where('manage_it_categories',$where);
					$fetch=$res->fetch_object();
					
					$old_cate_img=$fetch->cate_img;
					
					include_once('edit_it_categories.php');
					
					if(isset($_REQUEST['submit']))
					{
						$cate_name=$_REQUEST['cate_name'];
						
						if($_FILES['cate_img']['size']>0)
						{
						 $cate_img=$_FILES['cate_img']['name'];
							// upload img in folder
							$path='upload/categories/'.$cate_img;     // path
							$dupcate_img=$_FILES['cate_img']['tmp_name'];  // duplicate imag get
							move_uploaded_file($dupcate_img,$path);  // move duplicate img in path
							
							$arr=array("cate_name"=>$cate_name,"cate_img"=>$cate_img);
							unlink('upload/categories/'.$old_cate_img);
						}
						else
						{
							$arr=array("cate_name"=>$cate_name);
						}
						
						$res=$this->update('add_it_categories',$arr,$where);
						if($res)
						{
							echo "<script>
								alert('Categories Update suuccessfully');
								window.location='manage_it_categories';
							</script>";
						}
						else
						{
							echo "Not success";
						}
					}
					
				}
			break;


case '/delete':
				
				if(isset($_REQUEST['del_it_categories']))
				{
					$id=$_REQUEST['del_it_categories'];
					$where=array("id"=>$id);
					
					// image get for delete
					$sel_sel=$this->select_where('manage_it_categories',$where);
					$fetch=$sel_sel->fetch_object();
					$del_img=$fetch->cate_img;
					
					$res=$this->delete_where('manage_it_categories',$where);
					if($res)
					{
						unlink('upload/categories/'.$del_img); // del image
						echo "<script>
							alert('Categories Deleted suuccessfully');
							window.location='manage_it_categories';
						</script>";
					}
				}
				
				
				


				case '/add_course':
               $cate_arr=$this->select('manage_it_categories');

                if(isset($_REQUEST['submit']))
                {
                    $course_name=$_REQUEST['course_name'];
                    $course_description=$_REQUEST['course_description'];
                    $cate_id=$_REQUEST['cate_id'];


                    echo $image=$_FILES['image']['name'];
    
                    // upload img in folder
                   
					// upload img in folder
					$path='upload/course/'.$image;     // path
							$dupcourse_image=$_FILES['image']['tmp_name'];  // duplicate imag get
							move_uploaded_file($dupcourse_img,$path);  //     // path
					$dupcourse_image=$_FILES['image']['tmp_name'];  // duplicate imag get
					move_uploaded_file($dupcourse_image,$path);

                   
                     
                    
                    $arr=array("course_name"=>$course_name,"course_description"=>$course_description,"image"=>$image,"cate_id"=>$cate_id);
                    
                    $res=$this->insert('manage_course',$arr);
                    if($res)
                    {
                        echo "<script>
                            alert(' submited suuccessfully');
                            window.location='add_course';
                        </script>";
                    }
                    else
                    {
                        echo "Not success";
                    }
                }
				include_once('add_course.php');
				break;






				case '/manage_course':
				$cour_arr=$this->select('manage_course');
				include_once('manage_course.php');
				break;




			case '/edit_course':
				if(isset($_REQUEST['editbtn']))
				{
					$id=$_REQUEST['editbtn'];
					
					$where=array("id"=>$id);
					$res=$this->select_where('manage_course',$where);
					$fetch=$res->fetch_object();
					
					$old_image=$fetch->image;
					
					include_once('edit_course.php');
					
					if(isset($_REQUEST['submit']))
					{
						$course_name=$_REQUEST['course_name'];
						
						if($_FILES['image']['size']>0)
						{
						 $path='upload/categories/'.$image;     // path
							$dupcourse_image=$_FILES['image']['tmp_name'];  // duplicate imag get
							move_uploaded_file($dupcourse_img,$path);  //     // path
					$dupcourse_image=$_FILES['image']['tmp_name'];  // duplicate imag get
					move_uploaded_file($dupcourse_image,$path); 

							$arr=array("course_name"=>$course_name,"image"=>$v);
							unlink('upload/categories/'.$old_image);
						}
						else
						{
							$arr=array("course_name"=>$course_name);
						}
						
						$res=$this->update('add_course',$arr,$where);
						if($res)
						{
							echo "<script>
								alert('Categories Update suuccessfully');
								window.location='manage_course';
							</script>";
						}
						else
						{
							echo "Not success";
						}
					}
					
				}
			break;


case '/delete':
				
				if(isset($_REQUEST['del_course']))
				{
					$id=$_REQUEST['del_course'];
					$where=array("id"=>$id);
					
					// image get for delete
					$sel_sel=$this->select_where('manage_course',$where);
					$fetch=$sel_sel->fetch_object();
					$del_img=$fetch->image;
					
					$res=$this->delete_where('manage_course',$where);
					if($res)
					{
						unlink('upload/categories/'.$del_image); // del image
						echo "<script>
							alert('course Deleted suuccessfully');
							window.location='manage_course';
						</script>";
					}
				}
				
				


				case '/add_content_course':

 $course_arr=$this->select('manage_course');

                if(isset($_REQUEST['submit']))
                {
                    $course_title=$_REQUEST['course_title'];
                    $course_description=$_REQUEST['course_description'];
                     $course_id=$_REQUEST['course_id'];
                      $course_file=$_REQUEST['course_file'];
                   
                     
                    
                    $arr=array("course_title"=>$course_title,"course_description"=>$course_description,"course_id"=>$course_id,"course_file"=>$course_file);
                    
                    $res=$this->insert('manage_content_course',$arr);
                    if($res)
                    {
                        echo "<script>
                            alert(' submited suuccessfully');
                            window.location='manage_content_course';
                        </script>";
                    }
                    else
                    {
                        echo "Not success";
                    }
                }
				include_once('add_content_course.php');
				break;

				case '/manage_content_course':
				$conte_arr=$this->select('manage_content_course');
				include_once('manage_content_course.php');
				break;

				case '/videos_of_course':
				$course_arr=$this->select('manage_course');

                if(isset($_REQUEST['submit']))
                {
                    $video_title=$_REQUEST['video_title'];
                    $video_description=$_REQUEST['video_description'];
                    $course_id=$_REQUEST['course_id'];
                    
                
                    echo $video_file=$_FILES['img']['name'];
    
                    // upload img in folder
                    $path='Files/Admin/'.$course_img;     // path
                    $dupvideo_file=$_FILES['file']['tmp_name'];  // duplicate imag get
                    move_uploaded_file($dupvideo_file,$path);  // move duplicate img in path
                    
                    
                    $arr=array("video_title"=>$video_title,"video_description"=>$video_description,"course_id"=>$course_id,"video_file"=>$video_file);
                    
                    $res=$this->insert('manage_videos_course',$arr);
                    if($res)
                    {
                        echo "<script>
                            alert('Course add suuccessfully');
                            window.location='manage_videos_course';
                        </script>";
                    }
                    else
                    {
                        echo "Not success";
                    }
                }
				include_once('videos_of_course.php');
				break;

				case '/manage_videos_course':
                $vid_arr=$this->select('manage_videos_course');
				include_once('manage_videos_course.php');
				break;

				case '/Interview_Que_of_course':
				$course_arr=$this->select('manage_course');
                if(isset($_REQUEST['submit']))
                {
                    $question=$_REQUEST['question'];
                    $answer=$_REQUEST['answer'];
                     $course_id=$_REQUEST['course_id'];
                      
                   
                     
                    
                    $arr=array("question"=>$question,"answer"=>$answer,"course_id"=>$course_id);
                    
                    $res=$this->insert('Interview_Que_of_course',$arr);
                    if($res)
                    {
                        echo "<script>
                            alert(' submited suuccessfully');
                            window.location='Interview_Que_of_course';
                        </script>";
                    }
                    else
                    {
                        echo "Not success";
                    }
                }
				include_once('Interview_Que_of_course.php');
				break;


				case 'manage_Interview_Que_of_course':
                $int_arr=$this->select('manage_Interview_Que_of_course');
				include_once('manage_Interview_Que_of_course.php');
				break;
			

				case '/jobs_of_course':
				$course_arr=$this->select('manage_course');
				if(isset($_REQUEST['submit']))
				{
					$job_title=$_REQUEST['job_title'];
					$job_description=$_REQUEST['job_description'];
					$course_id=$_REQUEST['course_id'];
					
					$arr=array("job_title"=>$job_title,"job_description"=>$job_description,"course_id"=>$course_id);
					
					$res=$this->insert('manage_jobs_of_course',$arr);
					if($res)
					{
						echo "<script>
							alert(' submited suuccessfully');
							window.location='manage_jobs_of_course';
						</script>";
					}
					else
					{
						echo "Not success";
					}
				}

				include_once('jobs_of_course.php');
				break;

				case '/manage_jobs_of_course':
				$jobs_arr=$this->select('manage_jobs_of_course');
				
				include_once('manage_jobs_of_course.php');
				break;



				case '/manage_customer':
				$cust_arr=$this->select('manage_customer');
				include_once('manage_customer.php');
			break;

				case '/manage_contact_us':
				$cont_arr=$this->select('manage_contact_us');
				include_once('manage_contact_us.php');
			break;

				
			default:
			echo "page not found";
		 break;
		}
	}
}
$obj=new control;

?>