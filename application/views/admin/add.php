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
                <a href="<?php echo base_url(). $this->router->class . '/'; ?>"><h3 class="right"><i class="glyphicon-table"></i>View Admins</h3></a>
            </div>
            <div class="box-content nopadding">
                <div class="tab-content padding tab-content-inline tab-content-bottom">
                    <div class="tab-pane active" id="profile">
                        <?php echo form_open("admins/add", array('class' => 'form-validate form-horizontal', 'id' => 'frm-user', 'name' => 'frm-user','enctype'=>'multipart/form-data')); ?>
                        <div class="row-fluid">
                            <?php if(false) { ?>
                            <div class="span2">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="max-width: 200px; max-height: 150px;"><img src="<?php echo base_url(); ?>assets/files/default/avtar.png" /></div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                        <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                            <input type="file" name='profile_image' id="profile_image" accept="image/*"/></span>
                                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="span6">
                                <div class="control-group">
                                    <label for="firstname" class="control-label">First Name</label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[firstname]" id="firstname" class='form-control' data-rule-required="true" placeholder="First Name" value="<?php echo (isset($data['firstname']))?$data['firstname']:'';?>">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label for="lastname" class="control-label">Last Name</label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[lastname]" id="lastname" class='form-control'  data-rule-required="true" placeholder="Last Name" value="<?php echo (isset($data['lastname']))?$data['lastname']:'';?>">
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                            <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label for="code" class="control-label">Code</label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[code]" id="code" class='form-control'  data-rule-required="true" placeholder="Code" value="<?php echo (isset($data['code']))?$data['code']:'';?>">
                                    <!-- </div> -->
                                </div>
                            </div>
                             <div class="span6">
                                <div class="control-group">
                                    <label for="email" class="control-label">Email</label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[email]" id="email"  data-rule-required="true" data-rule-email="true" class='form-control' placeholder="test@email.com" value="<?php echo (isset($data['email']))?$data['email']:'';?>">
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label for="password" class="control-label">Password</label>
                                    <!-- <div class="controls"> -->
                                        <input type="password" name="data[password]" id="password" data-rule-required='true' data-rule-minlength='6' class='form-control' value="">

                                    <!-- </div> -->
                                </div>
                            </div>
                        <div class="span6">
                                <div class="control-group">
                                    <label for="cpassword" class="control-label">Confirm Password</label>
                                   <!--  <div class="controls"> -->
                                        <input type="password" name="cpassword" id="cpassword"  data-rule-equalto="#password" class='form-control' value="">
                                   <!--  </div> -->
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
                                            <option value="1">Admin</option>
                                            <option value="2">Manager</option>
                                            <!-- <option value="3">Expence</option>
                                            <option value="4">Paper</option> -->
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
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
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
                                     <button type="submit" name="submit" value="submit" class="btn_ad_ed">Add Admin</button>
                                    <button type="reset" class="btn">Cancel</button>
                                </div></div>
                           </div></div>
                            </div>
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