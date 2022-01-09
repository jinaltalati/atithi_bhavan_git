<script src="<?php echo base_url(); ?>assets/js/plugins/momentjs/jquery.moment.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/mockjax/jquery.mockjax.js"></script>
        
<script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery.ui.datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/xeditable/bootstrap-editable.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/xeditable/bootstrap-editable.css">

<?php if($type != 'purchase') { ?>
<!--------------------------------- Search Start   --------------------------------->
<div class="box box-color box-bordered">
    <div class="box-title">
    <h3>
        <i class="icon-reorder"></i>
        Search
    </h3>
    <div class="actions">
        <a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-up"></i></a>
    </div>
</div>
<div class="box-content" style="border-top: 2px solid #368ee0; display: none;"> 
<?php echo form_open("", array('class' => 'form-validate form-horizontal', 'id' => 'frm-search')); ?>
<div class="row-fluid ">
    <div class="span3">
        <div class="control-group">
            <label for="trans_date" class="control-label">Date</label>
            <div class="controls controls-row">
                <input type="text" name="trans_date" id="trans_date_1" placeholder="Transaction Date" class="input-block-level datepicker" value="<?php echo $trans_date; ?>" data-rule-required="true">
            </div>
        </div>
    </div>

    <div class="span3">
        <div class="control-group">
            <label for="paper" class="control-label">Paper</label>
            <div class="controls controls-row">
                <select class="input-large" name="paper" id="filter_paper">
                    <option gsm="1" value="">Select</option>
                    <?php 
                        $selPaper = $this->input->post('paper');
                        $tempPaper = array(); 
                        foreach($paper as $k => $v) {
                            $tempPaper[] = $v->gsm.' ('.$v->paper_name.')';
                            $sel = '';
                            if($selPaper == $v->id) {
                                $sel = 'selected';
                            }
                            echo '<option '.$sel.' gsm="'.$v->gsm.'" value="'.$v->id.'">'.$v->gsm.' ('.$v->paper_name.')'.'</option>';
                    }?>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid ">
    <div class="span3">
        <div class="control-group">
            <label for="size" class="control-label">Size</label>
            <div class="controls controls-row">
                <select  class="input-large" name="size" id="filter_size" >
                    <option w="1" h="1" value="">Select</option>
                    <?php 
                    $selSize = $this->input->post('size');
                    $tempSize = array();
                    foreach($size as $k => $v) {
                        $sel = '';
                        if($selSize == $v->id) {
                            $sel = 'selected';
                        }
                        $tempSize[] = $v->size_w.' X '.$v->size_h;
                        echo '<option '.$sel.' w="'.$v->size_w.'" h="'.$v->size_h.'" value="'.$v->id.'">'.$v->size_w.' X '.$v->size_h.'</option>';
                    } ?>
                </select>
            </div>
        </div>
    </div>

    <div class="span2">
        <div class="control-group">
            <label for="size" class="control-label">&nbsp;</label>
            <div class="controls controls-row">
                <button type="submit" name="submit" id="submit" value="Search" class="btn btn-primary">Search</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
</div>
</div>
<!--------------------------------- Search END   --------------------------------->
<br/>
<?php } ?>

