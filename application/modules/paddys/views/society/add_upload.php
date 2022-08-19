    <div class="wraper">      

        <div class="col-md-6 container form-wraper">

            <form method="POST" 
                id="form" enctype="multipart/form-data"
                action="<?php echo site_url("paddys/add_new/f_society_upload");?>" >

                <div class="form-header">
                    <h4>Society Detail&nbsp; &nbsp; &nbsp; <a href="<?=base_url()?>societysampledata.csv" download="societysampledata.csv" style="float:right" class="btn btn-danger">
           Download Sample File</a></h4>
                </div>
                

                <div class="form-group row">

                <label for="f_payment_cheque" class="col-sm-2 col-form-label">Society Detail:</label>

                <div class="col-sm-10">

                    <input type="file" name="f_society_detail" class="form-control" required>

                </div>

                </div>

                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Save" />

                    </div>

                </div>

            </form>

        </div>

    </div>

<script>

    $("#form").validate();

</script>

<script>

    $("#form").validate();

    $( ".sch_cd" ).select2();

</script>

<script>

$(document).ready(function(){

    var i = 0;

    $('#dist').change(function(){

        //For District wise Block
        $.get( 

            '<?php echo site_url("paddy/blocks");?>',

            { 

                dist: $(this).val()

            }

        ).done(function(data){

            var string = '<option value="">Select</option>';

            $.each(JSON.parse(data), function( index, value ) {

                string += '<option value="' + value.sl_no + '">' + value.block_name + '</option>'

            });

            $('#block').html(string);

          });

    });

});
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

});
</script>
