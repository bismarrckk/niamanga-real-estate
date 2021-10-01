 <?php
require('../database/connection.php');
if(isset($_POST["delBtn"])){
if ($_SERVER['REQUEST_METHOD'] == 'DELETE' || ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['_METHOD'] == 'DELETE')) {
    $id =$_POST['id'];
    $path="SELECT link FROM photos where photo_id='$id' ";
    $res=$conn->query($path);
    $val=$res->fetch_assoc();
    $link=$val['link'];
    unlink($link);
    $result = "DELETE FROM photos where photo_id='$id'";
    if ($conn->query($result)===true) {
    header("location:view-images.php");
        
    }
 }
}
include"header.php";
?>
 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                       <div class="card mb-4">
                       </div>
                        <div class="card mb-4">
                           <div class="card-header">
                                <i class="fas fa-images"></i>
                                Photos
                                                               
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php
                                    
                                    $query = "SELECT * FROM photos order by photo_id DESC";
                                    if (!empty($query)) {
                                         $result = $conn->query($query);?>
                                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                         <thead>
                                            <tr>
                                                <th style="width: 1%">#</th>
                                                <th>Property ID</th>
                                                <th>Name</th>
                                                <th>Thumbnail</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        while($row = mysqli_fetch_array($result)) { ?>
                                        <tr>
                                            <td>#</td>
                                            
                                            <td><?php echo $row['property_id'] ?></td>
                                            <td><?php echo $row['link']; ?></td>
                                            <td><a href="#" id="pop">
                                            <img id="imageresource" src="<?php echo $row['link']; ?>" style="width: 100px; height: 66px;">
                                                </a></td>
                                            <td>
                                            <form method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');"> 
                                                <input type="hidden" name="_METHOD" value="DELETE">
                                                <input type="hidden" name="id" value="<?php echo $row['photo_id']; ?>">
                                                <button type="submit" name="delBtn" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>

                                    </table>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php include"footer.php"; ?>

