<?php  require 'header.php'?>


    <!-- Contact Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
           
          
            <div class="row justify-content-center g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h3 class="mb-4">Already a member? </h3>
                    <p class="mb-4"> <a href="login">Please Login</a>.</p>
                    <form  method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  name="name" placeholder="Your Name" id="uname">
                                    <label for="name">Name</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  name="email" placeholder="Your Email" id="uemail">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                           
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  
                                    name="password" placeholder="Your Password" id="upass">
                                    <label for="password" >Password</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control"   name="cpassword" placeholder="Confirm Password" id="ucpass">
                                    <label for="cpass" >Confirm Password</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control"   name="mobile" placeholder="Your Mobile"  id="umobile">
                                    <label for="mobile">Mobile</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control"   name="address" placeholder="Your Address" id="uaddress">
                                    <label for="adrs">Address</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="border py-3 ps-3">
                                <label for="gender">Gender</label>
                                    <input type="radio" name="gender" value="male"> Male
                                    <input type="radio" name="gender" value="female"> Female
                                    
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="border py-3 ps-3">
                                <label for="Lang">Languages</label>
                                    <input type="checkbox" name="chk[]" value="Gujarati"> Gujarati
                                    <input type="checkbox" name="chk[]" value="Hindi"> Hindi
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="file" class="form-control"   name="file" id="uimage" >
                                    <label for="img">Upload Image</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="submit"  name="register" class="btn btn-primary" id="btn">
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
              
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <?php  require 'footer.php'?>