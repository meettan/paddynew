    <div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Fund Allocation</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

           
              <div class="col-sm-12">

                    <div class="col-sm-8">
                         <h3>    
                        <span class="confirm-div" style="float:left; color:green;"></span>
                        </h3>
                    </div>
                    <!--<div class="col-sm-4">
                         <h3>    
                        <div class="input-group" >
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search..." id="search" style="z-index: 0;">
                        </div>
                        </h3>
                    </div>-->

                    
              </div>  
           

              <table class="table table-bordered table-hover" id="myTable">

                <thead>

                    <tr>
                        <th>Sl No.</th>
                        <th>District</th>
                        <th>Requisition No.</th>
                        <th>SANC No.</th>
                        <th>Status</th>
                        <th>Allocate Fund</th>
                        <th>Funded By</th>
                        <th>Fund Allocation Date</th>
                       
                        <th>Option</th>

                    </tr>

                </thead>

                <tbody> 

                    <?php 
                     $i = 0;
                    if($payment_dtls) {

                        foreach($payment_dtls as $p_dtls) {

                    ?>

                            <tr>
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo get_district_name($p_dtls->branch_id); ?></td>
                                <td><?php echo $p_dtls->req_no; ?></td>
                                <td><?php echo $p_dtls->sanc_no; ?></td>
                           <!--      <td><?php //echo date('d/m/Y', strtotime($p_dtls->req_dt)); ?></td> -->
                               
                                <td><?php if($p_dtls->approve3 == "1"){ 

                                            echo '<span style="color:Green">Allocate Fund</span>';

                                     } else{ echo '<span style="color:red">Hold</span>';} ?>
                                         
                                </td>
                                 <td> <?php if($p_dtls->fund_flag == "1") {

                                            echo '<span style="color:orange">YES</span>';

                                     }  else{ echo '<span style="color:red">NO</span>';} ?> </td>
                                     <td><?php echo $p_dtls->funded_by?></td>
                                <td><?php echo $p_dtls->funded_dt?></td>
                                <td>
                                
                                    <a href="<?php echo base_url();?>index.php/payment/fund_allocation?req_no=<?php echo base64_encode($p_dtls->req_no); ?>" 
                                        data-toggle="tooltip"
                                        data-placement="bottom" 
                                        title="Edit">

                                        <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                        
                                    </a>
                                 
                                </td>

                            </tr>

                    <?php
                            
                            }

                        }

                        else {

                            echo "<tr><td colspan='10' style='text-align: center;'>No data Found</td></tr>";

                        }
                    ?>
                
                </tbody>

                <tfoot>

                    <tr>
                        <th>Sl No.</th>
                        <th>District</th>
                        <th>Requisition No.</th>
                        <th>SANC No.</th>
                        <th>Status</th>
                        <th>Allocate Fund</th>
                        <th>Funded By</th>
                        <th>Fund Allocation Date</th>
                        <th>Option</th>
                    </tr>
                
                </tfoot>

            </table>
            
        </div>

    </div>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    } );
</script>

<script>

    $(document).ready( function (){


         $('.forward').click(function () {

            var id = $(this).attr('id');

            var result = confirm("Do you really want to Forward this record?");

            if(result) {

                window.location = "<?php echo site_url('payment/requisition_forward?req_no="+id+"');?>";

            }
            
        });

        $('.delete').click(function () {

            var id = $(this).attr('id');

            var result = confirm("Do you really want to delete this record?");

            if(result) {

                window.location = "<?php echo site_url('payment/payment_delete?sl_no="+id+"');?>";

            }
            
        });


    });

</script>

<script>
   
    $(document).ready(function() {

    $('.confirm-div').hide();

    <?php if($this->session->flashdata('msg')){ ?>

    $('.confirm-div').html('<?php echo $this->session->flashdata('msg'); ?>').show();

    });

    <?php } ?>
</script>