<?php 
$allowAdd = '';
if ($this->session->userdata('role_id') != "1" && $type == 'purchase') { 
    $allowAdd = 'style="display:none;"';
}
?>
<div class="box box-color box-bordered" id="addForm" <?php echo $allowAdd; ?> >
<div class="box-content" style="border-top: 2px solid #368ee0;"> 
<?php echo form_open("", array('class' => 'form-validate', 'id' => 'frm-add')); ?>
<div class="row-fluid ">
    <div class="span2">
        <div class="control-group">
            <label for="trans_date" class="control-label">Date</label>
            <div class="controls controls-row">
                <input type="text" name="trans_date" id="trans_date" placeholder="Transaction Date" class="input-block-level datepicker2" value="<?php echo $last_entry_date; ?>" data-rule-required="true">
            </div>
        </div>
    </div>
    <div class="span3">
        <div class="control-group">
            <label for="paper" class="control-label">Paper</label>
            <div class="controls controls-row">
                <select data-rule-required="true" class="input-large" name="paper" id="paper" data-rule-required="true" onchange="calc()">
                    <option gsm="1" value="">Select</option>
                    <?php $tempPaper = array(); 
                        foreach($paper as $k => $v) {
                            $tempPaper[] = $v->gsm.' ('.$v->paper_name.')';
                            echo '<option gsm="'.$v->gsm.'" value="'.$v->id.'">'.$v->gsm.' ('.$v->paper_name.')'.'</option>';
                    }?>
                </select>
            </div>
        </div>
    </div>
    <div class="span1">
        <div class="control-group">
            <label for="press" class="control-label">Press</label>
            <div class="controls controls-row">
                <select data-rule-required="true" class="input-small" name="press" id="press" data-rule-required="true">
                    <option value="">Select</option>
                    <?php
                        $tempPress = array();  
                        foreach($press as $k => $v) {
                            $tempPress[] = $v->press_name;
                        echo '<option value="'.$v->id.'">'.$v->press_name.'</option>';
                    } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="span3">
        <div class="control-group">
            <label for="size" class="control-label">Size</label>
            <div class="controls controls-row">
                <select data-rule-required="true" class="input-large" name="size" id="size" data-rule-required="true"  onchange="calc()">
                    <option w="1" h="1" value="">Select</option>
                    <?php 
                    $tempSize = array();
                    foreach($size as $k => $v) {
                        $tempSize[] = $v->size_w.' X '.$v->size_h;
                        echo '<option w="'.$v->size_w.'" h="'.$v->size_h.'" value="'.$v->id.'">'.$v->size_w.' X '.$v->size_h.'</option>';
                    } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="span1">
        <div class="control-group">
            <label for="color" class="control-label">Color</label>
            <div class="controls controls-row">
                <select data-rule-required="true" class="input-small" name="color" id="color" data-rule-required="true"  >
                    <option value="">Select</option>
                    <option value="Red" style="color: red;">Red</option>
                    <option value="Blue" style="color: blue;">Blue</option>
                    <option value="Green" style="color: green;">Green</option>
                </select>
            </div>
        </div>
    </div>
</div>

