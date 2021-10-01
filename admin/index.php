 <?php
require('../database/connection.php');
if(isset($_POST["delBtn"])){
if ($_SERVER['REQUEST_METHOD'] == 'DELETE' || ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['_METHOD'] == 'DELETE')) {
    $id =$_POST['id'];
    $result = "DELETE FROM property where property_id='$id'";
    if ($conn->query($result)===true) {
    header("location:index.php");
        
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
                                <i class="fas fa-home"></i>
                                Properties
                                  <a href="reg-property.php" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i>  New property</a>
                              
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Location</th>
                                                <th>Dimensions</th>
                                                <th>Listing</th>
                                            
                                                <th>Status</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>

                                        <tbody>
                                             <?php
                                          
                                            require('../database/connection.php');
                                            $sql="SELECT * FROM property";
                                            $records = $conn->query($sql);
                                            while($values = $records->fetch_assoc()){
                                            ?> 
                                            <tr>
                                                <td><?php echo $values['property_id']; ?></td>
                                                 <?php $date=$values['reg_date']; ?>
                                                 <td><?php echo(date("d-M-Y",$date)); ?></td>
                                                <td><?php echo $values['location'];?></td>
                                                 <td><?php echo $values['dimensions'];?></td>
                                                  <td><?php echo $values['listing'];?></td>
                                                
                                                
                                                 <td><?php echo $values['status'];?></td>
                                           
                                                 <td> 
                                                    <form method="POST" onsubmit="return confirm('Are you sure you want to delete this property?');">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="reg-photos.php?id=<?php echo $values['property_id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-image"></i></a>
                                                        <a href="update-property-details.php?id=<?php echo $values['property_id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                                                        <input type="hidden" name="_METHOD" value="DELETE">
                                                        <input type="hidden" name="id" value="<?php echo $values['property_id']; ?>">
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