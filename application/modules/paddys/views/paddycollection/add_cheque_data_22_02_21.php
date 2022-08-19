<div class="wraper">      

      <div class="col-lg-12 container contant-wraper">    
        <div class="form-header">
     
            <h4>Paddy Procurement Entry</h4>
      
            </div>

            <form method="POST" 
                id="form"  enctype="multipart/form-data"
                action="<?php echo site_url("paddys/transactions/f_cheque_add");?>">

                <div class="form-group row">

                <input type="hidden" value="<?php echo $_GET["soc_id"]?>" name="editdata">

                    <label for="block" class="col-sm-1 col-form-label">Block:</label>

                    <div class="col-sm-2">
                      <?php 

                      foreach($farmer_dtls as $farme);
                      
                      if(isset($farme->block_name)){ echo $farme->block_name; }?>


                    </div>

                    <label for="soc_name" class="col-sm-1 col-form-label">Society Name:</label>

                    <div class="col-sm-2">
                    <?php if(isset($farme->soc_name)){ echo $farme->soc_name; }?>  

                    </div>
                   
                    <label for="soc_name" class="col-sm-1 col-form-label">Procurement Date:</label>
                    <div class="col-sm-2">
                    <input type="date" name="trans_dt" id="trans_dt" class="form-control" value="<?php if(isset($farme->trans_dt)){echo $farme->trans_dt;}?>" readonly />
                    
                    </div>

                </div>
                <div class="form-group row">

                  <?php if($this->session->userdata['loggedin']['kms_id'] > 2 ){?>
                <div class="col-sm-2"><b>File Number : </b></div>
                <div class="col-sm-2"><?php if(isset($farme->forward_bulk_trans_id)){ echo $farme->forward_bulk_trans_id; }?> </div>
                  <?php }else{ ?>

                <div class="col-sm-2"><b>Bulk Transaction Id : </b></div>
                <div class="col-sm-2"><?php if(isset($farme->bulk_trans_id)){ echo $farme->bulk_trans_id; }?>

                 </div>
                  <?php } ?>
 <input type="hidden" value="<?php if(isset($farme->bulk_trans_id)){ echo $farme->bulk_trans_id; }?>" name="bulk_trans_id">
                <div class="col-sm-2"><b>Bank Name :</b> </div>
                <div class="col-sm-3">           
                    <select name="bank_sl_no" id="bank_sl_no" class="form-control" required>
                    <option value="">Select</option>    
                    <?php

                             foreach($banks as $bank){

                            ?>
                         <option value="<?php echo $bank->sl_no;?>" <?php if(isset($farme->bank_sl_no) && $farme->bank_sl_no == $bank->sl_no){ echo "selected"; } ?>> <?php echo $bank->bank_name; ?></option>
                           <?php

                                 }

                                    ?>  
                  </select>
                </div>
                <div class="col-sm-2"><b>Transaction :</b><?php if($farme->trans_type=="N"){ echo "NEFT"; }else{ echo "Cheque"; }?>  </div>
                </div>    

            <table class="table table-bordered table-hover" id="farmers">
            <thead><tr><th>Sl. No.</th><th>Name</th><th>Registration No.</th><th>Transaction Code.</th><th>Quantity(Quintal)</th><th>Amount</th>
                <?php if($farme->trans_type=="N"){ ?>
                  <th>IFS Code</th><th>Account </th>
             
                    <?php }else{ ?>
                  <th>Cheque No</th><th>Cheque Date</th>
                   <?php } ?>
                   
                   <th>Status</th>
              
                 </tr></thead><tbody id="farme"> 
         
            <tbody> 
            <?php 
                $count = 0;
                $paddy_qty = 0;
                $amount = 0;
            foreach($farmer_dtls as $farmer_dtl) { ?>
            <tr <?php //if(get_farmer_name($farmer_dtl->reg_no) == "Not Found"){
             // echo 'style="background-color: red;"';}
              ?> ><td><?=++$count;?></td>
              <td><?=$farmer_dtl->farmer_name?></td>
              <td><?=$farmer_dtl->reg_no?><input type="hidden" value="<?=$farmer_dtl->reg_no?>" name="reg_no[]"></td>
              <td><?=$farmer_dtl->forward_trans_id?><input type="hidden" value="<?=$farmer_dtl->forward_trans_id?>" name="forward_trans_id[]"></td>
              <td>
              <input type="text" name="quantity[]" value="<?=$farmer_dtl->quantity?>" readonly class="form-control quantity">
                <?php $paddy_qty += $farmer_dtl->quantity;?> <span class="qerror"></span></td>
              <td><input type="text" name="amount[]" value="<?=$farmer_dtl->amount?>" class="form-control amount" readonly> <?php $amount += $farmer_dtl->amount;?></td>

   <?php if($farme->trans_type=="N"){ ?>

   <td><input type="text" name="ifsc_code[]" value="<?=$farmer_dtl->ifsc_code?>" class="form-control ifsc_code" ><span class="error"></span></td>
    <td><input type="text" class="form-control acc_no" name="acc_no[]" value="<?=$farmer_dtl->acc_no?>" ><span class="cd_error"></span></td>

    <?php  }else{    ?>               

    <td><input type="text" name="cheque_no[]" value="<?=$farmer_dtl->cheque_no?>" class="form-control cheque_no"><span class="error"></span></td>
              <td><input type="date" class="form-control cheque_date" name="cheque_date[]" value="<?=$farmer_dtl->cheque_date?>"><span class="cd_error"></span></td>

    <?php } ?> 
    <td> <button type="button" class="payment_detail btn btn-info" data-toggle="modal" data-target="#myModal"  value="<?=$farmer_dtl->forward_trans_id?>">View </button></td>
             <!--   <td>
                  <?php //if($farmer_dtl->status == 0 && $farmer_dtl->chq_status == 'U' ) { ?>
               <button type="button" class="delete" id="<?=$farmer_dtl->soc_id;?>/<?=$farmer_dtl->trans_dt;?>/<?=$farmer_dtl->trans_id;?>/<?=$farmer_dtl->bulk_trans_id;?>/<?=$farmer_dtl->chq_status;?>" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-times fa-2x" style="color: red"></i></button>
                <?php  //} ?> 
              </td> -->
             </tr>
            
            <?php } ?>
             <tr><td colspan="4" style=
              "text-align:center">Total Procured Paddy</td><td id="total"><?=$paddy_qty;?></td>
              <td id="totals"><?=$amount;?></td>
              <td colspan="2"></td>
            
            </tr>
            </tbody>
            </table>

            <div class="form-group row">
                  <div class="col-sm-12">
                  <input type="checkbox" id="certificate_1" name="certificate_1" value="Y" <?php if(isset($farme->certificate_1) && $farme->certificate_1 == 'Y'){ echo "checked"; } ?> required> Certified that the paddy procurement details shown above are correct and at par with
                  the Muster Roll prepared and uploaded in system.
                 </div>
                </div> 

                 <div class="form-group row">
                   <div class="col-sm-12">
                  <input type="checkbox" id="certificate_2" name="certificate_2" value="Y" <?php if(isset($farme->certificate_2) && $farme->certificate_2 == 'Y'){ echo "checked"; } ?> required> The paddy shown to be procurred is dispatched by the Society to the Rice Mill and the 
                   Rice Mill has only accepted by the said quantity of paddy.
                 </div>
                 </div> 

               
                 <div class="form-group row">
                   <div class="col-sm-12">
                   <input type="checkbox" id="certificate_4" name="certificate_4" value="Y" <?php if(isset($farme->certificate_4) && $farme->certificate_4 == 'Y'){ echo "checked"; } ?> required> The payment of MSP be given to the farmers.
                   </div> 
                 </div> 
            <div class="form-group row">

            <div class="col-sm-6">
                <?php if($farmer_dtl->status == 0 && $farmer_dtl->chq_status == 'U') { ?>
                <input type="submit" id="submit" class="btn btn-info" value="Save"/>
                 <?php  } ?> 
                 </div>    
           
            </div>
            </form>

        <div class="form-group row">
          <div class="col-sm-6"></div>
          <div class="col-sm-5">
                <?php if($farmer_dtl->status == 0 && $farmer_dtl->chq_status == 'U' && $farmer_dtl->bank_sl_no != '0') { ?>
                 <a href="<?php echo site_url("paddys/bankintegration/f_paddycol_forward");?>?soc_id=<?=$farme->soc_id;?>&trans_dt=<?=$farme->trans_dt;?>&forward_bulk_trans_id=<?=base64_encode($farme->forward_bulk_trans_id);?>&bulk_trans_id=<?=$farme->bulk_trans_id;?>"><button class="btn btn-primary" id="">Forward</button></a>
                 <?php  } ?> 
            </div>
        </div>

        </div>

        <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">


        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Payment Status</h4>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   