<?php if($type == 'sale') { ?>
<div class="row-fluid ">
    <div class="span3">
        <div class="control-group">
            <label for="sale" class="control-label">Sale Qty</label>
            <div class="controls controls-row">
                <input type="text" name="sale" id="sale" placeholder="Sale Qty" class="input-block-level" data-rule-required="true" data-rule-number="true" onkeyup="calcStock()">
            </div>
        </div>
    </div>
    <div class="span3">
        <div class="control-group">
            <label for="opening" class="control-label">Opening</label>
            <div class="controls controls-row">
                <input type="text" name="opening" id="opening" placeholder="Opening" class="input-block-level" data-rule-required="true" data-rule-number="true" onkeyup="calcStock()">
            </div>
        </div>
    </div>
    <div class="span3">
        <div class="control-group">
            <label for="closing" class="control-label">Closing</label>
            <div class="controls controls-row">
                <input type="text" name="closing" id="closing" placeholder="Closing" class="input-block-level" data-rule-required="true" data-rule-number="true" onkeyup="calcStock()">
            </div>
        </div>
    </div>
    <div class="span1">
        <div class="control-group">
            <label for="job_no" class="control-label">Job No</label>
            <div class="controls controls-row">
                <input type="text" name="job_no" id="job_no" placeholder="Job No" class="input-block-level" value="" data-rule-required="true" autocomplete="off">
            </div>
        </div>
    </div>
    <div class="span2">
        <div class="control-group">
            <label for="size" class="control-label">&nbsp;</label>
            <div class="controls controls-row">
                <button type="submit" name="submit" id="submit" value="Add Sale" class="btn btn-primary">Add Sale</button>
            </div>
        </div>
    </div>
</div>
<?php } ?> 
<?php  if($type == 'purchase') { ?>
<div class="row-fluid ">
    <div class="span2">
        <div class="control-group">
            <label for="purchase" class="control-label">Purchase Qty</label>
            <div class="controls controls-row">
                <input type="text" name="purchase" id="purchase" placeholder="Purchase Qty" class="input-block-level" data-rule-required="true" data-rule-number="true" onkeyup="calc()">
            </div>
        </div>
    </div>
    <div class="span2">
        <div class="control-group">
            <label for="rate_lot" class="control-label">Rate (Lot)</label>
            <div class="controls controls-row">
                <input type="text" name="rate_lot" id="rate_lot" placeholder="Rate (Lot)" class="input-block-level" data-rule-required="true" data-rule-number="true" onkeyup="calc()">
            </div>
        </div>
    </div>
    <div class="span2">
        <div class="control-group">
            <label for="rate_per_sheet" class="control-label">Rate/Sheet</label>
            <div class="controls controls-row">
                <input type="text" name="rate_per_sheet" id="rate_per_sheet" placeholder="Rate (Sheet)" class="input-block-level" data-rule-required="true" data-rule-number="true">
            </div>
        </div>
    </div>
    <div class="span2">
        <div class="control-group">
            <label for="total_amt" class="control-label">Total</label>
            <div class="controls controls-row">
                <input type="text" name="total_amt" id="total_amt" placeholder="Total Amount" class="input-block-level" data-rule-required="true" data-rule-number="true">
            </div>
        </div>
    </div>
    <div class="span4">
        <div class="control-group">
            <label for="purchase_from" class="control-label">Purchase From</label>
            <div class="controls controls-row">
                <input type="text" name="purchase_from" id="purchase_from" placeholder="Purchase From" class="input-block-level" data-rule-required="true">
            </div>
        </div>
    </div>
</div>
<div class="row-fluid ">
    <div class="span3">
        <div class="control-group">
            <label for="bill_no" class="control-label">Bill No.</label>
            <div class="controls controls-row">
                <input type="text" name="bill_no" id="bill_no" placeholder="Bill No" class="input-block-level">
            </div>
        </div>
    </div>
    <div class="span3">
        <div class="control-group">
            <label for="gst_percentage" class="control-label">GST (%)</label>
            <div class="controls controls-row">
                <input type="text" name="gst_percentage" id="gst_percentage" placeholder="GST (%)" class="input-block-level" data-rule-required="true" data-rule-number="true">
            </div>
        </div>
    </div>
    <div class="span3">
        <div class="control-group">
            <label for="gst_amt" class="control-label">GST AMT</label>
            <div class="controls controls-row">
                <input type="text" name="gst_amt" id="gst_amt" placeholder="GST AMT" class="input-block-level" data-rule-required="true" data-rule-number="true">
            </div>
        </div>
    </div>
    <div class="span3">
        <div class="control-group">
            <label for="size" class="control-label">&nbsp;</label>
            <div class="controls controls-row">
                <button type="submit" name="submit" id="submit" value="Add Purchase" class="btn btn-primary">Add Purchase</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php echo form_close(); ?>
</div>
</div>


<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title two-title">
                <h3><i class="glyphicon-notes"></i><?php echo $title; ?></h3>
            </div>
            <!---------------------------- TABLE START ------------------------------------>
            <div class="box-content nopadding">
                <table class="table table-hover table-nomargin table-bordered dataTable-custom dataTable-columnfilter dataTable-tools dataTable-colvis userTable">
                    <thead>
                        <tr class='thefilter'>
                            <th>Id</th>
                            <?php if ($type == "purchase") { //$this->session->userdata('role_id') == "1" && ?>
                                <th>Bill#</th>
                                <th>Stock Arrival</th>
                            <?php } else { ?>
                                <th>Job#</th>
                            <?php } ?>
                            <th>Date</th>
                            <th>Paper</th>
                            <th>Press</th>
                            <th>Size</th>
                            <th>Opening</th>
                            <?php if ($type == "purchase") { ?>
                                <th>Purchase</th>
                            <?php } ?>
                            <?php if ($type == "sale") { ?>
                                <th>Sale</th>
                            <?php } ?>
                            <th>Closing</th>
                        <?php if ($this->session->userdata('role_id') == "1") { ?>
                            <th>Rate/sheet</th>
                            <th>Total Amt</th>
                            <?php if ($type == "purchase") { ?>
                                <th>Purchase From</th>
                            <?php } ?>
                        <?php } ?>
                            <!-- <th>Options</th> -->
                        </tr>     
                        <tr>
                            <th>Id</th>
                            <?php if ($type == "purchase") { ?>
                                <th>Bill#</th>
                                <th>Stock Arrival</th>
                            <?php } else { ?>
                                <th>Job#</th>
                            <?php } ?>
                            <th>Date</th>
                            <th>Paper</th>
                            <th>Press</th>
                            <th>Size</th>
                            <th>Opening</th>
                            <?php if ($type == "purchase") { ?>
                                <th>Purchase</th>
                            <?php } ?>

                            <?php if ($type == "sale") { ?>
                                <th>Sale</th>
                            <?php } ?>

                            <th>Closing</th>
                        <?php if ($this->session->userdata('role_id') == "1") { ?>
                            <th>Rate/sheet</th>
                            <th>Total Amt</th>
                            <?php if ($type == "purchase") { ?>
                                <th>Purchase From</th>
                            <?php } ?>
                        <?php } ?>
                            <!-- <th>Options</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sum = 0;
                        foreach ($arrData as $key => $data)
                        {
                            ?>
                            <tr style="color:<?php echo $data->color; ?>;">
                                <td><?php echo  $data->id; ?></td>
                                <td>
                                    <?php if ($type == "purchase") { ?>
                                        <a href="javascript:;" id="bill_no_<?php echo  $data->id; ?>" class="bill_no" data-type="text" data-pk="<?php echo  $data->id; ?>" data-original-title="Enter Bill #"><?php echo (trim($data->bill_no) != '') ? $data->bill_no : 'Bill #'; ?></a>
                                    <?php } else {
                                        echo  $data->job_no; 
                                    }
                                    ?>
                                </td>
                                <?php if ($type == "purchase") { ?>
                                    <td>
                                        <a href="javascript:;" id="stocak_arrival_<?php echo  $data->id; ?>" class="stocak_arrival"  data-type="date" data-viewformat="yyyy-mm-dd" 
                                            
                                         data-pk="<?php echo  $data->id; ?>" data-original-title="Enter Date"><?php echo (trim($data->stock_arrival_date) != '') ? $data->stock_arrival_date : 'Enter Date'; ?></a>
                                    </td>
                                <?php } ?>
                                <td><?php echo  $data->trans_date; ?></td>
                                <td><?php echo  $data->gsm.' ('.$data->paper_name.')'; ?></td>
                                <td><?php echo  $data->press_name; ?></td>
                                <td><?php echo  $data->size_w. ' X '.$data->size_h; ?></td>
                                <td><?php echo  $data->opening; ?></td>
                                <?php if ($type == "purchase") { ?>
                                    <td><?php echo  $data->purchase; ?></td>
                                <?php } ?>

                                <?php if ($type == "sale") { ?>
                                    <td><?php echo  $data->sale; ?></td>
                                <?php } ?>
                                <td><?php echo  $data->closing; ?></td>

                            <?php if ($this->session->userdata('role_id') == "1") { ?>
                                <td><?php echo  $data->rate_per_sheet; ?></td>
                                <td><?php 
                                    echo  $data->total_amt; 
                                    $sum += $data->total_amt;
                                    ?>
                                </td>
                                <?php if ($type == "purchase") { ?>
                                    <td><?php echo  $data->purchase_from; ?></td>
                                <?php } ?>
                            <?php } ?>
                               <!--  <td>
                                    <a href=" <?php echo base_url() . $this->router->class . '/edit/' . $data->id; ?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a> 
                                </td> -->
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <table style="float: right; font-weight: bold; font-size: 15px; margin-top: 1%; margin-right: 2%;">
                    <tr>
                        <td>Total</td>
                        <td><?php echo $sum; ?></td>
                    </tr>
                </table>
            </div>
            <!---------------------------- TABLE END ---------------------------------------->
        </div>
    </div>
</div>
<script type="text/javascript">
    /* Tlfrtip */
    $(document).ready(function() {

        <?php
            if ($this->session->userdata('role_id') != "1" && $type == 'purchase')
            {
                echo "$('#addForm').html('');";
            } 
        ?>

        $('.datepicker').datepicker({
            //dateFormat: "yy-mm-dd" //jQuery Format
            format: "yyyy-mm-dd",//bootstrap
        });

        $('.datepicker2').datepicker({
            //dateFormat: "yy-mm-dd" //jQuery Format
            format: "yyyy-mm-dd", //bootstrap Format
        });

        if ($(".userTable").length > 0) {
            var e = {

                "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('.bill_no').editable({
                           url: '<?php echo base_url(); ?>paperledger/updateBillNo',
                           type: 'text',
                           name: 'bill_no',
                           title: 'Enter Bill#'
                    });

                    $('.stocak_arrival').editable({
                           url: '<?php echo base_url(); ?>paperledger/updateBillNo',
                           type: 'text',
                           name: 'stock_arrival_date',
                           title: 'Enter Date'
                    });
                },

                "aaSorting": [[0,'desc']],sPaginationType: "full_numbers", oLanguage: {sSearch: "<span>Search:</span> ", sInfo: "Showing <span>_START_</span> to <span>_END_</span> of <span>_TOTAL_</span> entries", sLengthMenu: "_MENU_ <span>entries per page</span>"}, sDom: "Tlfrtip", aoColumnDefs: [{bSortable: !1, aTargets: []}], oColVis: {buttonText: "Change columns <i class='icon-angle-down'></i>"}, oTableTools: {sSwfPath: "<?php echo base_url(); ?>/assets/js/plugins/datatable/swf/copy_csv_xls_pdf.swf"}}, t = $(".userTable").dataTable(e);
            $(".dataTables_filter input").attr("placeholder", "Search here...");
            $(".dataTables_length select").wrap("<div class='input-mini'></div>").chosen({disable_search_threshold: 9999999});
            t.columnFilter({sPlaceHolder: "head:after", aoColumns: [ {type: "text"}, {type: "text"},{type: "text"},
                <?php  if($type == 'purchase') { 
                    echo '{type: "text"},';
                }?>
                {type: "select", bCaseSensitive: !0, values: ["<?php echo implode('","',$tempPaper)?>"]},
                {type: "select", bCaseSensitive: !0, values: ["<?php echo implode('","',$tempPress)?>"]},
                {type: "select", bCaseSensitive: !0, values: ["<?php echo implode('","',$tempSize)?>"]},
                {type: "text"},{type: "text"},{type: "text"},{type: "text"},{type: "text"},{type: "text"}]});
            $(".userTable").css("width", "100%")
        }

       



        //editables 
    /*    $('.bill_no').editable({
               url: '<?php echo base_url(); ?>paperledger/updateBillNo',
               type: 'text',
               name: 'bill_no',
               title: 'Enter Bill#'
        });*/

    });

    function calc()
    {
        <?php  if($type == 'purchase') { ?>
            var gsm = $('option:selected',"#paper").attr('gsm');
            var w = $('option:selected',"#size").attr('w');
            var h = $('option:selected',"#size").attr('h');
            var rate_lot = $("#rate_lot").val();

            var rate_per_sheet = (gsm*w*h*rate_lot/3100/500).toFixed(2);
            $("#rate_per_sheet").val(rate_per_sheet);


            var purchase = $("#purchase").val();
            $("#total_amt").val((rate_per_sheet * purchase).toFixed(2));
        <?php } ?>
    }

    function calcStock()
    {
        var opening = $("#opening").val();
        var sale = $("#sale").val();

        $("#closing").val(opening - sale);
    }

    <?php  if($type == 'sale' || true) { ?>
        $("#paper").change(function(){
            getOpening();
        });

        $("#size").change(function(){
            getOpening();
        });

        function getOpening()
        {
            var paper = $("#paper").val();
            var size = $("#size").val();
            var press = $("#press").val();
            $.ajax({
                url: BASE_URL + 'paperledger/getOpening',
                type: 'POST',
                data: {paper:paper,size:size,press:press},
                success: function(data) {
                    var obj = jQuery.parseJSON(data);
                    $("#opening").val(obj.closing);
                    $("#rate_lot").val(obj.rate_lot);
                }
            });
        }
    <?php } ?>

    <?php  if($type == 'purchase') { ?>
        $("#total_amt").change(function(){
            getGstAmt();
        });

        $("#gst_percentage").change(function(){
            getGstAmt();
        });

        function getGstAmt()
        {
            var total_amt = $("#total_amt").val();
            var gst_percentage = $("#gst_percentage").val();

            var gst_amt = (gst_percentage * total_amt / 100).toFixed(2);
            $("#gst_amt").val(gst_amt);
        }

        $("#rate_per_sheet").keyup(function(){
            var purchase = $("#purchase").val();
            var rate_per_sheet = $("#rate_per_sheet").val();
            $("#total_amt").val((rate_per_sheet * purchase).toFixed(2));


            var gsm = $('option:selected',"#paper").attr('gsm');
            var w = $('option:selected',"#size").attr('w');
            var h = $('option:selected',"#size").attr('h');
            //var rate_lot = $("#rate_lot").val();

            var rate_lot = (rate_per_sheet*3100*500/gsm/w/h).toFixed(2);
            //var rate_per_sheet = (gsm*w*h*rate_lot/3100/500).toFixed(2);
            $("#rate_lot").val(rate_lot);


        });
    <?php } ?> 
</script>