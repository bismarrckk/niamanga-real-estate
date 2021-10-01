 <?php
require('../database/connection.php');
if(isset($_POST["delBtn"])){
if ($_SERVER['REQUEST_METHOD'] == 'DELETE' || ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['_METHOD'] == 'DELETE')) {
    $id =$_POST['id'];
    $result = "DELETE FROM users where user_id='$id'";
    if ($conn->query($result)===true) {
    header("users.php");
        
    }
 }
}
include"header.php"; ?>
 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                       <div class="card mb-4">
                       </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-users"></i>
                                Users
                                  <a href="reg-users.php" class="btn btn-success btn-sm float-right"><i class="fas fa-user-plus"></i> New User</a>
                              
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone#</th>
                                                <th>Role</th>
                                                <th>Last login</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>

                                        <tbody>
                                             <?php
                                          
                                            require('../database/connection.php');
                                            $sql="SELECT * FROM users";
                                            $records = $conn->query($sql);
                                            while($values = $records->fetch_assoc()){
                                            ?> 
                                            <tr>
                                                <td><?php echo $values['fullname']; ?></td>
                                                 <td><?php echo $values['email'];?></td>
                                                <td><?php echo $values['phone_number'];?></td>
                                                 <td><?php echo $values['user_role'];?></td>
                                                 <?php $date=$values['user_log']; ?>
                                                 <td><?php echo(date("d-M-Y",$date)); ?></td>
                                                 <td><?php echo $values['status'];?></td>
                                           
                                                 <td> 
                                                    <form method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="update-user-status.php?id=<?php echo $values['user_id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                        <input type="hidden" name="_METHOD" value="DELETE">
                                                        <input type="hidden" name="id" value="<?php echo $values['user_id']; ?>">
                                                        <button type="submit" name="delBtn" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></button>
                                                    </div>
                                                    </form>
                                                 </td>                                              
                                            </tr>
                                            <?php } ?>                                            
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php include"footer.php"; ?>