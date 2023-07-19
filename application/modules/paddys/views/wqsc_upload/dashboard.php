<div class="wraper">   

        <div class="row">
            <div class="col-lg-9 col-sm-12">
                <h1><strong>SocietyWise RiceMillWise WQSC  Upload</strong></h1>
            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <h3 style="margin-bottom:30px">

       <!--<small><a href="<?php //echo site_url("paddys/transactions/f_paddycollection_add");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>-->
            <small><a href="<?php echo site_url("paddys/transactions/f_wqscupload");?>" class="btn btn-primary" style="width: 100px;">Upload</a></small>
                <span class="confirm-div" style="float:right; color:green;"></span>
              
            </h3>

            <table class="table table-bordered table-hover" id="myTable">

                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Transaction Dt</th>  
                        <th>Society</th>
                        <th>Rice Mill</th>
                        <th>Rice Receipt Order No.</th>
                        <th>WQSC No.</th>
                        <th>WQSC CMR Qty (MT)</th>
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
                          <td><?php echo $rro->soc_name; ?></td>
                          <td><?php echo $rro->rice_mill_name; ?></td>
                          <td><?php echo $rro->rice_rcpt_ord_no; ?></td>
                          <td><?php echo $rro->wqsc_no; ?></td>
                          <td><?php echo $rro->wqsc_cmr_qty; ?></td>
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
                        <th>Society</th>
                        <th>Rice Mill</th>
                        <th>Rice Receipt Order No.</th>
                        <th>WQSC No.</th>
                        <th>WQSC CMR Qty (MT)</th>
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

                window.location = "<?php echo site_url('paddys/transactions/f_wqscupload_delete?data="+id+"');?>";

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
