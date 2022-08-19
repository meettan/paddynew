<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid #dddddd;

    padding: 6px 5px;

    font-size: 11px;
}

th {

    text-align: center;

}

tr:hover {background-color: #f5f5f5;}

</style>

<script>
  function printDiv() {

        var divToPrint = document.getElementById('divToPrint');

        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><title></title><style type="text/css">');


        WindowObject.document.writeln('@media print { .center { text-align: center;}' +
            '                                         .inline { display: inline; }' +
            '                                         .underline { text-decoration: underline; }' +
            '                                         .left { margin-left: 315px;} ' +
            '                                         .right { margin-right: 375px; display: inline; }' +
            '                                          table { border-collapse: collapse; font-size: 12px;}' +
            '                                          th, td { border: 1px solid black; border-collapse: collapse; padding: 6px;}' +
            '                                           th, td { }' +
            '                                         .border { border: 1px solid black; } ' +
            '                                         .bottom { bottom: 5px; width: 100%; position: fixed ' +
            '                                       ' +
            '                                   } } </style>');
        WindowObject.document.writeln('</head><body onload="window.print()">');
        WindowObject.document.writeln(divToPrint.innerHTML);
        WindowObject.document.writeln('</body></html>');
        WindowObject.document.close();
        setTimeout(function () {
            WindowObject.close();
        }, 10);

  }


       

</script>


<?php

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

?>        
    <div class="wraper">      

        <div class="col-md-6 container form-wraper">
    
            <form method="POST" 
                id="form"
                action="<?php echo site_url("report/millProc");?>" >

                <div class="form-header">
                
                    <h4>Millwise Paddy Procurement Report</h4>
                
                </div>

                <div class="form-group row">

                    <label for="from_date" class="col-sm-2 col-form-label">From Date:</label>

                    <div class="col-sm-10">

                        <input type="date"
                               id="from_date" 
                               name="from_date"
                               class="form-control required"
                               value="<?php echo $sys_date;?>" />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="to_date" class="col-sm-2 col-form-label">To Date:</label>

                    <div class="col-sm-10">

                        <input type="date"
                               id="to_date"
                               name="to_date"
                               class="form-control required"
                               value="<?php echo $sys_date;?>" />

                    </div>

                </div>
				
	    <div class="form-group row">

                  <label for="block" class="col-sm-2 col-form-label">Block:</label>

              <div class="col-sm-10">

              <select name="block" id="block" class="form-control required">
               <option value="">Select</option>  
                      <?php foreach($blocks as $bloc)  { ?>  
                      <option value="<?php if(isset($bloc->blockcode)){echo $bloc->blockcode;}?>"><?php if(isset($bloc->block_name)){echo $bloc->block_name;}?></option> 
                 <?php } ?>   
               </select>
                </div>

                </div>

                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Proceed" />

                    </div>

                </div>

            </form>    

        </div>

    </div>        

    <?php

    }
    
    else if($_SERVER['REQUEST_METHOD'] == 'POST') { 
     
    ?>

        <div class="wraper"> 

            <div class="col-lg-12 container contant-wraper">
                
                <div id="divToPrint">

                    <div class="printHeaderNew">
                        <div class="col-sm-3 float-left logoCustom"><img src="<?php echo base_url("/benfed.png");?>"/></div>
                        <div class="col-sm-9 float-left logoTextSecRight">
                            <h2>The West Bengal State Co-operative Marketing Federation Ltd.<span>Southend Conclave, 3rd Floor,1582 Rajdanga Main Road,Kolkata - 700 107.</span></h2>
                  <h3>Millwise Report on paddy procurement & CMR delivery Between <?php echo date("d-m-Y", strtotime($this->input->post('from_date'))).' To '.date("d-m-Y", strtotime($this->input->post('to_date')));?></h3>            
						
                        </div>
                    </div>
                    

                    <br>
                        <div class="col-md-12" >  
                            <div class="col-md-3">
                                <label>Branch name:</label><?php echo $this->session->userdata['loggedin']['branch_name']; ?>
                            </div>
							 <div class="col-md-3">
                        <label>Block name:</label><span> <?php if(isset($blockname->block_name)){
                          echo $blockname->block_name;
                        } ; ?></span>
                        </div>
                        </div>
                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                              <th>Sl No.</th>

                                <th style="width: 25%">Name of Rice Mill</th>

                                <th>Total Quantity of Paddy Received(MT)</th>

                                <th>Resultant CMR(MT)</th>

                                <th>Total Quantity of Raw Rice Offered State(MT)</th>

                                <th>Total Quantity of Raw Rice Offered FCI(MT)</th>

                                <th>Total Quantity of Par Boiled Rice Offered State(MT)</th>

                                <th>Total Quantity of Par Boiled Rice Offered FCI(MT)</th>
                                
                                <th>Total Quantity of DO Issued Raw Rice State Pool(MT)</th>
                                
                                <th>Total Quantity of DO Issued Raw Rice Central Pool(MT)</th>
                                
                                <th>Total Quantity of DO Issued Raw Rice FCI(MT)</th>
                                
                                <th>Total Quantity of DO Issued Par Boiled Rice State Pool(MT)</th>
                                
                                <th>Total Quantity of DO Issued Par Boiled Rice Central Pool(MT)</th>
                                
                                <th>Total Quantity of DO Issued Par Boiled Rice FCI(MT)</th>

                                <th>Total Quantity of Raw Rice Delivered State Pool(MT)</th>

                                <th>Total Quantity of Raw Rice Delivered Central Pool(MT)</th>

                                <th>Total Quantity of Raw Rice Delivered FCI(MT)</th>

                                <th>Total Quantity of Par Boiled Rice Delivered State Pool(MT)</th>

                                <th>Total Quantity of Par Boiled Rice Delivered Central Pool(MT)</th>

                                <th>Total Quantity of Par Boiled Rice Delivered FCI(MT)</th>

                                <th>CMR Yet To Be Delivered To Godown(MT)</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($millDtls){ 

                                  $i = 1;

                                  $tot_qty_paddy_received = 0;

                                  $tot_resultant_cmr = 0; $tot_raw_rice_offered_state = 0; $tot_raw_rice_offered_fci = 0;
                                  $tot_boiled_rice_offered_state = 0; $tot_boiled_rice_offered_fci = 0;
                                  $tot_raw_rice_delivered_state = 0; $tot_raw_rice_delivered_center = 0; 
                                  $tot_raw_rice_delivered_fci = 0;
                                  $tot_boiled_rice_delivered_state = 0; $tot_boiled_rice_delivered_center = 0; 
                                  $tot_boiled_rice_delivered_fci = 0;
                                  $tot_remain = 0;
                                  $tot_raw_rice_do_state=0;
                                  $tot_raw_rice_do_center=0;
                                  $tot_raw_rice_do_fci=0;
                                  $tot_boiled_rice_do_state=0;
                                  $tot_boiled_rice_do_center=0;
                                  $tot_boiled_rice_do_fci=0;

                                    foreach($millDtls as $mill){

                            ?>

                                <tr>
                                     <td><?php echo $i++; ?></td>
                                     <td><?php echo $mill->mill_name; ?></td>
                                     <td><?php
                                                foreach($collc as $colcDtls){
                                                    if($colcDtls->mill_id == $mill->mill_id){
                                                         echo $colcDtls->quantity * 0.1;
                                                         $tot_qty_paddy_received += $colcDtls->quantity * 0.1;
                                                    }
                                                }
                                         ?>
                                     </td>
                                  
                                     <td><?php
                                                foreach($cmr as $cmrDtls){
                                                    if($cmrDtls->mill_id == $mill->mill_id){
                                                         echo $cmrDtls->resultant * 0.1;
                                                         $tot_resultant_cmr += $cmrDtls->resultant;
                                                    }
                                                }   
                                         ?> 
                                     </td>

                                     <td><?php
                                                foreach($offer as $offerDtls){
                                                    if($offerDtls->mill_id == $mill->mill_id){
                                                        if($offerDtls->rice_type == 'R'){
                                                            echo $offerDtls->offered * 0.1;
                                                            $tot_raw_rice_offered_state += $offerDtls->offered * 0.1;
                                                        }else{
                                                            echo 0.00;
                                                        }
                                                    }
                                                }
                                             
                                         ?>
                                     </td>
                                     <td><?php echo 0.00;?></td>
                                     <td>
                                        <?php
                                                foreach($offer as $offerDtls){
                                                    if($offerDtls->mill_id == $mill->mill_id){
                                                        if($offerDtls->rice_type == 'P'){
                                                            echo $offerDtls->offered * 0.1;
                                                            $tot_boiled_rice_offered_state +=$offerDtls->offered * 0.1;
                                                        }else{
                                                            echo 0.00;
                                                        }
                                                    }
                                                }
                                         ?>
                                     </td>
                                     <td><?php echo 0.00;?></td>
                                      <td>
                                        <?php
                                                foreach($do as $doDtls){
                                                    if($doDtls->mill_id == $mill->mill_id){
                                                        if($doDtls->rice_type == 'R'){
                                                            echo $doDtls->sp * 0.1;
                                                            $tot_raw_rice_do_state += $doDtls->sp * 0.1;
                                                        }else{
                                                            echo 0.00;
                                                        }
                                                    }
                                                }
                                         ?>
                                     </td>
                                     <td>
                                         <?php
                                                foreach($do as $doDtls){
                                                    if($doDtls->mill_id == $mill->mill_id){
                                                        if($doDtls->rice_type == 'R'){
                                                            echo $doDtls->cp * 0.1;
                                                            $tot_raw_rice_do_center += $doDtls->cp * 0.1;
                                                        }else{
                                                            echo 0.00;
                                                        }
                                                    }
                                                }
                                         ?>
                                     </td>
                                     <td>
                                         <?php
                                                foreach($do as $doDtls){
                                                    if($doDtls->mill_id == $mill->mill_id){
                                                        if($doDtls->rice_type == 'R'){
                                                            echo $doDtls->fci * 0.1;
                                                            $tot_raw_rice_do_fci += $doDtls->fci * 0.1;
                                                        }else{
                                                            echo 0.00;
                                                        }
                                                    }
                                                }
                                         ?>
                                     </td>
                                     <td> 
                                         <?php
                                                foreach($do as $doDtls){
                                                    if($doDtls->mill_id == $mill->mill_id){
                                                        if($doDtls->rice_type == 'P'){
                                                            echo $doDtls->sp * 0.1;
                                                            $tot_boiled_rice_do_state += $doDtls->sp * 0.1;
                                                        }else{
                                                            echo 0.00;
                                                        }
                                                    }
                                                }
                                         ?>
                                     </td>
                                     <td>
                                         <?php
                                                foreach($do as $doDtls){
                                                    if($doDtls->mill_id == $mill->mill_id){
                                                        if($doDtls->rice_type == 'P'){
                                                            echo $doDtls->cp * 0.1;
                                                            $tot_boiled_rice_do_center += $doDtls->cp * 0.1;
                                                        }else{
                                                            echo 0.00;
                                                        }
                                                    }
                                                }
                                         ?>
                                     </td>
                                     <td><?php
                                                foreach($do as $doDtls){
                                                    if($doDtls->mill_id == $mill->mill_id){
                                                        if($doDtls->rice_type == 'P'){
                                                            echo $doDtls->fci * 0.1;
                                                            $tot_boiled_rice_do_fci += $doDtls->fci * 0.1;
                                                        }else{
                                                            echo 0.00;
                                                        }
                                                    }
                                                }
                                         ?>
                                     </td>
                                     <td>
                                        <?php
                                                foreach($delv as $delvDtls){
                                                    if($delvDtls->mill_id == $mill->mill_id){
                                                        if($delvDtls->cmr_type == 'R'){
                                                            echo $delvDtls->sp * 0.1;
                                                            $tot_raw_rice_delivered_state += $delvDtls->sp * 0.1;
                                                        }else{
                                                            echo 0.00;
                                                        }
                                                    }
                                                }
                                         ?>
                                     </td>
                                     <td>
                                       <?php
                                                foreach($delv as $delvDtls){
                                                    if($delvDtls->mill_id == $mill->mill_id){
                                                        if($delvDtls->cmr_type == 'R'){
                                                            echo $delvDtls->cp * 0.1;
                                                             $tot_raw_rice_delivered_center += $delvDtls->sp * 0.1;
                                                        }else{
                                                            echo 0.00;
                                                        }
                                                    }
                                                }
                                         ?>
                                     </td>
                                     <td><?php
                                                foreach($delv as $delvDtls){
                                                    if($delvDtls->mill_id == $mill->mill_id){
                                                        if($delvDtls->cmr_type == 'R'){
                                                            echo $delvDtls->fci * 0.1;
                                                             $tot_raw_rice_delivered_fci += $delvDtls->sp * 0.1;
                                                        }else{
                                                            echo 0.00;
                                                        }
                                                    }
                                                }
                                         ?>
                                     </td>
                                     <td><?php
                                                foreach($delv as $delvDtls){
                                                    if($delvDtls->mill_id == $mill->mill_id){
                                                        if($delvDtls->cmr_type == 'P'){
                                                            echo $delvDtls->sp * 0.1;
                                                          $tot_boiled_rice_delivered_state += $delvDtls->sp * 0.1;
                                                        }else{
                                                            echo 0.00;
                                                        }
                                                    }
                                                }
                                         ?>        
                                     </td>
                                     <td><?php
                                                foreach($delv as $delvDtls){
                                                    if($delvDtls->mill_id == $mill->mill_id){
                                                        if($delvDtls->cmr_type == 'P'){
                                                            echo $delvDtls->cp * 0.1;
                                                            $tot_boiled_rice_delivered_center += $delvDtls->cp * 0.1;
                                                        }else{
                                                            echo 0.00;
                                                        }
                                                    }
                                                }
                                         ?>
                                     </td>
                                     <td><?php
                                                foreach($delv as $delvDtls){
                                                    if($delvDtls->mill_id == $mill->mill_id){
                                                        if($delvDtls->cmr_type == 'P'){

                                                            echo $delvDtls->fci * 0.1;
                                                            $tot_boiled_rice_delivered_fci += $delvDtls->fci * 0.1;
                                                        }else{
                                                            echo 0.00;
                                                        }
                                                    }
                                                }
                                         ?>
                                     </td>
                                     <td><?php
                                                foreach($remain as $remDtls){
                                                    if($remDtls->mill_id == $mill->mill_id){
														//echo $remDtls->mill_id.'<br>';
														//echo $mill->mill_id.'<br>';
                                                            echo $remDtls->remain * 0.1;
														   
														   // echo $remDtls->remain;
                                                            $tot_remain += $remDtls->remain * 0.1;
                                                    }
                                                }
                                         ?>
                                    </td>
                                </tr>

 
                                <?php        
                                    }  ?>
                                      <tr><td colspan="2" style="text-align: center;">Total</td>
                                      <td><?=$tot_qty_paddy_received?></td>                                  
                                      <td><?=$tot_resultant_cmr?></td>
                                      <td><?=$tot_raw_rice_offered_state?></td>
                                      <td></td>
                                      <td><?=$tot_boiled_rice_offered_state?></td>
                                      <td></td>
                                      <td><?=$tot_raw_rice_do_state ?></td>
                                     <td><?=$tot_raw_rice_do_center ?></td>
                                     <td><?=$tot_raw_rice_do_fci ?></td>
                                     <td><?=$tot_boiled_rice_do_state ?></td>
                                     <td><?=$tot_boiled_rice_do_center ?></td>
                                     <td><?=$tot_boiled_rice_do_fci ?></td>
                                      <td><?=$tot_raw_rice_delivered_state?></td>
                                      <td><?=$tot_raw_rice_delivered_center?></td>
                                      <td><?=$tot_raw_rice_delivered_fci?></td>
                                      <td><?=$tot_boiled_rice_delivered_state?></td>
                                      <td><?=$tot_boiled_rice_delivered_center?></td>
                                      <td><?=$tot_boiled_rice_delivered_fci?></td>
                                      <td><?=$tot_remain?></td>

                                     </tr>

                         <?php       }
                                else{

                                    echo "<tr><td colspan='14' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>
                    </table>

                </div>   
                
                 <div style="text-align: center;">

                    <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                    <button class="btn btn-primary" type="button" id="btnExport" >Excel</button>
                </div>

            </div>
            
        </div>
        
    <?php

    }

    ?> 

     <script type="text/javascript">
        $(function () {
            $("#btnExport").click(function () {
                $("#example").table2excel({
                    filename: "Millwise Incidental Payment Between <?php echo date("d-m-Y", strtotime($this->input->post('from_date'))).' To '.date("d-m-Y", strtotime($this->input->post('to_date')));?>.xls"
                });
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $("#form").on('submit',function(){

                if($("#from_date").val() > $("#to_date").val()){
                    alert("From date must be less than to date!");
                    return false;
                }
            });
        });
    </script>