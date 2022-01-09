<div class="body-content">
        <router-outlet ></router-outlet><app-appboard><div class="demo-grid-list">
    
    <md-card class="mdCard">
        <md-card-content class="demo-basic-list">

<!-- <script src="<?php echo base_url(); ?>assets/js/plugins/fileupload/bootstrap-fileupload.min.js"></script> -->
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
                <?php if (strpos($this->uri->uri_string, 'admins/edit') !== false){ ?>
                <a href="<?php echo base_url() .''. $this->router->class . '/'; ?>"><h3 class="right"><i class="glyphicon-table"></i>View Room</h3></a>
                <?php } ?>
            </div>
            <div class="box-content nopadding">
                <div class="tab-content padding tab-content-inline tab-content-bottom">
                    <div class="tab-pane active" id="profile">
                        <?php echo form_open($this->router->class."/edit/".$arrData->id, array('class' => 'form-validate form-horizontal', 'id' => 'frm-user', 'name' => 'frm-user','enctype'=>'multipart/form-data')); ?>
                        <div class="row-fluid">
                            <div class="span6">
                                
                                <div class="control-group">
                                    <label for="building_id" class="control-label">Building Name<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <select name="data[building_id]" id="building_id" class='form-control'  data-rule-required="true" placeholder="Building Name" value="<?php echo (isset($data['building_id']))?$data['building_id']:'';?>" required="required">
                                            <option value="">Select</option>
                                            <?php foreach ($building_data as $key => $value) { ?>
                                                <option value="<?= $value->id; ?>" <?php if($value->id == $arrData->building_id) { echo "selected"; } ?>><?= $value->building_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    <!-- </div> -->
                                </div>  
                            </div>
                             <div class="span6">

                                <div class="control-group">
                                    <label for="floor_id" class="control-label">Floor Name<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <select name="data[floor_id]" id="floor_id" class='form-control'  data-rule-required="true" placeholder="Floor Name" value="<?php echo (isset($data['floor_id']))?$data['floor_id']:'';?>" required="required">
                                            <option value="">Select</option>
                                            <?php foreach ($floor_data as $key => $value) { ?>
                                                <option value="<?= $value['id']; ?>" <?php if($value['id'] == $arrData->floor_id) { echo "selected"; } ?>><?= $value['floor_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    <!-- </div> -->
                                </div>
                            </div>
                            </div>   
                            <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label for="room_type_id" class="control-label">Room Type<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <select name="data[room_type_id]" id="room_type_id" class='form-control'  data-rule-required="true" placeholder="Room Type" value="<?php echo (isset($data['room_type_id']))?$data['room_type_id']:'';?>" required="required">
                                          <?php foreach ($room_type_data as $key => $value) { ?>
                                                <option value="<?= $value['id']; ?>" <?php if($value['id'] == $arrData->room_type_id) { echo "selected"; } ?>><?= $value['room_type_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    <!-- </div> -->
                                </div> 
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label for="room_name" class="control-label">Room No<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[room_name]" id="room_name" class='form-control'  data-rule-required="true" placeholder="Room Name" value="<?php echo $arrData->room_name?>" required="required">
                                    <!-- </div> -->
                                </div> 
                            </div>  
                            </div>
                            <div class="row-fluid">
                            <div class="span6">

                                <div class="control-group">
                                    <label for="capacity" class="control-label">Room Capacity<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[capacity]" id="capacity" class='form-control'  data-rule-required="true" placeholder="Room Capacity" value="<?php echo $arrData->capacity?>" required="required">
                                   <!--  </div> -->
                                </div>    
                            </div>

                            <div class="span6">

                                <div class="control-group">
                                    <label for="charge" class="control-label">Room Charge<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[charge]" id="charge" class='form-control'  data-rule-required="true" placeholder="Room charge" value="<?php echo $arrData->charge?>" required="required">
                                    <!-- </div> -->
                                </div>   
                            </div>
                            </div>
                            <div class="row-fluid">
                            <div class="span6">

                                <div class="control-group">
                                    <label for="deposite" class="control-label">Room Deposite<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[deposite]" id="deposite" class='form-control'  data-rule-required="true" placeholder="Room Deposite" value="<?php echo $arrData->deposite?>" required="required">
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
                                     <button type="submit" name="submit" value="submit" class="btn_ad_ed">Edit Room</button>
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
$(document).ready(function(){
    $('#building_id').on('change', function(){

        var building_id = $(this).val();
        jQuery.ajax({
            url: "<?php echo base_url(); ?>room/get_floor_roomtype/" + building_id,
            type: "POST",
            data: {},
            success: function (data){
                data = JSON.parse(data);
                console.log(data.room_type_data);
                html ='';
                data.floor_data.forEach(function(item){
                   
                        if (item.id != null && item.id != 'null') {
                            html += '<option value="' + item.id + '">' + item.floor_name + '</option>';
                        }
                });

                 $('#floor_id').html(html);

                html_type ='';
                data.room_type_data.forEach(function(item){
                   
                        if (item.id != null && item.id != 'null') {
                            html_type += '<option value="' + item.id + '">' + item.room_type_name + '</option>';
                        }
                });
                
               
                $('#room_type_id').html(html_type);
            }
        });
    });
});
</script>