<div class="wraper">      

    <div class="col-md-12 container form-wraper" style="margin-left: 0px;">

        <form method="POST" id="form" action="<?php echo site_url("payment/commission/edit");?>" >

            <div class="form-header">
            
                <h4>Commission Edit</h4>
            
            </div>

            <input type="hidden" name="trans_cd" value="<?php echo $this->input->get('trans_cd'); ?>">

            <div class="form-group row">

                <label for="dist" class="col-sm-1 col-form-label">Payment Date:</label>

                <div class="col-sm-3">

                    <input type="date"
                            class="form-control" required 
                            name="trans_dt" id="trans_dt" value="<?=$bill_dtl->trans_dt?>" />

                </div>

                <label for="block" class="col-sm-1 col-form-label">Block:</label>

                <div class="col-sm-3">

                    <select name="block" id="block" class="form-control" disabled>

                        <option value="">Select</option>    
                        <?php

                            foreach($blocks as $block){

                        ?>
                        <option value="<?php echo $block->blockcode;?>" <?php if($block->blockcode==$bill_dtl->block_id) {echo "selected"; }?>><?php echo $block->block_name;?></option>    
                         <?php

                            }

                        ?>     
                    </select>

                </div>

                <label for="soc_name" class="col-sm-1 col-form-label">Society Name:</label>

                <div class="col-sm-3">

                    <select type="text"  disabled
                        class="form-control"
                        name="soc_name"
                        id="soc_name">

                        <option value="">Select</option>    

                        <option value="">Select Block First</option>    

                    </select>    

                </div>
   
            </div>
           
            <div class="form-group row">

                   <label for="soc_name" class="col-sm-1 col-form-label">Rice Mill:</label>
                  
                   <div class="col-sm-3">

                            <select type="text" class="form-control" name="mill_id" id="mill_id" disabled>

                                <option value="">Select</option>   

                            </select>    

                    </div>

                    <label for="totPaddy" class="col-sm-1 col-form-label">Agreement No.:</label>

                    <div class="col-sm-3">

                        <input type="text"
                                class="form-control" 
                                name="aggrement_no"
                                id="aggrement_no" readonly
                                value="<?=$bill_dtl->aggrement_no?>"/>

                    </div>


                    <label for="pool_type" class="col-sm-1 col-form-label">Branch ref.no:</label>

                    <div class="col-sm-3">

                           <input type="text"
                                  class="form-control" readonly
                                  name="branch_ref_no"
                                  id="branch_ref_no"
                                  value="<?=$bill_dtl->branch_ref_no?>"
                                  /> 

                    </div>

            </div>

            <div class="form-group row">

                <label for="wqsc" class="col-sm-1 col-form-label">Wqsc:</label>

                <div class="col-sm-3">

                    <input type="text"
                            class="form-control" readonly
                            name="wqsc"
                            id="wqsc"
                            value="<?=$bill_dtl->wqsc?>"
                        />

                </div>

                <label for="totPaddy" class="col-sm-1 col-form-label">Soc Bill No.:</label>

                <div class="col-sm-3">

                    <input type="text"
                            class="form-control" required
                            name="soc_bill_no"
                            id="soc_bill_no"
                            value="<?=$bill_dtl->soc_bill_no?>"
                        />

                </div>

                <label for="pool_type" class="col-sm-1 col-form-label">Soc Bill Date:</label>

                <div class="col-sm-3">

                       <input type="date"
                              class="form-control" required
                              name="soc_bill_date"
                              id="soc_bill_date" 
                              value="<?=$bill_dtl->soc_bill_date?>"
                        /> 

                </div>
               
            </div>

            <div class="form-group row">

            
                <label for="pool_type" class="col-sm-1 col-form-label">Pool Type:</label>

                <div class="col-sm-3">

                    <select class="form-control" disabled
                            name="pool_type" id="pool_type">

                        <option value="">Select</option>

                        <option value="S" <?php if($bill_dtl->pool_type=="S"){
                            echo "selected";
                        }?> >State Pool</option>

                        <option value="C" <?php if($bill_dtl->pool_type=="C"){
                            echo "selected";
                        }?> >Central Pool</option>

                    </select>    

                </div>
                 <label for="pool_type" class="col-sm-1 col-form-label">Rice Type:</label>

                <div class="col-sm-3">

                    <select class="form-control" disabled
                            name="rice_type" id="rice_type">

                        <option value="">Select</option>

                        <option value="P" <?php if($bill_dtl->rice_type=="P"){
                            echo "selected";
                        }?>>Boiled Rice</option>

                        <option value="R" <?php if($bill_dtl->rice_type=="R"){
                            echo "selected";
                        }?>>Raw Rice</option>

                    </select>    

                </div>

                <label for="pool_type" class="col-sm-1 col-form-label">Sanction no.:</label>

                <div class="col-sm-3">

                    <input type="text"
                            class="form-control" readonly
                            name="sanc_no"
                            id="sanc_no"
                            value="<?=$bill_dtl->sanc_no?>"
                            /> 

                </div>

            </div>

            <div class="form-group row">

                <label for="pool_type" class="col-sm-1 col-form-label">Received Paddy:</label>

                <div class="col-sm-3">

                    <input type="text"
                            class="form-control" readonly
                            name = "tot_rceived" value="<?php echo $paddy->paddy_qty; ?>"
                            id = "tot_rceived" /> 

                </div>

            </div>

          <!--   <div id="bill_dtls">
                
            </div> -->
            <?php $paddy = $paddy->paddy_qty;
                  $rate  = $bill_dtl->rate;

                  $tot_amt = $paddy*$rate;

             ?>

            <div id=""><div class="form-header"><h4>Bill Details</h4></div><table class="table"><thead><tr><th>Particulars.</th><th>Rate/Qtls Paddy</th><th>Total Amount(Rs)</th><th>TDS Amount (Less)</th><th>CGST (Add)@2.5%</th><th>SGST(Add)@2.5%</th><th>Payable Amount(Rs) </th></tr></thead><tbody><tr><td>Commission to Society</td><td><?php if(isset($bill_dtl->rate)){ echo $bill_dtl->rate;}  ?></td><td><?=round($tot_amt, 2);?></td><td><?php if(isset($bill_dtl->tds_amt)){ echo $bill_dtl->tds_amt;}  ?></td><td>0.00</td><td>0.00</td><td><?php if(isset($bill_dtl->tot_amt)){ echo $bill_dtl->tot_amt;}  ?></td></td></tr></tbody></table></div>
        
           <div class="form-group row">

                
                 <label for="totPaddy" class="col-sm-2 col-form-label">Amount(Rounded off):</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control"  readonly
                            name="tot_amt" 
                            id="tot_amt" 
                            value="<?=$bill_dtl->tot_amt?>"/>

                </div>


                <label for="totPaddy" class="col-sm-2 col-form-label">Paid Amount:</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" readonly
                            name="paid_amt"
                            id="paid_amt"
                            value="<?=$bill_dtl->paid_amt?>"
                             />
                </div>


            </div>

            <div class="form-group row">

                 <label for="totPaddy" class="col-sm-2 col-form-label">Payment Mode:</label>

                <div class="col-sm-4">

                     <select class="form-control" required
                            name="pay_mode" id="pay_mode">

                        <option value="">Select</option>
                        <option value="CHEQUE" <?php if($bill_dtl->pay_mode=="CHEQUE"){
                            echo "selected";
                        }?>>Cheque</option>
                        <option value="RTGS" <?php if($bill_dtl->pay_mode=="RTGS"){
                            echo "selected";
                        }?>>RTGS</option>
                        <option value="NEFT" <?php if($bill_dtl->pay_mode=="NEFT"){
                            echo "selected";
                        }?>>NEFT</option>

                    </select>  

                </div>

                 <label for="totPaddy" class="col-sm-2 col-form-label">Reference No:</label>

                <div class="col-sm-4">

                    <input type="text"
                            class="form-control" required
                            name="ref_no"
                            id="ref_no"
                            value="<?=$bill_dtl->ref_no?>"
                             />
                </div>

            </div>

            <div class="form-group row">

                 <label for="totPaddy" class="col-sm-2 col-form-label">Remarks:</label>

                <div class="col-sm-10">

                    <textarea name="remarks" id="remarks" 
                   
                    class="form-control"> <?=$bill_dtl->remarks?></textarea>
                    
                </div>

            </div>
                     <?php if($bill_dtl->approved_status == 'U') { ?> 
            <div class="form-group row">

                <div class="col-sm-5">

                    <input type="submit" class="btn btn-info" value="Save" />

                </div>

            </div>
                   <?php  } ?>   
        </form>

    </div>

