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
    <div class="span4">
        <div class="control-group">
            <label for="entry_date" class="control-label">Month</label>
            <div class="controls controls-row">
                <?php $arr = array('01'=>'Janauary','02'=>'February','03'=>'March','04'=>'April',
                '05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October',
                '11'=>'November','12'=>'December'); ?>
                <select data-rule-required="true" class="input-large" name="month" id="month">
                    <option value="">Select</option>
                    <?php
                    foreach ($arr as $key => $value) {
                        $sel = '';
                        if($key == $month)
                        {
                            $sel = 'selected = "selected"';
                        }
                        echo '<option '.$sel.' value="'.$key.'">'.$value.'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="span4">
        <div class="control-group">
            <label for="entry_date" class="control-label">Year</label>
            <div class="controls controls-row">
                <select data-rule-required="true" class="input-large" name="year" id="year">
                    <option value="">Select</option>
                    <?php
                    for($intI=2019;$intI<=date('Y');$intI++)
                    {
                        $sel = '';
                        if($intI == $year)
                        {
                            $sel = 'selected = "selected"';
                        }
                        echo '<option '.$sel.' value="'.$intI.'">'.$intI.'</option>';
                    } 
                    ?>
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


<?php
$arr = array();
$arrTotal = array('cash_sale'=>0,'web_sale'=>0,'expences'=>0,'printing'=>0,'lamination'=>0,'paper'=>0);
foreach ($arrData as $key => $value) {

    $arrTotal['cash_sale'] +=  $value['cash_sale'];
    $arrTotal['web_sale'] +=  $value['web_sale'];
    $arrTotal['expences'] +=  $value['expences'];
    $arrTotal['printing'] +=  $value['printing'];
    $arrTotal['lamination'] +=  $value['lamination'];
    $arrTotal['paper'] +=  $value['paper'];

    @$arr[$value['entry_date']]['total']['cash_sale'] += $value['cash_sale'];
    @$arr[$value['entry_date']]['total']['web_sale'] += $value['web_sale'];
    @$arr[$value['entry_date']]['total']['expences'] += $value['expences'];
    @$arr[$value['entry_date']]['total']['printing'] += $value['printing'];
    @$arr[$value['entry_date']]['total']['lamination'] += $value['lamination'];
    @$arr[$value['entry_date']]['total']['paper'] += $value['paper'];
    $arr[$value['entry_date']]['sub'][] = $value;
}
?>
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
            <div class="box-content nopadding">
                <table class="table table-hover table-nomargin table-bordered dataTable-custom dataTable-columnfilter dataTable-tools dataTable-colvis myTable">
                   <thead>
                      <tr class="thefilter">
                        <th>Date</th>
                        <?php if($this->session->userdata('role_id') == '2' || $this->session->userdata('role_id') == '1') { ?>
                            <th>Cash Sale</th> <!-- class="hidden-480" -->
                            <th>Web Sale</th>
                        <?php } ?>
                        <th>Expences</th> <!-- class="hidden-768" -->
                        <?php if($this->session->userdata('role_id') == '3' || $this->session->userdata('role_id') == '1') { ?>
                            <th>Printing</th> <!-- class="hidden-480" -->
                            <th>Lamination</th>
                        <?php } ?>
                        <?php if($this->session->userdata('role_id') == '1') { ?>
                            <th>Paper</th>
                        <?php } ?>
                      </tr>

                      <tr class="thefilter total">
                        <th>Total</th>
                        <?php if($this->session->userdata('role_id') == '2' || $this->session->userdata('role_id') == '1') { ?>
                            <th><?php echo  $arrTotal['cash_sale']; ?></th> <!-- class="hidden-480" -->
                            <th><?php echo  $arrTotal['web_sale']; ?></th>
                        <?php } ?>
                        <th><?php echo  $arrTotal['expences']; ?></th> <!-- class="hidden-768" -->
                        <?php if($this->session->userdata('role_id') == '3' || $this->session->userdata('role_id') == '1') { ?>
                            <th><?php echo  $arrTotal['printing']; ?></th> <!-- class="hidden-480" -->
                            <th><?php echo  $arrTotal['lamination']; ?></th>
                        <?php } ?>
                        <?php if($this->session->userdata('role_id') == '1') { ?>
                            <th><?php 
                                echo   preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$arrTotal['paper']); 
                                ?></th>
                        <?php } ?>
                      </tr>

                   </thead>
                   <tbody>
                    <?php
                    foreach($arr as $k1 => $v1)
                    {
                        echo '<tr class="header" id="'.$k1.'">
                            <td>'.$k1.'</td>';
                            if($this->session->userdata('role_id') == '2' || $this->session->userdata('role_id') == '1') {
                                    echo '<td>'.$v1["total"]["cash_sale"].'</td>
                                          <td>'.$v1["total"]["web_sale"].'</td>';
                             }

                            echo '<td>'.$v1["total"]["expences"].'</td>';

                            if($this->session->userdata('role_id') == '3' || $this->session->userdata('role_id') == '1') { 
                                    echo '<td>'.$v1["total"]["printing"].'</td>
                                          <td>'.$v1["total"]["lamination"].'</td>';
                            }   

                            if($this->session->userdata('role_id') == '1') {
                                echo '<td>'.preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$v1["total"]["paper"]).'</td>';
                            }
                        echo '</tr>';
                        foreach($v1['sub'] as $k2 => $v2)
                        {
                            echo '<tr class="child sub sub_'.$k1.'">
                            <td>'.$v2["code"].'</td>';

                            if($this->session->userdata('role_id') == '2' || $this->session->userdata('role_id') == '1') {
                                    echo '<td>'.$v2["cash_sale"].'</td>
                                          <td>'.$v2["web_sale"].'</td>';
                            }
                            echo '<td>'.$v2["expences"].'</td>';

                            if($this->session->userdata('role_id') == '3' || $this->session->userdata('role_id') == '1') { 
                                    echo '<td>'.$v2["printing"].'</td>
                                          <td>'.$v2["lamination"].'</td>';
                             }
                            if($this->session->userdata('role_id') == '1') {
                                echo '<td>'.preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$v2["paper"]).'</td>';
                            }
                            echo '</tr>';
                        }
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
    $(document).ready(function(){
        $(".header").click(function(){
            var id = $(this).attr('id');
            $(".sub_"+id).toggle();
        });

        $('.datepicker').datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>