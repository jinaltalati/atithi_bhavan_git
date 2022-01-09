<div class="body-content">
        <router-outlet ></router-outlet><app-appboard><div class="demo-grid-list">
    
    <md-card class="mdCard">
        <md-card-content class="demo-basic-list">

<?php $data = ($this->session->flashdata($this->router->class)); ?>
<?php
if ($this->session->userdata('message_success'))
{
    echo '<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button">×</button>';
    echo $this->session->userdata('message_success');
    echo '</div>';
    $this->session->unset_userdata('message_success');
}
else if ($this->session->userdata('message_error'))
{
    echo '<div class="alert alert-error" style="color:red; background:#f1c2c2;"><button class="close" data-dismiss="alert" type="button">×</button>';
    echo $this->session->userdata('message_error');
    echo '</div>';
    $this->session->unset_userdata('message_error');
}
?>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title two-title">
                <h3> <i class="glyphicon-notes"></i> <?php echo $title; ?>           </h3>
                <a href="<?php echo base_url(). $this->router->class . '/'; ?>"><h3 class="right"><i class="glyphicon-table"></i>View Floor</h3></a>
            </div>
            <div class="box-content nopadding">
                <div class="tab-content padding tab-content-inline tab-content-bottom">
                    <div class="tab-pane active" id="profile">
                        <?php echo form_open($this->router->class."/add", array('class' => 'form-validate form-horizontal', 'id' => 'frm-user', 'name' => 'frm-user','enctype'=>'multipart/form-data')); ?>
                        <div class="row-fluid">
                            <div class="span6">

                                <div class="control-group">
                                    <label for="building_id" class="control-label">Building Name<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <select name="data[building_id]" id="building_id" class='form-control'  data-rule-required="true" placeholder="Building Name" value="<?php echo (isset($data['building_id']))?$data['building_id']:'';?>" required="required">
                                            <option value="">Select</option>
                                            <?php foreach ($building_data as $key => $value) { ?>
                                                <option value="<?= $value->id; ?>"><?= $value->building_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    <!-- </div> -->
                                </div>
                            </div>
                                <div class="span6">
                                <div class="control-group">
                                    <label for="floor_name" class="control-label">Floor Name</label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[floor_name]" id="floor_name" class='form-control'  data-rule-required="true" placeholder="Floor Name" value="<?php echo (isset($data['floor_name']))?$data['floor_name']:'';?>" required="required">
                                    <!-- </div> -->
                                </div>  
                                </div>  
                            </div>   
                            <div class="row-fluid">
                            <div class="span5">
                            </div>
                            <div class="span6">                  
                                  <div class="control-group">
                                    <div class="">
                                     <button type="submit" name="submit" value="submit" class="btn_ad_ed">Add Floor</button>
                                    <button type="reset" class="btn">Cancel</button>
                                </div></div>
                           </div></div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 </md-card-content>
    </md-card>
</div>



</app-appboard>
    </div>
</div></md-sidenav-layout></app-home><!--template bindings={}--></app-root>


<script type="text/javascript">
    $('.datepicker').datepicker({
        dateFormat: "yy-mm-dd"
    });
</script>