</div>

<script>

    $(document).ready(function(){



        // $('#sanc_no').change(function(){


            $.post('<?php echo site_url("paddys/payment/sanc_no_dt"); ?>',
            
                {
                    sanc_no:   '<?php echo $bill_dtl->sanc_no?>'
            
                }

            )
            .done(function(data){

                var string = '<div class="form-header"><h4>Bill Details</h4></div><table class="table" ><thead><tr><th>Particulars.</th><th>Rate/Qtls Paddy</th><th>Total Amount(Rs)</th><th>TDS Amount (Less)</th><th>CGST (Add)@2.5%</th><th>SGST(Add)@2.5%</th><th>Claimed Amount(Rs)</th><th>Payable Amount(Rs) </th></tr></thead><tbody>';
                    
                var price_sum    = 0;

                $.each(JSON.parse(data), function( index, value ) {

                    string += '<tr><td>' + value.param_name + '</td><td>' + value.per_unit_rate + '</td><td>' + value.total_amt + '</td><td>' + value.tds_amt + '</td><td>' + value.cgst_amt + '</td><td>' + value.sgst_amt + '</td><td>' + value.claim_amt + '</td><td>' + value.payble_amt + '</td></tr>';

                    price_sum    += parseFloat(value.payble_amt); 
                     
                });
                        string +='<tr><td colspan="7">Total</td><td> <input type="text" class="form-control" id="tot_rice" value="'+price_sum+'" readonly></td> <td></td></tr></tbody></table>';

                    $('#bill_dtls').html(string);
                   //$('#paid_amt').val(price_sum);


                
            });

            //
            $.post('<?php echo site_url("paddys/payment/paddy_qty_on_sanc_new"); ?>',
                    
                    {
                        sanc_no:   '<?php echo $bill_dtl->sanc_no; ?>'
                
                    }

                )
                .done(function(data){
console.log(data);
                    var datas = JSON.parse(data);

                   // $('#tot_rceived').val(datas.paddy_qty);
                    
                });



     
    //});

        var global_block = '<?php echo $bill_dtl->block_id;?>';

            global_soc  = '<?php echo $bill_dtl->soc_id;?>';

            function socGroup(block) { 

                //For Block wise Society
                $.get( 

                    '<?php echo site_url("paddy/societies");?>',

                    { 

                        block: block

                    }

                    ).done(function(data){

                    var string = '<option value="">Select</option>',
                        selected = '';

                    $.each(JSON.parse(data), function( index, value ) {

                        if(value.sl_no == '<?php echo $bill_dtl->soc_id; ?>'){
                            
                            selected = 'selected';

                        }else{

                            selected = '';

                        }

                        string += '<option value="' + value.sl_no + '"'+ selected +'>' + value.soc_name + '</option>'

                    });

                    $('#soc_name').html(string);

                });

            }

            function millGroup(soc) { 

                //For Block wise Society
                $.get( 

                    '<?php echo site_url("payment/connected_mill");?>',

                    { 

                        soc_name: soc

                    }

                    ).done(function(data){

                    var string = '<option value="">Select</option>',
                        selected = '';

                    $.each(JSON.parse(data), function( index, value ) {

                        if(value.mill_id == '<?php echo $bill_dtl->mill_id; ?>'){
                            
                            selected = 'selected';

                        }else{

                            selected = '';

                        }

                        string += '<option value="' + value.mill_id + '"'+ selected +'>' + value.mill_name + '</option>'

                    });

                    $('#mill_id').html(string);

                });

            }


        socGroup('<?php echo $bill_dtl->block_id;?>');
        millGroup('<?php echo $bill_dtl->soc_id;?>');

        $('#block').change(function(){
            
            socGroup($(this).val());

        });

        $('#soc_name').change(function(){
            
            millGroup($(this).val());

        });

    });

</script>