<?php
  include_once('header.php');
?>


    <!-- Header Start -->
    <div class="container-fluid page-header" style="margin-bottom: 90px;">
        <div class="container">
            <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
                <h3 class="display-4 text-white text-uppercase">Contact</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Contact</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Contact</h5>
                <h1>Contact For Any Query</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-secondary rounded p-5">
                       
                        <form method="post" >
                            <div class="control-group">
                                <input type="text" name="name" class="form-control border-0 p-4" id="name" placeholder="Your Name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" name="email" class="form-control border-0 p-4" id="email" placeholder="Your Email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="number" name="mobile" class="form-control border-0 p-4" id="subject" placeholder="Mobile" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control border-0 py-3 px-4" name="comment" rows="5" id="message" placeholder="Message" ></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center">
                                <input type="submit" name="submit" class="btn btn-primary py-3 px-5" value="Send Message">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


   <?php
  include_once('footer.php');
  ?>