<script>

   // $("#form").validate();

  //  $( ".sch_cd" ).select2();

</script>

<script>

    $(document).ready(function(){

        var i = 0;

        $('#block').change(function(){

            $.get( 

                '<?php echo site_url("paddy/societies");?>',

                { 

                    block: $(this).val()

                }

            ).done(function(data){

                var string = '<option value="">Select</option>';

                $.each(JSON.parse(data), function( index, value ) {

                    string += '<option value="' + value.sl_no + '">' + value.soc_name + '</option>'

                });

                $('#soc_name').html(string);

            });

        });

        $('#soc_name').change(function(){

         var block_name = $("#block option:selected" ).text();
         $('#block_n').html(block_name);

         var society_name = $("#soc_name option:selected" ).text();
         $('#soc_n').html(society_name);
         
        })

    });

  $(document).ready(function(){

        var i = 0;

        $('.payment_detail').click(function(){

            $.post( 

                '<?php echo site_url("paddys/transactions/f_farmer_payment");?>',

                { 

                    forward_trans_id: $(this).val()

                }

            ).done(function(data){

                var string = '<table  class="table"><tr><th>Bank</th><th>Value Date</th><th>Utr No</th><th>Bank Ref No</th><th>Cr A/C No</th><th>Amount</th><th>Status Code</th><th>Status Description</th></tr>';

                $.each(JSON.parse(data), function( index, value ) {

                    string += '<tr><td>' + value.bank_name + '</td><td>' + value.value_date + '</td><td>' + value.utr_no + '</td><td>' + value.bank_ref_no + '</td><td>' + value.cr_acc_no + '</td><td>' + value.amount + '</td><td>' + value.status_code + '</td><td>' + value.status_description + '</td></tr>'

                });

              //   var string +='</table>';

                $('.modal-body').html(string);

            });

        });

    });
       
