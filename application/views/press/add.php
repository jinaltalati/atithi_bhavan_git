<?php $data = ($this->session->flashdata($this->router->class)); ?>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title two-title">
                <h3> <i class="glyphicon-notes"></i> <?php echo $title; ?>           </h3>
                <a href="<?php echo base_url(). $this->router->class . '/'; ?>"><h3 class="right"><i class="glyphicon-table"></i>View Press</h3></a>
            </div>
            <div class="box-content nopadding">
                <div class="tab-content padding tab-content-inline tab-content-bottom">
                    <div class="tab-pane active" id="profile">
                        <?php echo form_open($this->router->class."/add", array('class' => 'form-validate form-horizontal', 'id' => 'frm-user', 'name' => 'frm-user','enctype'=>'multipart/form-data')); ?>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="control-group">
                                    <label for="press_name" class="control-label right">Press Name</label>
                                    <div class="controls">
                                        <input type="text" name="data[press_name]" id="press_name" class='input-xlarge'  data-rule-required="true" placeholder="Press Name" value="<?php echo (isset($data['press_name']))?$data['press_name']:'';?>">
                                    </div>
                                </div>                         
                                <div class="form-actions">
                                     <button type="submit" name="submit" value="submit" class="btn btn-primary">Add Press</button>
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