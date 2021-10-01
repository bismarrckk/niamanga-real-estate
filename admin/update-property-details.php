<?php include"header-input.php";
if(isset($_GET["id"])){
$id=$_GET["id"];
$_SESSION["property_id"]=$id;
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Property Details</h3></div>
                                    <div class="card-body">
                                         <?php if(isset($_GET['err'])){?>
                                        <div class="alert alert-danger" style="text-align:left">
                                            Error! Could not update property
                                        </div>
                                        <?php } ?>
                                       
                                        <?php while($values = $records->fetch_assoc()){?>
                                        <form action="process_data.php" method="POST" enctype="multipart/form-data">
                                             <div class="form-row">
                                                <div class="col-md-12">
                                           
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Location</label>
                                                        <input class="form-control py-4" name="location" type="text" required="" value="<?php echo $values['location'] ;?>" />
                                                    </div>
                                                </div>
                                                                                              
                                                
                                                </div>
                                                <div class="form-row">
                                                <div class="col-md-6">
                                                   <label class="small mb-1">Type of Listing</label>
                                                    <select name="listing"  class="form-control" required>
                                                      <option value="Long Term Rentals">Long Term Rentals</option>
                                                      <option value="Short Term Stays"> Short Term Stays</option>
                                                      <option value="<?php echo $values['listing'] ;?>" selected="selected" ><?php echo $values['listing'] ;?></option>
                                                                                                              
                                                    </select>
                                                </div>
                                                 <div class="col-md-6">
                                                   <label class="small mb-1">Status</label>
                                                    <select name="status"  class="form-control" required>
                                                      <option value="Available">Available</option>
                                                      <option value="Booked">Booked</option>
                                                      <option value="Occupied">Occupied</option>
                                                      <option value="For Sale"> For Sale</option>
                                                      <option value="<?php echo $values['status'] ;?>" selected="selected" ><?php echo $values['status'] ;?></option>
                                                                                                              
                                                    </select>
                                                </div>
                                                
                                            </div>
                                        
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                   <label class="small mb-1">Dimensions</label>
                                                   <input class="form-control py-4" name="dimensions" type="text" required="" value="<?php echo $values['dimensions'] ;?>" />
                                                </div> 
                                            </div>
                                             <div class="form-row">
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Map URL Link</label>
                                                        <input class="form-control py-4" type="text"  name="map"  value="<?php echo $values['map'] ;?>" required/>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Video Link</label>
                                                        <input class="form-control py-4" type="text"  name="video" value="<?php echo $values['video'] ;?>"/>
                                                    </div>
                                                  </div>
                                                  </div>

                                            
                                            <div class="form-group">
                                                <label class="small mb-1">Description</label>
                                                   <textarea class="form-control" rows="4" name="description" required="" ><?php echo $values['description'] ;?></textarea>
                                            </div>
                                             <div class="form-row">
                                                     <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="inputPassword">Category</label>
                                                               <select name="category" required="" class="form-control">
                                                                   <option value="">---select---</option>
                                                                   <option value="Appartments">Appartments</option>
                                                                   <option value="Land"> Land</option>
                                                                    <option value="<?php echo $values['category'] ;?>" selected="selected" ><?php echo $values['category'] ;?></option>
                                                                  
                                                               </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="inputPassword">Rooms</label>
                                                               <select name="rooms" required="" class="form-control">
                                                                   <option value="">---select---</option>
                                                                   <option value="1">1 Bedroom</option>
                                                                   <option value="2">2 Bedrooms</option>
                                                                   <option value="3">3 Bedrooms</option>
                                                                   <option value="4">4 Bedrooms</option>
                                                                   <option value="5">5 Bedrooms</option>
                                                                   <option value="<?php echo $values['rooms'] ;?>" selected="selected" ><?php echo $values['rooms'] ;?></option>
                                                                  
                                                               </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                       <label >County</label>
                                                       <select name="county" required class="form-control" style="height: 55px;">
                                                          <option value="">---select---</option>
                                                            <option value="baringo">Baringo</option>
                                                            <option value="bomet">Bomet</option>
                                                            <option value="bungoma">Bungoma</option>
                                                            <option value="busia">Busia</option>
                                                            <option value="elgeyo marakwet">Elgeyo Marakwet</option>
                                                            <option value="embu">Embu</option>
                                                            <option value="garissa">Garissa</option>
                                                            <option value="homa bay">Homa Bay</option>
                                                            <option value="isiolo">Isiolo</option>
                                                            <option value="kajiado">Kajiado</option>
                                                            <option value="kakamega">Kakamega</option>
                                                            <option value="kericho">Kericho</option>
                                                            <option value="kiambu">Kiambu</option>
                                                            <option value="kilifi">Kilifi</option>
                                                            <option value="kirinyaga">Kirinyaga</option>
                                                            <option value="kisii">Kisii</option>
                                                            <option value="kisumu">Kisumu</option>
                                                            <option value="kitui">Kitui</option>
                                                            <option value="kwale">Kwale</option>
                                                            <option value="laikipia">Laikipia</option>
                                                            <option value="lamu">Lamu</option>
                                                            <option value="machakos">Machakos</option>
                                                            <option value="makueni">Makueni</option>
                                                            <option value="mandera">Mandera</option>
                                                            <option value="meru">Meru</option>
                                                            <option value="migori">Migori</option>
                                                            <option value="marsabit">Marsabit</option>
                                                            <option value="mombasa">Mombasa</option>
                                                            <option value="muranga">Muranga</option>
                                                            <option value="nairobi">Nairobi</option>
                                                            <option value="nakuru">Nakuru</option>
                                                            <option value="nandi">Nandi</option>
                                                            <option value="narok">Narok</option>
                                                            <option value="nyamira">Nyamira</option>
                                                            <option value="nyandarua">Nyandarua</option>
                                                            <option value="nyeri">Nyeri</option>
                                                            <option value="samburu">Samburu</option>
                                                            <option value="siaya">Siaya</option>
                                                            <option value="taita taveta">Taita Taveta</option>
                                                            <option value="tana river">Tana River</option>
                                                            <option value="tharaka nithi">Tharaka Nithi</option>
                                                            <option value="trans nzoia">Trans Nzoia</option>
                                                            <option value="turkana">Turkana</option>
                                                            <option value="uasin gishu">Uasin Gishu</option>
                                                            <option value="vihiga">Vihiga</option>
                                                            <option value="wajir">Wajir</option>
                                                            <option value="pokot">West Pokot</option>
                                                            <option value="<?php echo $values['county'] ;?>" selected="selected" ><?php echo $values['county'] ;?></option>
                                                          
                                                       </select>
                                                    </div>
                                             
                                              
                                           <br>
                                            <div align="center">
                                           <button type="submit"  class="btn btn-dark mb-2" name="update_property_details"><i class="fa fa-save"></i> Update</button>
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
            
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
