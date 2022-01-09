<?php $data = ($this->session->flashdata($this->router->class)); ?>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title two-title">
                <h3> <i class="glyphicon-notes"></i> <?php echo $title; ?>           </h3>
                <a href="<?php echo base_url(). $this->router->class . '/'; ?>"><h3 class="right"><i class="glyphicon-table"></i>View Daily Entries</h3></a>
            </div>
            <div class="box-content nopadding">
                <div class="tab-content padding tab-content-inline tab-content-bottom">
                    <div class="tab-pane active" id="profile">
                        <?php echo form_open($this->router->class."/add", array('class' => 'form-validate form-horizontal', 'id' => 'frm-user', 'name' => 'frm-user','enctype'=>'multipart/form-data')); ?>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="control-group">
                                    <label for="entry_date" class="control-label right">Entry Date</label>
                                    <div class="controls">
                                        <input type="text" name="data[entry_date]" id="entry_date" class='input-xlarge datepicker' data-rule-required="true" placeholder="Entry Date" value="<?php echo (isset($data['entry_date']))?$data['entry_date']:'';?>">
                                    </div>
                                </div>
                                <?php if($this->session->userdata('role_id') == '2') { ?>
                                <div class="control-group">
                                    <label for="cash_sale" class="control-label right">Cash Sale</label>
                                    <div class="controls">
                                        <input type="number" name="data[cash_sale]" id="cash_sale" class='input-xlarge'  data-rule-required="true" placeholder="Cash Sale" value="<?php echo (isset($data['cash_sale']))?$data['cash_sale']:'';?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="web_sale" class="control-label right">Web Sale</label>
                                    <div class="controls">
                                        <input type="number" name="data[web_sale]" id="cash_sale" class='input-xlarge'  data-rule-required="true" placeholder="Web Sale" value="<?php echo (isset($data['web_sale']))?$data['web_sale']:'';?>">
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if($this->session->userdata('role_id') == '3') { ?>
                                <div class="control-group">
                                    <label for="printing" class="control-label right">Printing</label>
                                    <div class="controls">
                                        <input type="number" name="data[printing]" id="cash_sale" class='input-xlarge'  data-rule-required="true" placeholder="Printing" value="<?php echo (isset($data['printing']))?$data['printing']:'';?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="lamination" class="control-label right">Laminiation</label>
                                    <div class="controls">
                                        <input type="number" name="data[lamination]" id="cash_sale" class='input-xlarge'  data-rule-required="true" placeholder="Laminiation" value="<?php echo (isset($data['lamination']))?$data['lamination']:'';?>">
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="control-group">
                                    <label for="expences" class="control-label right">Expences</label>
                                    <div class="controls">
                                        <input type="number" name="data[expences]" id="cash_sale" class='input-xlarge'  data-rule-required="true" placeholder="Expences" value="<?php echo (isset($data['expences']))?$data['expences']:'';?>">
                                    </div>
                                </div>                          
                                <div class="form-actions">
                                     <button type="submit" name="submit" value="submit" class="btn btn-primary">Add Entry</button>
                                    <button type="reset" class="btn">Cancel</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.datepicker').datepicker({
        dateFormat: "yy-mm-dd"
    });
</script>
