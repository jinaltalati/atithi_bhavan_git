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
                <a href="<?php echo base_url() .''. $this->router->class . '/'; ?>"><h3 class="right"><i class="glyphicon-table"></i>View Admins</h3></a>
                <?php } ?>
            </div>
            <div class="box-content nopadding">
                <div class="tab-content padding tab-content-inline tab-content-bottom">
                    <div class="tab-pane active" id="profile">
                        <?php 
                        //if($this->uri->segment(2) == $this->router->class)
                        if (strpos($this->uri->uri_string, 'admins/edit') !== false){
                            echo form_open("admins/edit/".$userData->id.'/', array('class' => 'form-validate form-horizontal', 'id' => 'frm-user', 'name' => 'frm-user','enctype'=>'multipart/form-data')); 
                        }else{
                            //echo form_open($this->uri->segment(1).'/', array('class' => 'form-validate form-horizontal', 'id' => 'frm-user', 'name' => 'frm-user','enctype'=>'multipart/form-data')); 
                            echo form_open('editProfile/', array('class' => 'form-validate form-horizontal', 'id' => 'frm-user', 'name' => 'frm-user','enctype'=>'multipart/form-data')); 
                        }
                        ?>
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label for="firstname" class="control-label">First Name</label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[firstname]" id="firstname" class='form-control' data-rule-required="true" placeholder="First Name" value="<?php echo $userData->firstname?>">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label for="lastname" class="control-label">Last Name</label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[lastname]" id="lastname" class='form-control'  data-rule-required="true" placeholder="Last Name" value="<?php echo $userData->lastname?>">
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label for="code" class="control-label">Code</label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[code]" id="code" class='form-control'  data-rule-required="true" placeholder="Code" value="<?php echo $userData->code?>">
                                    <!-- </div> -->
                                </div>
                            </div>
                        <div class="span6">
                                <div class="control-group">
                                    <label for="email" class="control-label">Email</label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[email]" id="email"  data-rule-required="true" data-rule-email="true" class='form-control' placeholder="test@email.com" value="<?php echo $userData->email?>">
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label for="password" class="control-label">Password</label>
                                    <!-- <div class="controls"> -->
                                        <input type="password" name="data[password]" id="password"  data-rule-minlength='6' class='form-control' value="">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label for="cpassword" class="control-label">Confirm Password</label>
                                    <!-- <div class="controls"> -->
                                        <input type="password" name="cpassword" id="cpassword"  data-rule-equalto="#password" class='form-control' value="">
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label for="role_id" class="control-label">Role</label>
                                    <!-- <div class="controls"> -->
                                        <select data-rule-required="true" class="form-control" name="data[role_id]" id="role_id">
                                            <option value="">Select</option>
                                            <option value="1" <?php echo ($userData->role_id == '1'? 'selected':'')?> >Admin</option>
                                            <option value="2" <?php echo ($userData->role_id == '2'? 'selected':'')?>>Manager</option>
                                            <!-- <option value="3" <?php echo ($userData->role_id == '3'? 'selected':'')?>>Expence</option>
                                            <option value="4" <?php echo ($userData->role_id == '4'? 'selected':'')?>>Paper</option> -->
                                        </select>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label for="status" class="control-label">Status</label>
                                    <!-- <div class="controls"> -->
                                        <select data-rule-required="true" class="form-control" name="data[status]" id="status">
                                            <option value="">Select</option>
                                            <option value="Active" <?php echo ($userData->status == 'Active'? 'selected':'')?>>Active</option>
                                            <option value="Inactive" <?php echo ($userData->status == 'Inactive'? 'selected':'')?>>Inactive</option>
                                        </select>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="row-fluid">
                            <div class="span5">
                            </div>
                            <div class="span6">                  
                                  <div class="control-group">
                                    <div class="">
                                     <button type="submit" name="submit" value="submit" class="btn_ad_ed">Edit Admin</button>
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