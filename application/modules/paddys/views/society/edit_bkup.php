  
    <div class="wraper">      

        <form method="POST"  onsubmit="return validate_form()"
            id="form" action="<?php echo site_url("paddys/add_new/f_society_edit");?>" >
            
            <div class="col-md-6 container form-wraper" style="margin-left: 0px;">

                <div class="form-header">
                
                    <h4>Society Details</h4>
                    
                </div>

                <div class="form-group row">

                    <label for="name" class="col-sm-2 col-form-label">Society Name:</label>

                    <div class="col-sm-10">

                        <input type="hidden" name="soc_id" value="<?php echo $society_dtls->sl_no;?>" />
                        <input
                            class="form-control required"  name="name"  id="name"
                            value="<?php echo $society_dtls->soc_name; ?>" />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="name" class="col-sm-2 col-form-label">Society Code:</label>

                    <div class="col-sm-10">

                        <input
                            class="form-control required" name="society_code"  
                            value="<?php echo $society_dtls->society_code; ?>"
                            id="society_code"/>
                    </div>

                </div>

                <div class="form-group row">
                
                    <label for="reg_no" class="col-sm-2 col-form-label">Registration No.:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class= "form-control required"
                            name = "reg_no"
                            id   = "reg_no"
                            value="<?php echo $society_dtls->reg_no; ?>"
                        />

                    </div>

                    <label for="reg_date" class="col-sm-2 col-form-label">Ragistration Date:</label>

                    <div class="col-sm-4">

                        <input type="date"
                                name="reg_date"
                                class="form-control required"
                                id="reg_date" 
                                value="<?php echo $society_dtls->reg_date; ?>"
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="ph_no" class="col-sm-2 col-form-label">Ph No.:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class= "form-control required"
                            name = "ph_no"
                            id   = "ph_no"
                            value="<?php echo $society_dtls->ph_no; ?>"
                        />

                    </div>

                    <label for="email" class="col-sm-2 col-form-label">Email:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class= "form-control"
                            name = "email"
                            id   = "email"
                            value="<?php echo $society_dtls->email;?>"
                        />

                    </div>


                </div>

                <div class="form-group row">

                <label for="block" class="col-sm-2 col-form-label">Block:</label>

                            <div class="col-sm-4">

                            <select name="block" id="" class="form-control required">
                          
               <option value="">Select</option>  
              


                      <?php                       
                      foreach($block as $bloc)  { ?>  
                      <option value="<?php if(isset($bloc->blockcode)){echo $bloc->blockcode;}?>" <?php if($bloc->blockcode== $society_dtls->block){echo "selected";}?> ><?php if(isset($bloc->block_name)){echo $bloc->block_name;}?></option> 
                      <?php } ?>   
               </select>

                            </div>


                    <label for="gst_no" class="col-sm-2 col-form-label">GST No.:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class= "form-control"
                            name = "gst_no"
                            id   = "gst_no"
                            value="<?php echo $society_dtls->gst_no;?>"
                        />

                    </div>

                </div>  

           <div class="form-group row">


                <label for="block" class="col-sm-2 col-form-label">PAN No:</label>

                <div class="col-sm-4">

                <input type = "text"  class="form-control"  name = "pan"  id = "pan_no"   value="<?php echo $society_dtls->pan_no;?>"/>
                        </div>

                <label for="gst_no" class="col-sm-2 col-form-label">Tan No:</label>
                <div class="col-sm-4">
                    <input type = "text"  class="form-control"  name = "tan"  id = "tan_no" value="<?php echo $society_dtls->tan;?>" />
                        </div>
                        </div> 

                <div class="form-group row">

                <label for="block" class="col-sm-2 col-form-label">Police Station:</label>

                <div class="col-sm-4">

                <input type = "text"  class="form-control"  name = "police_station"  id = "police_station" value="<?php echo $society_dtls->police_station;?>" />
                        </div>

                   <label for="gst_no" class="col-sm-2 col-form-label">Post office:</label>
                 <div class="col-sm-4">
                            <input type = "text"  class="form-control"  name = "post_office"  id = "post_office" 
                            value="<?php echo $society_dtls->post_office;?>"
                            />
                 </div>
                         
                </div>

                <div class="form-group row">

                    <label for="addr" class="col-sm-2 col-form-label">Address:</label>
                    <div class="col-sm-10">
                        <textarea type = "text" class= "form-control" name = "addr"  id= "addr"
                        ><?php echo $society_dtls->soc_addr;?></textarea>

                    </div>

                </div>

                <hr>
                
                <div class="form-header">

                    <h4>Bank Details</h4>
                
                </div>

                <div class="form-group row">

                    <label for="bnk_name" class="col-sm-2 col-form-label">Bank Name:</label>

                    <div class="col-sm-10">

                        <input type = "text"
                            class= "form-control"  name = "bnk_name"   id= "bnk_name"
                            value="<?php echo $society_dtls->bank_name;?>"
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="brnch_name" class="col-sm-2 col-form-label">Branch Name:</label>

                    <div class="col-sm-10">

                        <input type = "text" class= "form-control"  name= "brnch_name" id= "brnch_name"
                            value="<?php echo $society_dtls->branch_name;?>"
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="acc_type" class="col-sm-2 col-form-label">Account Type:</label>

                    <div class="col-sm-4">

                        <select type = "text" class= "form-control" name = "acc_type" id = "acc_type">

                            <option value="Current Account" <?php echo ($society_dtls->acc_type == 'Current Account')?'selected':''; ?>>Current Account</option>

                            <option value="Savings Account" <?php echo ($society_dtls->acc_type == 'Savings Account')?'selected':''; ?>>Savings Account</option>
                        
                        </select>

                    </div>

                    <label for="acc_no" class="col-sm-2 col-form-label">Acc No.:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class= "form-control"
                            name = "acc_no"
                            id   = "acc_no"
                            value="<?php echo $society_dtls->acc_no;?>"
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="ifsc" class="col-sm-2 col-form-label">IFSC Code.:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class= "form-control"
                            name = "ifsc"
                            id   = "ifsc"
                            value="<?php echo $society_dtls->ifsc_code;?>"
                        />

                    </div>

                    

                    

                </div>

                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Save" />

                    </div>

                </div>
                
            </div>

            <div class="col-md-5 container form-wraper" style="margin-left: 10px; width: 48%;">
                        
                <div class="form-header">
                    
                    <h4>Guidelines</h4>
                
                </div>

                <table class="table table-bordered table-hover">

                    <thead>

                        <tr>

                            <th><input type="checkbox" class="form-check-input" id="select-all"> All</th>
                            <th>Sl. No.</th>
                            <th>Documents</th>

                        </tr>

                    </thead>
                        
                    <tbody> 
                     <?php
                         if(isset($society_dtls));
                           {
                           $guide=explode(",",$society_dtls->guide_lines_id);
                           }
                          
                            if($guidelines){
                                    $i = 1;
                                    
                                    foreach($guidelines as $guideline){

                                    ?>
                                        <tr>
                                            <td><input type="checkbox" class="form-check-input checkbox" name="guide_lines_id[]" <?php if (in_array($guideline->sl_no, $guide)) {  echo "checked";} ?> value="<?php echo $guideline->sl_no; ?>"></td>
                                            <td><input type="hidden" class="sl_no" name="sl_no[]" value='{"sl_no":"<?php echo $guideline->sl_no; ?>", "value":"<?php //echo ($guideline->checkId)? 1: 0 ?>"}'><?php echo $i++; ?></td>
                                            <td><?php echo $guideline->guide_lines; ?></td>
                                        </tr>
                                    <?php
                                 }

                                }
                            ?>
                    </tbody>
                

                    <tfoot>

                        <tr>
                        
                            <th>All</th>
                            <th>Sl. No.</th>
                            <th>Documents</th>

                        </tr>
                    
                    </tfoot>

                </table>

            </div>

        </form>

    </div>

<script>

    $("#form").validate();

</script>

<script>
function validate_form()
            {
            valid = true;

            if($('input[type=checkbox]:checked').length == 0)
            {
                alert ( "ERROR! Please select at least one checkbox" );
                valid = false;
            }

            return valid;
            }

            $('#select-all').click(function(event) {   
        if(this.checked) {
        // Iterate each checkbox
          $(':checkbox').each(function() {
            this.checked = true;                        
           });
        } else {
          $(':checkbox').each(function() {
            this.checked = false;                       
           });
        }
       });
</script>