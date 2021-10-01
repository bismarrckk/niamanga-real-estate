<?php include"header-input.php";
if(isset($_GET["id"])){
$id=$_GET["id"];
$_SESSION["user_id"]=$id;
  }
require('../database/connection.php');
$sql="SELECT * FROM users where user_id = $id";
$records = $conn->query($sql);
?>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit user</h3></div>
                                    <div class="card-body">
                                         <?php if(isset($_GET['err'])){?>
                                        <div class="alert alert-danger" style="text-align:left">
                                            Error! Could not update user!
                                        </div>
                                        <?php } ?>
                                        <?php if(isset($_GET['successful'])){?>
                                        <div class="alert alert-success" style="text-align:left">
                                           User updated successfully!
                                        </div>
                                        <?php } ?>
                                        <?php while($values = $records->fetch_assoc()){?>
                                        <form action="process_data.php" method="POST">
                                             <div class="form-row">
                                                <div class="col-md-12">
                                           
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Full Name</label>
                                                        <input class="form-control py-4" name="fullname" type="text" value="<?php echo $values['fullname'] ;?>"/>
                                                    </div>
                                                </div>
                                                 <div class="col-md-12">
                                           
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Email Address</label>
                                                        <input class="form-control py-4" name="email" type="text" value="<?php echo $values['email'] ;?>"/>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="col-md-12">
                                                   <label class="small mb-1">Role</label>
                                                    <select name="role"  class="form-control" required>
                                                      <option value="Admin">Admin</option>
                                                      <option value="Agent">Agent</option>
                                                       <option value="<?php echo $values['user_role'] ;?>" selected="selected" ><?php echo $values['user_role'] ;?></option>
                                                      
                                                        
                                                    </select>
                                                </div>
                                                
                                            </div>
                                        
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                   <label class="small mb-1">Status</label>
                                                    <select name="status"  class="form-control" required>

                                                      <option value="suspended">Suspend</option>
                                                      <option value="active">Activate</option>
                                                      <option value="<?php echo $values['status'] ;?>" selected="selected" ><?php echo $values['status'] ;?></option>
                                                        
                                                    </select>
                                                </div>
                                                
                                            </div>
                                           <br>
                                            <div align="center">
                                           <button type="submit"  class="btn btn-dark mb-2" name="update_user_details"><i class="fa fa-save"></i> Update</button>
                                           <a href="users.php" class="btn btn-dark mb-2" ><i class="fa fa-backward"></i> Back</a>
                                        </div>
                                        </form>
                                    <?php }?>
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
