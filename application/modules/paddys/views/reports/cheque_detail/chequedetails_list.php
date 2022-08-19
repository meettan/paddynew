<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid #dddddd;

    padding: 6px;

    font-size: 14px;
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
        WindowObject.document.writeln('<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title></title><style type="text/css">');


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




    

        <div class="wraper"> 

            <div class="col-lg-12 container contant-wraper">
                
                <div id="divToPrint">

                    <div style="text-align:center;">

                        <h2>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h2>
                        <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
                        <h4>Cheque status for paddy procurement between <?php echo date("d-m-Y", strtotime($this->input->post('from_date'))).' To '.date("d-m-Y", strtotime($this->input->post('to_date')));?></h4>
                        <h4> <label>Branch name:</label>  <?php echo get_district_name($this->input->post("branch_id")) ?></h4>

                    </div>
                    <br>  


                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>

                                <th>Transaction Date</th>

                                <th>Society Name</th>

                                <th>Bank</th>

                                <th>Reg No</th>

                                <th>Name as in registration</th>
                            <!--     
                                <th>Name as in cheque</th> -->

                                <th>Qty</th>

                                <th>Procured amount</th>
                                
                              <!--   <th>Cheque amount</th> -->

                                <th>Cheque No</th>

                                <th>Cleared Date</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($chequedetails){ 

                                    $i = 1;
                                    $qty = 0;
                                    $procured_amount = 0;
                                    $cheque_amount = 0;

                                    foreach($chequedetails as $chequedetail){

                            ?>

                                <tr>
                                     <td><?php echo $i++; ?></td>
                                     <td><?php echo date('d/m/Y',strtotime($chequedetail->trans_dt)); ?></td>
                               
                                     <td><?php echo $chequedetail->soc_name; ?></td>
                                  
                                     <td><?php  
                                     if($chequedetail->bank_sl_no > 0 && $chequedetail->bank_sl_no < 20){

                                          echo "YES BANK";
                                     } ?></td>
                                  
                                     <td><?php echo $chequedetail->reg_no; ?></td>
                                     <td><?php echo get_farmer_name($this->session->userdata['loggedin']['kms_id'],$chequedetail->reg_no);?></td>
                                  <!--    <td><?php echo substr($chequedetail->trans_description,12);?></td> -->
                                     <td><?php echo $chequedetail->quantity;  
                                                   $qty += $chequedetail->quantity;

                                     ?></td>
                                     <td><?php echo $chequedetail->amount; 

                                                    $procured_amount += $chequedetail->amount;

                                     ?> </td>
                                   <!--   <td><?php echo $chequedetail->amountc;

                                                 $cheque_amount += $chequedetail->amountc;

                                      ?>  </td> -->
                                     <td><?php echo $chequedetail->cheque_no; ?> </td>
                                     <td><?php echo date('d/m/Y',strtotime($chequedetail->chq_clg_dt));?></td>
                                   
                                    </tr>
 
                                <?php    } ?>

                             <tr>
                             	  <td colspan="6" style="text-align: center;">Total</td><td><?=$qty?></td>
                                  <td><?=$procured_amount?></td><td><!-- <?=$cheque_amount?> --></td><td></td>

                             </tr>

                                <?php 
                                       }
                                else{

                                    echo "<tr><td colspan='14' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>

                    <!--<div  class="bottom">
                        
                        <p style="display: inline;">Prepared By</p>

                        <p style="display: inline; margin-left: 8%;">Establishment, Sr. Asstt.</p>

                        <p style="display: inline; margin-left: 8%;">Assistant Manager-II</p>

                        <p style="display: inline; margin-left: 8%;">Chief Executive officer</p>

                    </div>-->

                </div>   
                
                <div style="text-align: center;">

                    <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                    <button class="btn btn-primary" type="button" id="btnExport" >Excel</button>

                </div>

            </div>
            
        </div>
        
    <script type="text/javascript">
        $(function () {
            $("#btnExport").click(function () {
                $("#example").table2excel({
                    filename: "Cheque status for <?php echo get_district_name($this->input->post("branch_id")) ?> branch for paddy procurement between Block Societywise Paddy Procurement Between <?php echo date("d-m-Y", strtotime($this->input->post('from_date'))).' To '.date("d-m-Y", strtotime($this->input->post('to_date')));?>.xls"
                });
            });
        });
    </script>