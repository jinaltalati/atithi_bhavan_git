<?php $data = ($this->session->flashdata($this->router->class)); ?>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title two-title">
                <h3> <i class="glyphicon-notes"></i> <?php echo $title; ?>           </h3>
                <a href="<?php echo base_url(). $this->router->class . '/'; ?>"><h3 class="right"><i class="glyphicon-table"></i>View Paper</h3></a>
            </div>
            <div class="box-content nopadding">
                <div class="tab-content padding tab-content-inline tab-content-bottom">
                    <div class="tab-pane active" id="profile">
                        <?php echo form_open($this->router->class."/add", array('class' => 'form-validate form-horizontal', 'id' => 'frm-user', 'name' => 'frm-user','enctype'=>'multipart/form-data')); ?>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="control-group">
                                    <label for="paper_name" class="control-label right">Paper Name</label>
                                    <div class="controls">
                                        <input type="text" name="data[paper_name]" id="paper_name" class='input-xlarge'  data-rule-required="true" placeholder="Paper Name" value="<?php echo (isset($data['paper_name']))?$data['paper_name']:'';?>">
                                    </div>
                                </div>  
                                <div class="control-group">
                                    <label for="gsm" class="control-label right">GSM</label>
                                    <div class="controls">
                                        <input type="text" name="data[gsm]" id="gsm" class='input-xlarge'  data-rule-required="true" data-rule-number="true" placeholder="GSM" value="<?php echo (isset($data['gsm']))?$data['gsm']:'';?>">
                                    </div>
                                </div>   
                                 <div class="control-group">
                                    <label for="seq" class="control-label right">Sequence No.</label>
                                    <div class="controls">
                                        <input type="number" name="data[seq]" id="seq" class='input-xlarge'  data-rule-required="true" placeholder="Sequence No" value="<?php echo (isset($data['seq']))?$data['seq']:'';?>">
                                    </div>
                                </div>                    
                                <div class="form-actions">
                                     <button type="submit" name="submit" value="submit" class="btn btn-primary">Add Paper</button>
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