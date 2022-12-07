    <div class="wraper">

        <div class="col-md-6 container form-wraper" style="margin-left: 0px;">

            <form method="POST" id="form" action="<?php echo site_url("paddys/add_new/f_mill_edit");?>">

                <div class="form-header">

                    <h4>Mill Details</h4>

                </div>

                <div class="form-group row">

                    <label for="name" class="col-sm-2 col-form-label">Mill Name:</label>

                    <div class="col-sm-10">

                        <input type="hidden" name="sl_no" value="<?php echo $mill_dtls->sl_no;?>" />
                        <input class="form-control " required name="name" id="name"
                            value="<?php echo $mill_dtls->mill_name; ?>" readonly />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="name" class="col-sm-2 col-form-label">Mill Code:</label>

                    <div class="col-sm-10">

                        <input class="form-control" required readonly name="mill_code" id="mill_code"
                            value="<?php echo $mill_dtls->mill_code; ?>" />
                    </div>

                </div>


                <div class="form-group row">

                    <label for="reg_no" class="col-sm-2 col-form-label">Registration No.:</label>

                    <div class="col-sm-4">

                        <input type="text" class="form-control required" name="reg_no" id="reg_no" required value="<?php echo $mill_dtls->reg_no; ?>" />
                    </div>

                    <label for="reg_date" class="col-sm-2 col-form-label">Ragistration Date:</label>

                    <div class="col-sm-4">

                        <input type="date" name="reg_date" class="form-control required" id="reg_date" value="<?php echo $mill_dtls->reg_date; ?>"/>

                    </div>

                </div>

                <div class="form-group row">

                    <label for="ph_no" class="col-sm-2 col-form-label">Ph No.:</label>

                    <div class="col-sm-4">

                        <input type="text" class="form-control required" name="ph_no" id="ph_no" value="<?php echo $mill_dtls->ph_no; ?>"/>

                    </div>

                    <label for="email" class="col-sm-2 col-form-label">Email:</label>

                    <div class="col-sm-4">

                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $mill_dtls->email; ?>"/>

                    </div>


                </div>
                <div class="form-group row">

                    <label for="block" class="col-sm-2 col-form-label">Block:</label>

                    <div class="col-sm-4">

                        <select name="block" id="block" class="form-control required" >
                            <option value="">Select</option>
                            <?php foreach($block as $bloc)  { ?>
                            <option value="<?php if(isset($bloc->blockcode)){echo $bloc->blockcode;}?>"
                                <?php if($bloc->blockcode==$mill_dtls->block){echo "selected";}?>>
                                <?php if(isset($bloc->block_name)){echo $bloc->block_name;}?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <label for="gst_no" class="col-sm-2 col-form-label">GST No.:</label>

<div class="col-sm-4">

    <input type = "text"
        class= "form-control"
        name = "gst_no"  value="<?php echo $mill_dtls->gst_no; ?>"
        id   = "gst_no" required
    />

</div>

                </div>

                <div class="form-group row">

<label for="ph_no" class="col-sm-2 col-form-label">Boiler Reg No.:</label>

<div class="col-sm-4">

<input type = "text" class= "form-control required" name = "boiler_reg_no" id= "boiler_reg_no" required  value="<?php echo $mill_dtls->boiler_reg_no; ?>" />

</div>

<label for="email" class="col-sm-2 col-form-label">Pan No:</label>

<div class="col-sm-4">

<input type = "text" class= "form-control" name ="pan" id= "pan" required   value="<?php echo $mill_dtls->pan_no; ?>"/>

</div>


</div>
<div class="form-group row">

<label for="ph_no" class="col-sm-2 col-form-label">TAN No.:</label>

<div class="col-sm-4">

<input type = "text" class= "form-control required" name ="tan" id="tan" required  value="<?php echo $mill_dtls->tan; ?>"/>

</div>

<label for="email" class="col-sm-2 col-form-label">Police Station:</label>

<div class="col-sm-4">

<input type = "text" class= "form-control" name = "police_station" id= "police_station"  value="<?php echo $mill_dtls->police_station; ?>"/>

</div>


</div>
<div class="form-group row">

<label for="ph_no" class="col-sm-2 col-form-label">Post Office.:</label>

<div class="col-sm-4">

<input type = "text" class= "form-control required" name ="post_office" id="post_office"  value="<?php echo $mill_dtls->post_office; ?>"/>

</div>

<label for="email" class="col-sm-2 col-form-label">Pin:</label>

<div class="col-sm-4">

<input type ="number" class= "form-control" name="pin" id="pin" required  value="<?php echo $mill_dtls->pin; ?>"/>

</div>


</div>
<div class="form-group row">
<label for="mill_type" class="col-sm-2 col-form-label">Mill Type:</label>

<div class="col-sm-4">

    <select class="form-control" name="mill_type" id="mill_type" required>
        <option value="">Select</option>
        <option value="O" <?php echo ($mill_dtls->guide_lines_id == 'O')? 'selected' : '';?>>Others
        </option>
        <option value="P" <?php echo ($mill_dtls->guide_lines_id == 'P')? 'selected' : '';?>>
            Proprietary</option>
    </select>

</div>
  </div>    

<div class="form-group row">

<label for="addr" class="col-sm-2 col-form-label">Address:</label>

<div class="col-sm-10">

<textarea type = "text" class= "form-control" name = "addr" id="addr" required> <?php echo $mill_dtls->mill_addr; ?></textarea>

</div>

</div>

                <hr>

                <div class="form-header">

                    <h4>Bank Details</h4>

                </div>

                <div class="form-group row">

                    <label for="bnk_name" class="col-sm-2 col-form-label">Bank Name:</label>

                    <div class="col-sm-10">
                        <select class="form-control" name="bnk_name" id="bnk_name" required>
                            <option value="">Select a Bank</option>
                            <?php foreach($bank_dtls as $bank){?>
                            <option value="<?php if(isset($bank->sl_no)) { echo $bank->sl_no; }  ?>"
                                <?php   if($mill_dtls->bank_name == $bank->sl_no) { echo "selected" ;} ?>>
                                <?php if(isset($bank->bank_name)) { echo $bank->bank_name; }?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>


                <div class="form-group row">


                    <label for="acc_no" class="col-sm-2 col-form-label">Acc No.:</label>

                    <div class="col-sm-4">

                        <input type="number" class="form-control" name="acc_no" id="acc_no"
                            value="<?php echo $mill_dtls->acc_no;?>" />

                    </div>

                    <label for="ifsc" class="col-sm-2 col-form-label">IFS Code:</label>

                    <div class="col-sm-4">

                        <input type="text" class="form-control" name="ifsc" id="ifsc"
                            value="<?php echo $mill_dtls->ifsc_code;?>" />

                    </div>

                </div>

                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Save" />

                    </div>

                </div>



        </div>
        </form>

    </div>

    <script>
$("#form").validate();

//  *** Code Start For Validaton of IFS is Alpha numeric  on 07/05/2021  //

$('#form').submit(function(event) {

    var ifsc = $('#ifsc').val();

    if (ifsc.match(/[^a-zA-Z0-9 ]/g)) {

        alert("IFS Code Must Be Alpha Numeric");

        event.preventDefault();

    } else {

        // if (!ifsc.match(/[a-z]/)) {

        //      alert("IFS Code did not Contain Letter!");
        //      event.preventDefault();
        //  }else
        if (!ifsc.match(/[0-9]/)) {

            alert("IFS Code did not Contain Numeric Value!");
            event.preventDefault();
        } else {

            $('#submit').attr('type', 'submit');
        }


    }


});

//  *** Code End For Validaton of IFS is Alpha numeric  on 07/05/2021  // 


// Listen for click on toggle checkbox
$('#select-all').click(function(event) {
    if (this.checked) {
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