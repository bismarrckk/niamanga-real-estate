<?php include"header-input.php";?>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content" >
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create a New User</h3></div>
                                    <div class="card-body">
                                        <?php if(isset($_GET['mismatch'])){?>
                                        <div class="alert alert-danger" style="text-align:left">
                                            Error! Passwords do not match,Please try again.
                                        </div>
                                        <?php } ?>
                                        <?php if(isset($_GET['exists'])){?>
                                        <div class="alert alert-danger" style="text-align:left">
                                            Account already exists!
                                        </div>
                                        <?php } ?>
                                        <form action="process_data.php" method="POST">
                                           
                                            
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Fullname</label>
                                                        <input class="form-control py-4" name="name" type="text" placeholder="Enter fullname" required/>
                                                    </div>
                                                
                                                 <div class="form-row">
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Phone Number</label>
                                                        <input class="form-control py-4" type="number"  name="phone" placeholder="Enter phone number " required/>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Email Address</label>
                                                        <input class="form-control py-4" type="email"  name="email" placeholder="Enter Email Address " required/>
                                                    </div>
                                                </div>

                                            </div>
                                             <div class="form-row">
                                             <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Role</label>
                                                       <select name="role" required="" class="form-control">
                                                           <option value="">---select---</option>
                                                           <option value="Agent">Agent </option>
                                                           <option value="Admin"> Admin</option>                                                         
                                                          
                                                       </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control py-4" name="password" type="password" placeholder="Enter password" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                        <input class="form-control py-4" name="password2" type="password" placeholder="Confirm password" required/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div align="center">
                                           <button type="submit" class="btn btn-dark mb-2" name="user_details"><i class="fa fa-save"></i> Create User</button>
                                            <a href="users.php" class="btn btn-dark mb-2" ><i class="fa fa-backward"></i> Back</a>
                                        </div>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
