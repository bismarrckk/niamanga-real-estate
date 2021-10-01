<?php include"header-input.php";
if(isset($_GET["id"])){
$id=$_GET["id"];
$_SESSION["property"]=$id;
  }
require('../database/connection.php');
$sql="SELECT * FROM property where property_id = $id";
$records = $conn->query($sql);?>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add photos for this property</h3></div>
                                    <div class="card-body">
                                         <?php if(isset($_GET['err-upload'])){?>
                                        <div class="alert alert-danger" style="text-align:left">
                                            Error! Could not add photos!
                                        </div>
                                        <?php } ?>
                                        <?php if(isset($_GET['invalid'])){?>
                                        <div class="alert alert-danger" style="text-align:left">
                                            Error! invalid file format, jpeg,jpg,png formats are only allowed
                                        </div>
                                        <?php } ?>
                                       
                                        <?php while($values = $records->fetch_assoc()){?>
                                        <form action="process_data.php" method="POST" enctype="multipart/form-data">
                                              <div class="col-md-12">
                                                 <label class="small mb-1">Property ID</label>
                                                 <input class="form-control py-4" name="dimensions" type="text" readonly required="" value="<?php echo $values['property_id'] ;?>" />
                                              </div><br>
                                              <div class="col-md-12">                                     
                                              <table class="table" id="dynamic_field">  
                                                <tr> 
                                                  <div class="form-group"> 
                                                  <label>Add Photos</label>                    
                                                  <td><input type="file" name="files[]" id="file" required multiple></td> 
                                                  </div>
                                                </tr>  
                                              </table>
                                            </div>
                                           <br>
                                            <div align="center">
                                           <button type="submit"  class="btn btn-dark mb-2" name="add_property_photos"> <i class="fa fa-save"></i> Submit</button>
                                           <a href="index.php" class="btn btn-dark mb-2" ><i class="fa fa-backward"></i> Back</a>
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
            <div id="layoutAuthentication_footer" style="margin-top: 20px">
                
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
