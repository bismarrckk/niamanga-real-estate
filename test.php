 <select id="" name="">
                   <option selected="" value="0">Category</option>
                     <?php
                     include "database/connection.php";
                      $sql="SELECT property_id,category FROM property group by category";
                      $records = $conn->query($sql);
                      while($values = $records->fetch_assoc()){?>
                      ?>
                      <option value="<?php echo $values['property_id'];?>"><?php echo $values['category'];?></option> 
                      <?php } ?>  
                    </select>