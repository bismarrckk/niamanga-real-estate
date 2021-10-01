<?php include"header-input.php";?>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Change Password</h3></div>
                                    <div class="card-body">
                                        <?php if(isset($_GET['mismatch'])){?>
                                        <div class="alert alert-danger" style="text-align:left">
                                            Error! Passwords do not match,Please try again.
                                        </div>
                                        <?php } ?>
                                        <?php if(isset($_GET['err'])){?>
                                        <div class="alert alert-danger" style="text-align:left">
                                            Error!! Please try again.
                                        </div>
                                        <?php } ?>
                                         <?php if(isset($_GET['err-old'])){?>
                                            <div class="alert alert-danger" style="text-align:left">
                                                Old password is incorrect!!
                                            </div>
                                         <?php } ?>
                                        <form action="process_data.php" method="POST"> 
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Old Password</label>
                                                        <input class="form-control py-4" name="oldpassword" type="oldpassword" placeholder="Enter old password" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">New Password</label>
                                                        <input class="form-control py-4" name="password" type="password" placeholder="Enter password" required/>
                                                    </div>
                                                
                                               
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                        <input class="form-control py-4" name="password2" type="password" placeholder="Confirm password" required/>
                                                    </div>
                                                
                                            <div align="center">
                                           <button type="submit" class="btn btn-dark mb-2" name="password_change"><i class="fa fa-save"></i> Update</button>
                                            <a href="index.php" class="btn btn-dark mb-2" ><i class="fa fa-backward"></i> Back</i></a>
                                        </div>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
               
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
