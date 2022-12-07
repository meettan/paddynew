<script>
function printDiv() {

    var divToPrint = document.getElementById('divToPrint');
	var stylesheet = '<?=base_url();?>assets/css/bootstrap.min.css';
    var WindowObject = window.open('', 'Print-Window');
    WindowObject.document.open();
    WindowObject.document.writeln('<!DOCTYPE html>');
    WindowObject.document.writeln('<html><head><title>Test Print</title><style type="text/css">');

    //	  	WindowObject.document.writeln('');
    WindowObject.document.writeln('@media print { .center { text-align: center;}' +
        'body{font-family:Arial, Tahoma, Verdana;font-size: 14px;color: #6f7479;}' +
        '.wrapper{box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); max-width: 900px; width: 100%; margin: 0 auto; font-family:Arial, Tahoma, Verdana; }' +
        '.billPrintWrapper{padding: 15px; color: #333;}' +
        '.billPrintWrapper p {color: #333; font-family:Arial, Tahoma, Verdana; font-size: 16px; margin: 0 auto; padding: 0 0 20px 0; line-height: 29px;}' +
        '.billPrintWrapper p.subTxt{text-align: center; font-weight: 700;font-size: 20px;}' +
        '.checkBox{display: inline-block; border: #333 solid 1px; width: 40px; height: 40px;}' +
        '.billPrintWrapper p.txtPaddingBot{padding-bottom: 45px;}' +
        '.billPrintWrapper .printBottom{margin:80px 0 0 0; padding: 0 15px; width: 100%; display: inline-block;}' +
        '.billPrintWrapper .printBottom .col-md-3{width: 100%; max-width: 25%; padding: 0 0; float: left; box-sizing: border-box;}' +
        '} </style>');
    WindowObject.document.writeln('</head><body onload="window.print()">');
    WindowObject.document.writeln(divToPrint.innerHTML);
    WindowObject.document.writeln('</body></html>');
    WindowObject.document.close();
    setTimeout(function() {
        WindowObject.close();
    }, 10);

}
</script>
<div class="wraper">
<input type="button" class="btn btn-danger" onclick="printDiv('print_emp')" value="Print" style="float:right">
<div id="divToPrint">
    
    <div class="col-md-12 container form-wraper" style="height:1600px;" id="print_emp">

        <div style="width: 100%; height: 842px; padding-top:142px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td
                            style="text-align: left; padding: 10px 10px 25px 10px; font-family: arial; font-size: 15px;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td width="80%" valign="top">
                                            <p style="margin: 0; padding: 0; line-height: 18px;">Ref. No. <strong
                                                    style="text-transform: uppercase;"><?=$workorder_dtls->pre_order_no;?><?=$workorder_dtls->order_no;?></strong>
                                            </p>
                                        </td>
                                        <td valign="top">
                                            <p style="margin: 0; padding: 0; line-height: 18px;">Date:
                                                <strong><?php echo date('d/m/Y',strtotime($workorder_dtls->trans_dt)); ?></strong>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" valign="top" style="padding-top: 22px;">
                                            <p style="margin: 0; padding: 0; line-height: 20px;">To <br>

                                                The Chairman/Special/Manager,<br>

                                                <strong><?php echo $workorder_dtls->soc_name;?></strong>
                                            </p>
                                        </td>
                                        <td valign="top">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="text-align: center; padding: 10px; font-family: arial; font-size: 15px; border-bottom:#eee8e8 solid 1px; border-top:#eee8e8 solid 1px; background: #eee;">
                            <p style="margin: 0; padding: 0; line-height: 22px; font-size: 17px;">
                                <strong>Subject:</strong> Work Order in respect of Procurement of Paddy for the KMS:
                                <?php if(isset($this->session->userdata['loggedin']['kms_yr'])){ echo $this->session->userdata['loggedin']['kms_yr'];}?>
                                through BENFED,
                                <strong><?php if(isset($this->session->userdata['loggedin']['branch_name'])){ echo $this->session->userdata['loggedin']['branch_name'];}?></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top"
                            style="text-align: left; padding: 10px 10px 10px 10px; font-family: arial; font-size: 15px;">
                            <p style="font-size: 15px; line-height: 20px; 
			margin: 0 0 20px 0; padding: 0;">Madam/ Dear Sir, <br><br>

                                In reference of the Order No. 4328-FS/Sectt./Food/4P-17/2022 (Pt. I) dated 04/11/2022
                                and instructions of the Food
                                &amp; Supplies Department, Government of West Bengal and tripartite agreement (No.
                                ________________) executed by
                                your Cooperative Society, you are requested to procure FAQ paddy of common variety under
                                the Decentralized
                                Procurement operation of the Government under KMS:
                                <?php if(isset($this->session->userdata['loggedin']['kms_yr'])){ echo $this->session->userdata['loggedin']['kms_yr'];}?>.
                                FAQ paddy of common variety is to be procured at
                                MSP <em> i.e. </em>Rs.
                                <strong><?php if(isset($workorder_dtls->per_qui_rate)){ echo $workorder_dtls->per_qui_rate; }?>/quintal</strong>
                                from your members and other bona fide farmers upto the quantity of
                                <strong><?php echo $workorder_dtls->paddy_qty;?></strong> Quintal by organization of
                                camps and paddy thus procured is to be
                                delivered to authorized representative of
                                <strong><?php echo $workorder_dtls->mill_name;?></strong> at the purchase camp. The
                                value of
                                paddy as Minimum Support Price would be paid by BENFED to the farmers by NEFT.
                            </p>
                             
                            <p
                                style="font-size: 15px; line-height: 20px; font-size:15px; margin:0 0 15px 0; padding: 0;">
                                <strong>The following terms and condition should strictly be adhered to in respect of
                                    paddy procurement:- </strong></p>
                            <ol style="margin: 0; padding: 0 0 0 15px;">
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">The entire procurement
                                    operation would be guided by the instructions of the Government and provisions of
                                    the tripartite agreement executed.<strong> Society must be sure about the paddy
                                        sellers being genuine farmers.</strong></li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">As advised by the Food &
                                    Supplies department, Govt. of West Bengal, each farmer can sell a maximum of
                                    <strong>45 quintal paddy during the entire KMS including all centers i.e. CPCs,
                                        Societies, Farmers Producer Company, Self Help Group.</strong> In order to
                                    accommodate maximum number of small and marginal farmers, District Level Monitoring
                                    Committee (DLMC) may re-fix the upper limit at one go, which has to be abided by the
                                    Society.</li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;"><strong>BENFED district
                                        office must be informed at least TWENTY DAYS before the conduct of the camp so
                                        that the details of the camp be entered by BENFED</strong> in the procurement
                                    portal,<strong> failing which procurement data entry would not be possible by the
                                        Society. Locations of the camps shall not be confined to the Society’s office
                                        premises only and shall preferably be organized at various locations.</strong>
                                </li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;"><strong>Intense publicity
                                        prior to the conduct</strong> of the procurement camp must be done by means of
                                    <strong>display board/ banner (depicting Society name, BENFED’s name, camp date,
                                        place, MSP, FAQ)</strong> at the camp site and other prominent places,<strong>
                                        mobile miking</strong> etc. at the camp site and other prominent places. The
                                    Procurement Centres shall also have a display
                                    containing the name, designation and office addresses of the members of the three
                                    men’s committee on paddy
                                    procurement.</li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">Society must <strong>inform
                                        in writing at least FIFTEEN days before organization of the procurement
                                        camp</strong> to the concerned Block Development Officer, local Police Station,
                                    Block Inspector of Co-operative Societies, Inspector (F&S), Gram Panchayat and other
                                    concerned parties in respect of procurement of Paddy.</li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">For the purpose of smooth
                                    and uninterrupted operation, <strong>all purchase centers will remain open and
                                        functional on
                                        all working days from 9:00 AM to 3:00 PM, normally.</strong> However, as per the
                                    need and for convenience of the
                                    farmers, the purchase center may operate beyond 3 PM so that all scheduled farmers
                                    may be accommodated.<strong> The
                                        purchase centers shall remain closed on Sundays and Government
                                        holidays.</strong> But, during peak period of paddy
                                    procurement, the Food &amp; Supplies Department may issue order to purchase paddy
                                    during Holidays and Sundays in
                                    order to prevent distress sale of paddy.</li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">Society must
                                    <strong>maintain a Register</strong> for recording farmer’s name, farmer’s
                                    Identification Number (AADHAAR and Electors Photo Identity Card), Registration
                                    Number & procurement detail and also <strong>preserve photocopy</strong> of AADHAAR,
                                    Electors Photo Identity Card (EPIC), Bank passbook, land documents duly certified by
                                    the farmer, originals of Annexure I or II of the Procurement Order, if applicable.
                                </li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">Society has to take utmost
                                    care to enter <strong>only THE CORRECT procurement related information</strong>
                                    (AADHAAR and EPIC
                                    number, Bank Account number, paddy quantum purchased) in the online ePaddy
                                    Procurement Portal by <strong>logging</strong>
                                    into https://procurement.wbfood.in by means of the user ID and password provided by
                                    the Food &amp; Supplies
                                    Department <strong>so that further rectification need not be done.</strong> Purchase
                                    transactions in the portal shall be made <strong>only
                                        from the physical locations of the camps</strong> so scheduled. AADHAAR, EPIC
                                    and Bank Passbook <strong>must be verified for
                                        entering the correct data. Password must be kept as secret and changed at
                                        regular interval</strong> through mobile OTP
                                    authentication. Purchase Officer shall ensure that all the paddy purchase
                                    transactions are entered in the portal
                                    immediately after the transaction is complete on the same day. In case of any data
                                    entry of particulars of the
                                    farmer and/or upload of any false or fabricated document with mala fide intention,
                                    the Paddy Purchase Officer will
                                    be held personally responsible and Proceedings will be initiated and penal action
                                    will be taken as per the law for
                                    such wrongdoings.</li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">The farmers who are already
                                    registered in the portal need not re-register. New farmers may register at any of
                                    the
                                    CPCs, Office of the Inspectors, F&amp;S Deptt., BSKs located in all Blocks of his
                                    district as well as by himself through the
                                    portal/ mobile app / WhatsApp chatbot (9903055505). The Purchase Officer may help
                                    farmers in this regard. The
                                    farmers who are registered in the &#39;Krishak Bandhu&#39; Scheme need not produce
                                    any land documents. They need to
                                    produce their EPIC, AADHAAR, photograph and the Bank passbook for registration. The
                                    farmers who are yet to get
                                    themselves registered in the &#39;Krishak Bandhu&#39; Scheme may produce their land
                                    documents with details of
                                    ownership or self-declaration with details of cultivated land, along with their
                                    EPIC, AADHAAR, photograph and the
                                    Bank passbook for registration in the procurement portal.</li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">Society has to issue
                                    <strong>Registration Certificate after printing</strong> the same after verification
                                    of the necessary required
                                    documents like EPIC, AADHAAR, Bank Passbook and land documents, <strong>write paddy
                                        procurement details</strong> on the <strong>reverse side</strong> of the
                                    Certificate and <strong>provide Procurement Receipt</strong> to the beneficiary
                                    farmers immediately after
                                    procurement of Paddy.</li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">Registered Farmers can fix
                                    their own date/ schedule online for selling paddy at any purchase center in the
                                    district
                                    (CPC/DPC/ camps of PACS/LAMPS/SHG/FPO etc.) in the procurement portal or through
                                    mobile app/ WhatsApp
                                    Chatbot.<strong> The farmer can select any day within next 30 calendar days for the
                                        CPC/DPCs and 15 days for the camps
                                        of PACS/SHG/FPO/ FPCs except holidays and Sundays.</strong></li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">Paddy Purchase Officer of
                                    the Society <strong>can fix only 5 schedules (i.e. emergent spot schedule) per
                                        day</strong>, on the
                                    grounds of emergent scenarios like <strong>Medical treatment, Children&#39;s
                                        education, marriage ceremony or on the
                                        recommendation of public representative/ Govt. official like
                                        BDO/SDO/ADM/DM.</strong> In such cases, PO/DO has to
                                    <strong>mention the reason behind such emergent scheduling by selecting the reason
                                        from the drop down menu and
                                        upload relevant proper document(s).</strong>
                                </li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">If the farmer fails to turn
                                    up to sell his paddy on the scheduled day, s/he can be able to fix schedule again
                                    but only
                                    after 7 days after the date of previous schedule. However, s/he can change his
                                    schedule at least 3 days before the
                                    date fixed earlier to any next available date. However, these changes/rescheduling
                                    are subject to the available
                                    dates </li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">Society has to keep
                                    properly calibrated Electronic Weighing Balance and Moisture Meter at the Camp
                                    site,<strong> record
                                        and preserve the result of quality analysis of paddy</strong> procured from the
                                    farmers.</li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;"><strong>Muster Roll is to
                                        be prepared in triplicate and signed, uploaded in the portal on the day of
                                        procurement</strong> and
                                    hard copies submitted to BENFED district office.</li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">Paddy thus procured should
                                    be delivered to Rice Mill through issuance of system generated Paddy Challan and a
                                    certificate on <strong>proof of received Paddy</strong> duly signed by the
                                    appropriate authority is required to submit to BENFED.
                                    While entering the vehicle number, the <strong>Paddy Purchase Officer shall verify
                                        the type of vehicle (goods carrier)
                                        from the m-parivahan mobile app or portal (https://parivahan.gov.in).</strong>
                                </li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">The Purchase Officers shall
                                    coordinate with the tagged Rice Mill in advance regarding the time, date and place
                                    of
                                    reporting of the vehicle at the purchase centers concerned including the camps. Any
                                    incidences like failure of a
                                    Rice Miller to turn up in the Purchase Center for lifting of paddy etc. are to be
                                    promptly informed to the District
                                    Manager, BENFED so that remedial measures may be taken in time.</li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">In view of the
                                    <strong>COVID-19 pandemic situation</strong>, the society would take
                                    <strong>necessary precautionary measures at the
                                        procurement camps</strong> as per government instructions. These would include
                                    giving <strong>awareness message,
                                        maintenance of physical distancing</strong>, arrangement of adequate
                                    <strong>face mask</strong>, hand sanitizer, <strong>hand wash/ soap</strong> etc. at
                                    the site of the camp. There should be shed and facility of drinking water at the
                                    procurement camp.</li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">In case of any
                                    misappropriation of paddy, appropriate legal action will be taken against the
                                    Society which includes
                                    lodging of FIR or the departmental proceedings, termination of contract or agreement
                                    etc. as the case may be
                                    against errant management and/or officials of the Cooperative Society and/or Rice
                                    Miller.</li>
                            </ol>
                            <p style="line-height: 20px; margin: 0; padding: 0;">If you do not agree with above
                                mentioned terms and condition, along with the quote for procurement of Paddy in
                                your favor, please inform in writing to the undersigned within a week from the date of
                                issue of the work order, so that
                                quota allotted in your favour can be reallocated to other interested Co-operative
                                Societies. Treat the matter as
                                extremely urgent and do the needful. Receipt of the work order be acknowledged.</p>
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <td
                            style="text-align: left; padding: 35px 10px 5px 10px; font-family: arial; font-size: 15px; ">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td width="80%" valign="bottom">
                                            <p style="margin: 0; padding: 0; line-height: 20px; font-size: 15px;">
                                                Memo. No. <strong
                                                    style="text-transform: uppercase;"><?=$workorder_dtls->pre_order_no;?><?=$workorder_dtls->order_no;?>(4)</strong><br>
                                            </p>
                                        </td>


                                        <td valign="top">
                                            <p style="margin: 0; padding: 0; font-size: 15px; line-height: 20px;">
                                                District Manager <br>
                                                BENFED,
                                                <strong><?php if(isset($this->session->userdata['loggedin']['branch_name'])){ echo $this->session->userdata['loggedin']['branch_name'];}?></strong> Branch.
                                                <br>

                                                Date:
                                                <strong><?php echo date('d/m/Y',strtotime($workorder_dtls->trans_dt)); ?></strong>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="80%" valign="top" style="padding-bottom: 5px;">
                                            <p style="margin: 0; padding: 0; line-height: 20px; font-size: 15px;">


                                        </td>


                                        <td valign="top">
                                            <p style="margin: 0; padding: 0; font-size: 15px; line-height: 20px;">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding: 10px; font-family: arial; font-size: 15px;">
                            <p style="line-height: 20px; margin: 0; 
			padding: 0 0 8px 0;"><strong>Copy Forwarded for kind information and necessary action to:-</strong></p>
                            <ol style="margin: 0; padding: 0 0 0 15px;">
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">Additional District
                                    Magistrate (Food),
                                    <?php if(isset($this->session->userdata['loggedin']['branch_name'])){ echo $this->session->userdata['loggedin']['branch_name'];}?>
                                    district</li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">The Deputy/ Assistant
                                    Registrar of Cooperative Societies,
                                    <strong><?php if(isset($this->session->userdata['loggedin']['branch_name'])){ echo $this->session->userdata['loggedin']['branch_name'];}?></strong>
                                    Range.&#9; </li>
                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">The District Controller of
                                    Food & Supplies,
                                    <strong><?php if(isset($this->session->userdata['loggedin']['branch_name'])){ echo $this->session->userdata['loggedin']['branch_name'];}?></strong> district
                                </li>

                                <li style="padding: 0 0 10px 0; margin: 0; font-size: 15px;">Sri/ Smt.
                                    ______________________________________, <?php echo $workorder_dtls->mill_name;?>
                                    Rice Mill
                                    Pvt. Ltd. S/he is requested to carry out her/ his duties and responsibilities as per
                                    Order No. 4328-
                                    FS/Sectt./Food/4P-17/2022 (Pt. I) dated 04/11/2022 and instructions of the Food
                                    &amp; Supplies Department,
                                    Government of West Bengal, the West Bengal Custom Milled Rice (Obligation &amp;
                                    Control) Order, 2015 and
                                    tripartite agreement executed for the KMS: 2022-23. S/he is further requested for
                                    the supply the required
                                    equipment, remain present or send authorized representative at the procurement camp
                                    and arrange
                                    labourers, appropriate transport vehicles etc. to receive the paddy procured on the
                                    day itself from the paddy
                                    procurement camp to the tagged rice mill and extend necessary cooperation to the
                                    procuring Cooperative
                                    Society such that social distancing and other safety measures may be taken. The
                                    paddy received must be
                                    accepted online by logging into the ePaddy Procurement portal within 24 hours from
                                    the date of occurrence
                                    of the camp and physical receipt of paddy. Also s/he is requested to mill paddy as
                                    per Government
                                    instruction and tripartite agreement so that ‘Offer’ and ‘Delivery’ of the entire
                                    resultant CMR is completed
                                    within the stipulated time frame.</li>
                            </ol>
                            <!--  <p style="line-height: 20px; font-size: 15px; margin: 0; padding: 0;">Sri/ Smt. ______________________________________,<?php echo $workorder_dtls->mill_name;?>. He/She is requested to supply the required equipment, remain present or send authorized representative at the procurement camp and arrange to receive the paddy procured on the day itself from the camp to your tagged rice mill. Also you are requested to mill paddy as per Government instruction and tripartite agreement so that &#8216;Offer&#8217; and &#8216;Delivery&#8217; of the entire resultant CMR is completed within the stipulated time.</p> -->




                        </td>
                    </tr>
                    <tr>
                        <td
                            style="text-align: left	; padding: 35px 10px 10px 10px; font-family: arial; font-size: 15px;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td width="80%" valign="top" style="padding-bottom: 25px;">
                                            <p style="margin: 0; padding: 0; line-height: 20px; font-size: 15px;">&nbsp;
                                            </p>
                                        </td>
                                        <td valign="top">
                                            <p style="margin: 0; padding: 0; font-size: 15px; line-height: 20px;">
                                                District Manager<br>
                                                BENFED,
                                                <strong><?php if(isset($this->session->userdata['loggedin']['branch_name'])){ echo $this->session->userdata['loggedin']['branch_name'];}?></strong>
                                                Branch. </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

								</div>
</div>