</script>

<script>

    $(document).ready(function(){

        $('#no_of_farmer').change(function(){

            $.get('<?php echo site_url("paddy/totfarmer"); ?>',

                {

                    soc_id: $('#soc_name').val()

                }
            
            )
            .done(function(data){
                
                $('#totnofarmer').val(parseInt(data) + parseInt($('#no_of_farmer').val()));

            });

        });




        $('.delete').click(function () {

            var id = $(this).attr('id');

            var result = confirm("Do you really want to delete this record?");

            if(result) {

                window.location = "<?php echo site_url('paddys/transactions/f_proc_sig_delete?soc_id="+id+"');?>";

            }
            
        });


    })
        
        $('#form').submit(function(event){
           
            $('#farmers tr').each(function() {

                  var valid = 1;

                  var max_limit="90";
                
                  var paddy_qty = $(this).find("td").eq(3).html();      

                 var qty = $(this).find('td:eq(5) .quantity').val();
                 var enter_qty = parseFloat(paddy_qty) + parseFloat(qty);
                    if(enter_qty>max_limit){
                        $(this).find('td:eq(5) .quantity').focus();
              
                        $('#submit').attr('type', 'buttom');
              
                        event.preventDefault();
                   }
                    else 
                       {
                      $('#submit').attr('type', 'submit');
                      }
            }); 
                  
         });
</script>

<script>
$(document).ajaxComplete(function() {

});
$( document ).ajaxComplete(function() {
    $(".status").change(function(){
      $(this)
          .parents('td')
          .next()
          .find('input')
          .prop('disabled', !$(this).is(":checked"));
          
              
  }); 

});
$(document).on("change", ".quantity", function() {
    var sum = 0;
    var totamt = 0;
    $(".quantity").each(function(){
        sum += +$(this).val();
    });
    $("#total").html(sum.toFixed(2));

     $(".amount").each(function(){
        totamt += +$(this).val();
    });
    $("#totals").html(totamt.toFixed(2));

   
});

// $(document).on("change", ".amount", function() {


// });

  $(".quantity").keyup(function(){

                var qty = $(this).closest('tr').find(".quantity").val();

                var max_limit="90";
               
                if(parseFloat(qty) > parseFloat(max_limit)){
                   
                    $(this).parents('tr').find(".qerror").html("Limit Exceed").css("color", "red");

                    $('#submit').attr('type', 'buttom');
                }
                else{
                
                    var price='<?php echo get_paddy_price($this->session->userdata['loggedin']['kms_id']);?>';;
                    $(this).closest('tr').find(".amount").val(Math.round((parseFloat(qty*price)).toFixed(2))).css("color", "black");
                    $(this).parents('tr').find(".qerror").html("");
                    $('[id^=check]').attr("disabled", false);
                    $('#submit').attr('type', 'submit');
                    }

  });

    $(".cheque_no").change(function(){

                    var qty = $(this).val();
                        
                    if(qty.toString().length != 6 ){
                        
                        $(this).parents('tr').find(".error").html("Only 6 Digit").css("color", "red"); 
                        $(this).closest('tr').find(".cheque_no").focus();
                    
                        $('#submit').attr('type', 'buttom');
                    }
                    else{
                        $(this).parents('tr').find(".error").html(""); 
                        $('#submit').attr('type', 'submit');
                    }

                       }); 

    $(".cheque_date").change(function(){

          var trans_dt = $('#trans_dt').val();
          var cheque_date = $(this).val();          

          if(new Date(cheque_date) < new Date(trans_dt))
          {
          $(this).parents('tr').find(".cd_error").html("Cheque Date Can Not Be Less Than Transaction Date").css("color", "red"); 
          $(this).closest('tr').find(".cheque_date").focus();
         // alert("Cheque Date Can Not Be Less Than Transaction Date");
          event.preventDefault();
          $('#submit').attr('type', 'buttom');
          return false;
          }
           else{
                   $(this).parents('tr').find(".cd_error").html(""); 
              }

        });

</script>