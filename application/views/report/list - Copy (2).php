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
<div class="box-content" style="border-top: 2px solid #368ee0;"> 
<?php echo form_open("", array('class' => 'form-validate form-horizontal', 'id' => 'frm-search')); ?>
<div class="row-fluid ">
    <div class="span4">
        <div class="control-group">
            <label for="entry_date" class="control-label">Press</label>
            <div class="controls controls-row">
                <select class="input-large" name="press" id="press">
                    <option value="">Select</option>
                    <?php
                        $tempPress = array();  
                        $selPress = $this->input->post('press');
                        foreach($press as $k => $v) {
                            $selected = '';
                            if($v->id == $selPress)
                            {
                                $selected = 'selected';
                            }
                            $tempPress[$v->id] = $v->press_name;
                        echo '<option '.$selected.' value="'.$v->id.'">'.$v->press_name.'</option>';
                    } ?>
                </select>
            </div>
        </div>
    </div>

    <div class="span4">
        <div class="control-group">
            <label for="size" class="control-label">Size</label>
            <div class="controls controls-row">
                <select class="input-large" name="size" id="size">
                    <option value="">Select</option>
                    <?php
                        $tempSizes = array();  
                        $selSize = $this->input->post('size');
                        foreach($sizes as $k => $v) {
                            $selected = '';
                            if($v->id == $selSize)
                            {
                                $selected = 'selected';
                            }
                            $tempSizes[$v->id] = $v->size_w.' X' .$v->size_h;
                        echo '<option '.$selected.' value="'.$v->id.'">'.$v->size_w.' X '.$v->size_h.'</option>';
                    } ?>
                </select>
            </div>
        </div>
    </div>

    <div class="span4">
        <div class="control-group">
            <label for="paper" class="control-label">Paper</label>
            <div class="controls controls-row">
                <select class="input-large" name="paper" id="paper">
                    <option value="">Select</option>
                    <?php
                        $tempPapers = array();  
                        $selPaper = $this->input->post('paper');
                        foreach($papers as $k => $v) {
                            $selected = '';
                            if($v->id == $selPaper)
                            {
                                $selected = 'selected';
                            }
                            $tempPapers[$v->id] = $v->paper_name;
                        echo '<option '.$selected.' value="'.$v->id.'">'.$v->paper_name.'('.$v->gsm.') </option>';
                    } ?>
                </select>
            </div>
        </div>
    </div>

   <div class="span3">
        <div class="control-group">
            <label for="trans_date" class="control-label">Date</label>
            <div class="controls controls-row">
                <input type="text" name="trans_date_1" id="trans_date_1" placeholder="Transaction Date" class="input-block-level datepicker" value="<?= $trans_date_1; ?>">
            </div>
        </div>
    </div>

   <div class="span3">
        <div class="control-group">
            <div class="controls controls-row">
                <input type="text" name="trans_date_2" id="trans_date_2" placeholder="Transaction Date" class="input-block-level datepicker" value="<?= $trans_date_2; ?>">
            </div>
        </div>
    </div>

    <div class="span2">
        <div class="control-group">
            <label for="size" class="control-label">&nbsp;</label>
            <div class="controls controls-row" style="width: 100%;">
                <button type="submit" name="submit" id="submit" value="Search" class="btn btn-primary">Search</button>

                <button type="button" name="print" id="print" value="Print" class="btn btn-primary">Print</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
</div>
</div>
<!--------------------------------- Search END   --------------------------------->

<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title two-title">
                <h3><i class="glyphicon-notes"></i><?php echo $title; ?></h3>
                <?php if($this->session->userdata('role_id') != '1') { ?>
                    <a href="<?php echo base_url(). $this->router->class . '/add/'; ?>"><h3 class="right"><i class="icon-plus"></i>Add Entry</h3></a>
                <?php } ?>
            </div>
            <!---------------------------- TABLE START ------------------------------------>
            <div id="printArea" class="box-content nopadding">
                <h2 style="text-align: center;"><?php echo $tempPress[$selPress]; ?></h2>
                <table class="table table-hover table-nomargin table-bordered dataTable-custom dataTable-columnfilter dataTable-tools dataTable-colvis myTable">
                   <thead>
                      <tr class="thefilter">
                        <th>#</th>
                        <th>Size</th>
                        <th>Product Name</th>
                        <th>Transaction Date</th>
                        <th>Opening</th>
                        <th>Sale</th>
                        <th>Purchase</th>
                        <th>Closing</th>
                        <?php if(true || $this->session->userdata('role_id') == '1') { ?>
                            <th>Job #</th>
                        <?php } ?>
                      </tr>
                   </thead>
                   <tbody>
                    <?php
                    foreach($rows as $k1 => $v1)
                    {
                        echo '<tr class="header" id="'.$k1.'">';
                            echo '<td>'.($k1+1).'</td>';
                            echo '<td>'.$sizes[$v1['size']]->size_w.' X '.$sizes[$v1['size']]->size_h.'</td>';
                            echo '<td>'.$papers[$v1['paper']]->paper_name.' ('.$papers[$v1['paper']]->gsm.')'.'</td>';
                            echo '<td>'.$v1['trans_date'].'</td>';
                            echo '<td>'.$v1['opening'].'</td>';
                            echo '<td>'.$v1['sale'].'</td>';
                            echo '<td>'.$v1['purchase'].'</td>';
                            echo '<td>'.$v1['closing'].'</td>';
                            if(true || $this->session->userdata('role_id') == '1') {
                                echo '<td>'.$v1['job_no'].'</td>';
                            }
                        echo '</tr>';
                    }
                    ?>
                   </tbody>
                </table>
            </div>
            <!---------------------------- TABLE END ---------------------------------------->
        </div>
    </div>
</div>

<style type="text/css">
    .table.dataTable .sorting,
    .table.dataTable .sorting_asc {
        background : none;
        background-color: #eee;
    }
    .sub { display: none;}

    tr td {background: #fff;}
    tr.child td {background: #eeeeee;}

    tr.total th {background-color: #368ee0 !important; color: #fff !important;}
</style>

<script type="text/javascript">
    function printDiv(divName) {
         var printContents = document.getElementById(divName).innerHTML;
         var originalContents = document.body.innerHTML;

         document.body.innerHTML = printContents;

         window.print();

         document.body.innerHTML = originalContents;
    }
    $(document).ready(function(){
        $(".header").click(function(){
            var id = $(this).attr('id');
            $(".sub_"+id).toggle();
        });

        $("#print").click(function(){
            printDiv('printArea');
        });

        $('.datepicker').datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>