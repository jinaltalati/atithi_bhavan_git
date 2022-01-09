<script src="<?php echo base_url(); ?>assets/js/plugins/fileupload/bootstrap-fileupload.min.js"></script>
<?php $data = ($this->session->flashdata($this->router->class)); ?>
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
                       <?php echo form_open($this->router->class."/add/", array('class' => 'form-validate form-horizontal', 'id' => 'frm-user', 'name' => 'frm-user','enctype'=>'multipart/form-data')); ?> 
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <label for="mobile" class="control-label">Mobile<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[mobile]" id="mobile" class='form-control'  data-rule-required="true" placeholder="Mobile" value="<?php echo $arrData->mobile; ?>">
                                    <!-- </div> -->
                                </div>  
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label for="customer_name" class="control-label">Full Name<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[customer_name]" id="customer_name" class='form-control'  data-rule-required="true" placeholder="Full Name" value="<?php echo $arrData->customer_name; ?>">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="span4">
                                 <div class="control-group">
                                    <label for="email" class="control-label">Email</label>
                                    <!-- <div class="controls"> -->
                                        <input type="email" name="data[email]" id="email" class='form-control'  data-rule-required="true" placeholder="email" value="<?php echo $arrData->email; ?>">
                                    <!-- </div> -->
                                </div>
                               
                            </div>
                           
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                 <div class="control-group">
                                    <label for="address" class="control-label">Address<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <textarea name="data[address]" id="address" class='form-control'  data-rule-required="true" placeholder="Address"><?php echo $arrData->address; ?></textarea>
                                    <!-- </div> -->
                                </div> 
                            </div>
                        </div>

                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <label for="building_id" class="control-label">Building Name<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <select name="data[building_id]" id="building_id" class='form-control'  data-rule-required="true" placeholder="Building Name" value="<?php echo (isset($data['building_id']))?$data['building_id']:'';?>">
                                            <!-- <option value="">Select</option> -->
                                            <?php foreach ($building_data as $key => $value) { ?>
                                                <option value="<?= $value->id; ?>"><?= $value->building_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    <!-- </div> -->
                                </div>   
                               
                            </div>
                            <div class="span4">
                               <div class="control-group">
                                    <label for="floor_id" class="control-label">Floor Name<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <select name="data[floor_id]" id="floor_id" class='form-control'  data-rule-required="true" placeholder="Floor Name" value="<?php echo (isset($data['floor_id']))?$data['floor_id']:'';?>" required="required">
                                           <!-- <option value="">Select</option> -->
                                            <!-- <?php foreach ($floor_data as $key => $value) { ?>
                                                <option value="<?= $value->id; ?>"><?= $value->floor_name; ?></option>
                                            <?php } ?>  -->
                                        </select>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="span4">
                                 <div class="control-group">
                                    <label for="room_type_id" class="control-label">Room Type<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <select name="data[room_type_id]" id="room_type_id" class='form-control'  data-rule-required="true" placeholder="Room Type" value="<?php echo (isset($data['room_type_id']))?$data['room_type_id']:'';?>">
                                            <!-- <?php foreach ($room_type_data as $key => $value) { ?>
                                                <option value="<?= $value['id']; ?>"><?= $value['room_type_name']; ?></option>
                                            <?php } ?> -->
                                        </select>
                                  <!--   </div> -->
                                </div> 

                                
                            </div>
                            
                        </div>

                        <div class="row-fluid">
                            <div class="span4">
                               <div class="control-group">
                                    <label for="room_id" class="control-label">Room No<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <select name="data[room_id]" id="room_id" class='form-control'  data-rule-required="true" placeholder="Room Name" value="<?php echo (isset($data['room_id']))?$data['room_id']:'';?>">
                                            <!-- <option value="">Select</option> -->
                                            <?php foreach ($room_data as $key => $value) { ?>
                                                <option value="<?= $value->id; ?>"><?= $value->room_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    <!-- </div> -->
                                </div> 
                            </div>
                            <div class="span4">
                                  <div class="control-group">
                                    <label for="members" class="control-label">Capacity<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <input type="number" name="data[members]" id="members" class='form-control'  data-rule-required="true" placeholder="Members" value="<?php echo $room_data[0]->capacity; ?>">
                                    <!-- </div> -->
                                </div>
                                 

                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label for="check_in" class="control-label">Check In<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <input type="date" name="data[check_in]" id="check_in" class='form-control'  data-rule-required="true" placeholder="Check In" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                </div> 
                          
                            
                        </div>

                        <div class="row-fluid">

                            <div class="span4">
                                <div class="control-group">
                                    <label for="stay_period" class="control-label">Stay Period(Days)<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <input type="number" name="data[stay_period]" id="stay_period" class='form-control'  data-rule-required="true" placeholder="Total Payment" value="1">
                                    <!-- </div> -->
                                </div> 
                            </div>

                            <div class="span4">
                                <div class="control-group">
                                    <label for="pay_status" class="control-label">Room Pay Status<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <select id="pay_status" name="data[pay_status]" class="form-control">
                                            <option class="paid">Paid</option>
                                            <option class="free">Free</option>
                                        </select>
                                    <!-- </div> -->
                                </div>    
                            </div>

                            <div class="span4">
                                <div class="control-group">
                                    <label for="charge" class="control-label">Donate Deposite?<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <select id="donate_deposite" name="data[donate_deposite]" class="form-control">
                                            <option class="no">No</option>
                                            <option class="yes">Yes</option>
                                        </select>
                                    <!-- </div> -->
                                </div>    
                            </div>
                        </div>
                         <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <label for="charge" class="control-label">Room Charge<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[charge]" id="charge" class='form-control'  data-rule-required="true" placeholder="Room charge" value="<?php echo $room_data[0]->charge; ?>">
                                    <!-- </div> -->
                                </div>    
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label for="deposite" class="control-label">Room Deposite<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[deposite]" id="deposite" class='form-control'  data-rule-required="true" placeholder="Room Deposite" value="<?php echo $room_data[0]->deposite; ?>">
                                    <!-- </div> -->
                                </div>  

                                

                            </div>
                           
                             <div class="span4">
                                <div class="control-group">
                                    <label for="total_payment" class="control-label">Total Payment<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[total_payment]" id="total_payment" class='form-control'  data-rule-required="true" placeholder="Total Payment" value="<?php echo $room_data[0]->charge; ?>">
                                    <!-- </div> -->
                                </div> 
                            </div>
                           
                        </div>


                        <div class="row-fluid">
                             <div class="span4">
                                
                                <div class="control-group">
                                    <label for="payment_mode" class="control-label">Payment Mode<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <select name="data[payment_mode]" id="payment_mode" class='form-control'  data-rule-required="true" placeholder="Payment Mode" value="<?php echo (isset($data['payment_mode']))?$data['payment_mode']:'';?>">
                                            <option value="cash">Cash</option>
                                        </select>
                                    <!-- </div> -->
                                </div> 
 
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label for="reference_by" class="control-label">Reference By</label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[reference_by]" id="reference_by" class='form-control' placeholder="Reference by" value="<?php echo (isset($data['reference_by']))?$data['reference_by']:'';?>">
                                    <!-- </div> -->
                                </div> 
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <!-- <div class="controls"> -->
                                    <button type="submit" name="submit" value="submit" class="btn_ad_ed">Checkout</button>
                                    <a href="<?= base_url(); ?>dashboard/room_listing"><button type="reset" class="btn">Cancel</button></a>
                               <!--  </div> -->
                                </div>
                            </div>
                        </div>
                        
                        </form>
                    </div>
                   <!--  <div class="tab-pane active" id="profile">
                        <?php echo form_open($this->router->class."/edit/".$room_data[0]->building_id."/".$room_data[0]->id, array('class' => 'form-validate form-horizontal', 'id' => 'frm-user', 'name' => 'frm-user','enctype'=>'multipart/form-data')); ?>


                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <label for="mobile" class="control-label">Mobile<span class="danger">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="data[mobile]" id="mobile" class='form-control'  data-rule-required="true" placeholder="Mobile" value="<?php echo $arrData->mobile; ?>">
                                    </div>
                                </div> 
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label for="customer_name" class="control-label">Full Name<span class="danger">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="data[customer_name]" id="customer_name" class='form-control'  data-rule-required="true" placeholder="Full Name" value="<?php echo $arrData->customer_name; ?>">
                                    </div>
                                </div>   
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label for="address" class="control-label right">Address<span class="danger">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="data[address]" id="address" class='form-control'  data-rule-required="true" placeholder="Address" value="<?php echo $arrData->address; ?>">
                                    </div>
                                </div>  
                            </div>
                           
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <label for="members" class="control-label right">Members<span class="danger">*</span></label>
                                    <div class="controls">
                                        <input type="number" name="data[members]" id="members" class='form-control'  data-rule-required="true" placeholder="Members" value="<?php echo $arrData->members; ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label for="email" class="control-label right">Email</label>
                                    <div class="controls">
                                        <input type="email" name="data[email]" id="email" class='form-control'  data-rule-required="true" placeholder="Email" value="<?php echo $arrData->email; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label for="building_id" class="control-label right">Building Name<span class="danger">*</span></label>
                                    <div class="controls">
                                        <select name="data[building_id]" id="building_id" class='form-control'  data-rule-required="true" placeholder="Building Name" value="<?php echo (isset($data['building_id']))?$data['building_id']:'';?>">
                                            <option value="">Select</option>
                                            <?php foreach ($building_data as $key => $value) { ?>
                                                <option value="<?= $value->id; ?>" <?php if($value->id == $arrData->building_id) { echo "selected"; } ?>><?= $value->building_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>   
                            </div>
                           
                        </div>

                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <label for="room_id" class="control-label right">Room No<span class="danger">*</span></label>
                                    <div class="controls">
                                        <select name="data[room_id]" id="room_id" class='form-control'  data-rule-required="true" placeholder="Room Name" value="<?php echo (isset($data['room_id']))?$data['room_id']:'';?>">
                                            <option value="">Select</option>
                                            <?php foreach ($room_data as $key => $value) { ?>
                                                <option value="<?= $value->id; ?>" <?php if($value->id == $arrData->room_id) { echo "selected"; } ?>><?= $value->room_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>  
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label for="room_type" class="control-label right">Room Type<span class="danger">*</span></label>
                                    <div class="controls">
                                        <select name="data[room_type]" id="room_type" class='form-control'  data-rule-required="true" placeholder="Room Type" value="<?php echo (isset($data['room_type']))?$data['room_type']:'';?>">
                                            <option value="">Select</option>
                                            <option <?php if($arrData->room_type == 'A.C') { echo "selected"; } ?> value="A.C">A.C</option>
                                            <option <?php if($arrData->room_type == 'Non A.C') { echo "selected"; } ?> value="Non A.C">Non A.C</option>
                                        </select>
                                    </div>
                                </div> 
                            </div>
                            <div class="span4">
                                 <div class="control-group">
                                    <label for="check_in" class="control-label right">Check In<span class="danger">*</span></label>
                                    <div class="controls">
                                        <input type="date" name="data[check_in]" id="check_in" class='form-control'  data-rule-required="true" placeholder="Check In" value="<?php echo date('Y-m-d', strtotime($arrData->check_in)); ?>">
                                    </div>
                                </div> 
                            </div>
                           
                        </div>

                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <label for="charge" class="control-label right">Room Charge<span class="danger">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="data[charge]" id="charge" class='form-control'  data-rule-required="true" placeholder="Room charge" value="<?php echo $arrData->charge; ?>">
                                    </div>
                                </div>   
                            </div>
                            <div class="span4">
                                 <div class="control-group">
                                    <label for="deposite" class="control-label right">Room Deposite<span class="danger">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="data[deposite]" id="deposite" class='form-control'  data-rule-required="true" placeholder="Room Deposite" value="<?php echo $arrData->deposite; ?>">
                                    </div>
                                </div>  
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label for="donate_deposite" class="control-label right">Donate this deposite?<span class="danger">*</span></label>
                                    <div class="controls">
                                        <select name="data[donate_deposite]" id="donate_deposite" class='form-control'  data-rule-required="true" placeholder="Donate Deposite">
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div> 
                            </div>
                           
                        </div>

                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <label for="payment_mode" class="control-label right">Payment Mode<span class="danger">*</span></label>
                                    <div class="controls">
                                        <select name="data[payment_mode]" id="payment_mode" class='form-control'  data-rule-required="true" placeholder="Payment Mode">
                                            <option value="">Select</option>
                                            <option value="cash" <?php if($arrData->payment_mode == 'cash') { echo "selected"; } ?>>Cash</option>
                                            <option value="other" <?php if($arrData->payment_mode == 'other') { echo "selected"; } ?>>Other</option>
                                        </select>
                                    </div>
                                </div>  
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label for="reference_by" class="control-label right">Reference By</label>
                                    <div class="controls">
                                        <input type="text" name="data[reference_by]" id="reference_by" class='form-control'  placeholder="Reference By" value="<?php echo $arrData->reference_by; ?>">
                                    </div>
                                </div> 
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label for="total_payment" class="control-label right">Total Payment<span class="danger">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="data[total_payment]" id="total_payment" class='form-control'  data-rule-required="true" placeholder="Total Payment" value="<?php echo $arrData->total_payment; ?>">
                                    </div>
                                </div> 
                            </div>
                           
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <div class="controls">
                                     <button type="submit" name="submit" value="submit" class="btn btn-primary">Checkout</button>
                                    <button type="reset" class="btn"><a href="<?= base_url(); ?>dashboard/welcome">Cancel</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div> -->
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
<style type="text/css">
.danger{
    color: red;
}
</style>

<script type="text/javascript">
$(document).ready(function(){ 

  $("#donate_deposite").change(function(){
    
    var deposite = $('#deposite').val();
    var charge  = $('#charge').val(); 

    if($('#donate_deposite').val() == "Yes") {
         var total_payment = parseInt(deposite) + parseInt(charge);
        $('#total_payment').val(total_payment);
    } else {
        $('#total_payment').val(charge);
    }
   
  });

  $("#pay_status").change(function(){
  
    var deposite = $('#deposite').val();
    var charge  = $('#charge').val(); 
    var total_payment = $('#total_payment').val();

    if($('#pay_status').val() == "Free") {
        $('#deposite').val(0);
        $('#charge').val(0);
        $('#total_payment').val(0);
    } else {
        $('#deposite').val(deposite);
        $('#charge').val(charger);
        $('#total_payment').val(total_payment);
    }
   
  });


    $("#mobile").keyup(function(){
        var val = $(this).val();
        if(val.length >9){
            $.ajax({
              type: "POST",
              url: '<?= base_url(); ?>beneficiary/checkIsExists', 
              data: {mobile:val},
              dataType: "text",  
              cache:false,
              success: 
              function(data){
                    const obj = JSON.parse(data);                  
                    //console.log(obj);
                    $("#customer_name").val(obj.customer_name);
                    $("#email").val(obj.email);
                    $("#address").val(obj.address);
              }
            });
        }
    });

    getFloorRoomTypes(<?php echo $building_id; ?>);
});

function getFloorRoomTypes(building_id){
    $.ajax({
      type: "POST",
      url: '<?= base_url(); ?>booking/getFloorRoomTypes', 
      data: {building_id:building_id},
      dataType: "text",  
      cache:false,
      success: 
      function(data){
            const obj = JSON.parse(data);                  
            //console.log(obj);

            $("#floor_id").empty().append(obj.strFloors);
            $("#room_type_id").empty().append(obj.strTypes);
            
      }
    });
}
</script>