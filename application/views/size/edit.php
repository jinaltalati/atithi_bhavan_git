<script src="<?php echo base_url(); ?>assets/js/plugins/fileupload/bootstrap-fileupload.min.js"></script>
<?php $data = ($this->session->flashdata($this->router->class)); ?>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title two-title">
                <h3> <i class="glyphicon-notes"></i> <?php echo $title; ?>           </h3>
                <?php if (strpos($this->uri->uri_string, 'admins/edit') !== false){ ?>
                <a href="<?php echo base_url() .''. $this->router->class . '/'; ?>"><h3 class="right"><i class="glyphicon-table"></i>View Size</h3></a>
                <?php } ?>
            </div>
            <div class="box-content nopadding">
                <div class="tab-content padding tab-content-inline tab-content-bottom">
                    <div class="tab-pane active" id="profile">
                        <?php echo form_open($this->router->class."/edit/".$arrData->id, array('class' => 'form-validate form-horizontal', 'id' => 'frm-user', 'name' => 'frm-user','enctype'=>'multipart/form-data')); ?>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="control-group">
                                    <label for="size_w" class="control-label right">Size Name</label>
                                    <div class="controls">
                                        <input type="text" name="data[size_w]" id="size_w" class='input-xlarge' data-rule-required="true" placeholder="Width" value="<?php echo $arrData->size_w?>"> X 
                                        <input type="text" name="data[size_h]" id="size_h" class='input-xlarge' data-rule-required="true" placeholder="Height" value="<?php echo $arrData->size_h?>">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label for="seq" class="control-label right">Sequence No.</label>
                                    <div class="controls">
                                        <input type="number" name="data[seq]" id="seq" class='input-xlarge' data-rule-required="true" placeholder="Sequence No." value="<?php echo $arrData->seq?>">
                                    </div>
                                </div>
                             
                                <div class="form-actions">
                                     <button type="submit" name="submit" value="submit" class="btn btn-primary">Edit Size</button>
                                    <button type="reset" class="btn">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>