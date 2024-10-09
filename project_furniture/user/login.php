<?php require 'header.php' ?>


<!-- Contact Start -->
<div class="container-xxl contact py-5">
    <div class="container">

        <div class="row g-5">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <h3 class="mb-4">Login Form</h3>
                <p class="mb-4">
                    <a href="register">Not a member yet?? .. Create an Account</a>
                </p>
                <form method="post">
                    <div class="row g-3">

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" placeholder="Your Email" name="email" value="<?php
                                if(isset($_COOKIE['uemail']))
                                { echo $_COOKIE['uemail'];}
                                
                                ?>">
                                <label for="email">Your Email</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="pwd" placeholder="Your Password" name="password"
                                value="<?php
                                if(isset($_COOKIE['upass']))
                                { echo $_COOKIE['upass'];}
                                
                                ?>"
                                
                                >
                                <label for="pass">Your Password</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">

                            <input type="checkbox" name="chk">Remember ME
                            </div>

                        </div>


                        <div class="col-12">
                            <button class="btn btn-primary rounded-pill py-3 px-5" type="submit" name="login">Login</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Contact End -->


<?php require 'footer.php' ?>