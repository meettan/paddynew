<div class="wraper">   

        <div class="row">
            <div class="col-lg-9 col-sm-12">
                <h1><strong>RiceMillWise Dispatch Gunnybag count Upload</strong></h1>
            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <h3 style="margin-bottom:30px">

       <!--<small><a href="<?php //echo site_url("paddys/transactions/f_paddycollection_add");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>-->
            <small><a href="<?php echo site_url("paddys/transactions/f_mill_wise_gunnybag_upload");?>" class="btn btn-primary" style="width: 100px;">Upload</a></small>
                <span class="confirm-div" style="float:right; color:green;"></span>
              
            </h3>

            <table class="table table-bordered table-hover" id="myTable">

                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Transaction Dt</th>  
                       
                        <th>Rice Mill</th>
                        <th>Dispatched quantity(MT) of paddy</th>
                        <th>Online receipt of paddy by the miller(MT)</th>
                        <th>Resultant CMR(MT)- on dispatched quantity</th>
                        <th>Offer quantity(MT)</th>
                        <th>Offer received(MT)</th>
                        <th>DO/RRO issued(MT)</th>
                        <th>DO/RRO delivered(MT) <br>CP</th>
                        <th>DO/RRO delivered(MT) <br>SP</th>
                        <th>DO/RRO delivered(MT) <br>Total</th>
                        <th>CMR Pending(MT)</th>
                        <th>Paddy in Hand(MT)</th>
                        <th>Tentative gunny bag requirement(fig. in bale)</th>
                        <th>Option</th>
                    </tr>

                </thead>
                <tbody> 

                <?php 
                   if(isset($rro_dtls)){

                   $count=0;
                   foreach($rro_dtls as $rro)
                        {
                       ?>
                        <tr>

                          <td><?php echo ++$count; ?></td>
                          <td><?php echo date('d/m/Y',strtotime($rro->trans_dt)); ?></td>
                        
                          <td><?php echo $rro->rice_mill_name; ?></td>
                          <td><?php echo $rro->dispatch_qty; ?></td>
                          <td><?php echo $rro->receive_to_miller; ?></td>
                          <td><?php echo $rro->resultant_cmr; ?></td>
                          <td><?php echo $rro->offer_qty; ?></td>
                          <td><?php echo $rro->offer_received; ?></td>
                          <td><?php echo $rro->do_issued; ?></td>
                          <td><?php echo $rro->do_deliver_cp; ?></td>
                          <td><?php echo $rro->do_deliver_sp; ?></td>
                          <td><?php echo $rro->do_deliver_tot; ?></td>
                          <td><?php echo $rro->cmr_pending; ?></td>
                          <td><?php echo $rro->paddy_in_hand; ?></td>
                          <td><?php echo $rro->gunny_bag; ?></td>
                          <td>
                                   
                             <button type="button" class="delete" id="<?=$rro->id;?>/<?=$rro->trans_dt;?>/<?=$rro->bulk_trans_id;?>" data-toggle="tooltip" data-placement="bottom" title="Delete">         
                                    <i class="fa fa-trash fa-2x" style="color: #007bff"></i>
                                </button>
                            
                           </td>
                <?php 
                       }
                    }

                    else {

                        echo "<tr><td colspan='10' style='text-align: center;'>No data Found</td>";
                    }
                    ?> 
                    </tr>
                </tbody>

                <tfoot>
                    <tr>
                    <th>Sl. No</th>
                        <th>Transaction Dt</th>  
                       
                        <th>Rice Mill</th>
                        <th>Dispatched quantity(MT) of paddy</th>
                        <th>Online receipt of paddy by the miller(MT)</th>
                        <th>Resultant CMR(MT)- on dispatched quantity</th>
                        <th>Offer quantity(MT)</th>
                        <th>Offer received(MT)</th>
                        <th>DO/RRO issued(MT)</th>
                        <th>DO/RRO delivered(MT) <br>CP</th>
                        <th>DO/RRO delivered(MT) <br>SP</th>
                        <th>DO/RRO delivered(MT) <br>Total</th>
                        <th>CMR Pending(MT)</th>
                        <th>Paddy in Hand(MT)</th>
                        <th>Tentative gunny bag requirement(fig. in bale)</th>
                        <th>Option</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        
       
    </div>

<script>

    $(document).ready( function (){

        $('.delete').click(function () {

            var id = $(this).attr('id');

            var result = confirm("Do you really want to delete this record?");

            if(result) {

                window.location = "<?php echo site_url('paddys/transactions/f_mill_wise_gunnybag_delete?data="+id+"');?>";

            }
            
        });

    });

</script>

<script>
   
    $(document).ready(function() {

    $('.confirm-div').hide();

        <?php if($this->session->flashdata('msg')){ ?>

            $('.confirm-div').html('<?php echo $this->session->flashdata('msg'); ?>').show();

        <?php } ?>

        $('.btn').click(function(){
            
            $.get('<?php echo site_url("paddys/transactions/f_getFarmerDetails1"); ?>',
                {
                    soc_id: $(this).attr('id')
                }
            )

            .done(function(data){
                $('#doc-view').html(data);
                $('#viewModal').modal('show');
            });
        })

    });

 
   $(document).ready(function() {
    $('#myTable').DataTable();
} );

</script>
