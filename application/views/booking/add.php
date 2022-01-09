<div class="body-content">
        
        
    <div class="demo-grid-list">
    
    <md-card class="mdCard">
        <md-card-content class="demo-basic-list">

<?php $data = ($this->session->flashdata($this->router->class)); ?>
<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title two-title">
                <h3> <i class="glyphicon-notes"></i> <?php echo $title; ?>           </h3>
                <a href="<?php echo base_url(). $this->router->class . '/'; ?>"><h3 class="right"><i class="glyphicon-table"></i>View Room</h3></a>
            </div>
            <div class="box-content nopadding">
                <div class="tab-content padding tab-content-inline tab-content-bottom">
                    <div class="tab-pane active" id="profile">
                       <?php echo form_open($this->router->class."/add/".$building_id."/".$floor_id."/".$room_id, array('class' => 'form-validate form-horizontal', 'id' => 'frm-user', 'name' => 'frm-user','enctype'=>'multipart/form-data')); ?> 

                        <input type="hidden" name="deposite1" id="deposite1">
                        <input type="hidden" name="charge1" id="charge1">
                        <input type="hidden" name="total_payment1" id="total_payment1">
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <label for="mobile" class="control-label">Mobile<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <input type="number" name="data[mobile]" id="mobile" class='form-control'  data-rule-required="true" placeholder="Mobile" value="<?php echo (isset($data['mobile']))?$data['mobile']:'';?>">
                                    <!-- </div> -->
                                </div>  
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label for="customer_name" class="control-label">Full Name<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[customer_name]" id="customer_name" class='form-control'  data-rule-required="true" placeholder="Full Name" value="<?php echo (isset($data['customer_name']))?$data['customer_name']:'';?>">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="span4">
                                 <div class="control-group">
                                    <label for="email" class="control-label">Email</label>
                                    <!-- <div class="controls"> -->
                                        <input type="email" name="data[email]" id="email" class='form-control'  data-rule-required="true" placeholder="email" value="<?php echo (isset($data['email']))?$data['email']:'';?>">
                                    <!-- </div> -->
                                </div>
                               
                            </div>
                           
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                                 <div class="control-group">
                                    <label for="address" class="control-label">Country<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        
                                         <select name="data[country_id]" id="country_id" class='form-control'  data-rule-required="true" placeholder="Country" value="<?php echo (isset($data['country_id']))?$data['country_id']:'';?>" required="required">
                                         <!-- <option value="">Select</option> -->
                                            <?php foreach ($countryData as $key => $value) { ?>
                                                <option value="<?= $value->id; ?>"><?= $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    <!-- </div> -->
                                </div> 
                            </div>
                            <div class="span4">
                                 <div class="control-group">
                                    <label for="state" class="control-label">State<span class="danger">*</span></label>
                                    <select id="state_id" name="data[state_id]" class="form-control txtselect" data-rule-required="true">
                                        
                                    </select>
                                    
                                </div> 
                            </div>
                            <div class="span4">
                                 <div class="control-group">
                                    <label for="address" class="control-label">City<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[city]" id="city" class='form-control'  data-rule-required="true" placeholder="City" value="<?php echo (isset($data['city']))?$data['city']:'';?>">
                                         
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
                                            <?php foreach ($floor_data as $key => $value) { ?>
                                                <option value="<?= $value->id; ?>"><?= $value->floor_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="span4">
                                 <div class="control-group">
                                    <label for="room_type_id" class="control-label">Room Type<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <select name="data[room_type_id]" id="room_type_id" class='form-control'  data-rule-required="true" placeholder="Room Type" value="<?php echo (isset($data['room_type_id']))?$data['room_type_id']:'';?>">
                                            <?php foreach ($room_type_data as $key => $value) { 
                                                if($room_data[0]->room_type_id == $value['id']) { ?>
                                                    <option  value="<?= $value['id']; ?>"><?= $value['room_type_name']; ?></option>
                                            <?php } } ?>
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
                                        <input type="number" name="data[stay_period]" id="stay_period" class='form-control'  data-rule-required="true" placeholder="Stay Period" value="1">
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
                                    <label for="charge" class="control-label">Room Charge<span class="danger">*</span></label>
                                    <!-- <div class="controls"> -->
                                        <input type="text" name="data[charge]" id="charge" class='form-control'  data-rule-required="true" placeholder="Room charge" value="<?php echo $room_data[0]->charge; ?>">
                                    <!-- </div> -->
                                </div>    
                            </div>

                           <!--  <div class="span4">
                                <div class="control-group">
                                    <label for="charge" class="control-label">Donate Deposite?<span class="danger">*</span></label>
                                   
                                        <select id="donate_deposite" name="data[donate_deposite]" class="form-control">
                                            <option class="no">No</option>
                                            <option class="yes">Yes</option>
                                        </select>
                                  
                                </div>    
                            </div> -->
                        </div>
                         <div class="row-fluid">
                           
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
                           
                        </div>


                        <div class="row-fluid">
                             
                            <div class="span4">
                                <div class="control-group">
                                    <label for="id_proof" class="control-label">ID Proof</label>
                                    <!-- <div class="controls"> -->
                                         <select name="data[id_proof]" id="id_proof" class='form-control'  data-rule-required="true" placeholder="Payment Mode" value="<?php echo (isset($data['id_proof']))?$data['id_proof']:'';?>">

                                            <option value="Adhar Card">Adhar Card</option>
                                            <option value="Driving Licence">Driving Licence</option>
                                            <option value="Election Card">Election Card</option>
                                            <option value="Pan Card">Pan Card</option>
                                            <option value="Passport">Passport</option>
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
                                    <button type="submit" name="submit" value="submit" class="btn_ad_ed">Book</button>
                                    <a href="<?= base_url(); ?>dashboard/room_listing"><button type="reset" class="btn">Cancel</button></a>
                               <!--  </div> -->
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



    </div>
</div></md-sidenav-layout></app-home><!--template bindings={}--></app-root>
<style type="text/css">
.danger{
    color: red;
}
</style>


<script type="text/javascript">
$('.datepicker').datepicker({
    dateFormat: "yy-mm-dd"
});
</script>

<script type="text/javascript">  
$(document).ready(function(){
    //alert('hh');
    //on load get state
    var eid = $('#country_id').val();
    var url='<?php echo base_url(). $this->router->class; ?>/getStateByCountryId/'+eid;
    $.ajax({url:url,
    success:function(result){   
      $("#state_id").html(result);
    }});
    //end on load get state
    //get state on change
    $(document).on('change', '#country_id', function () {
        var eid = $('#country_id').val();
        var url='<?php echo base_url(). $this->router->class; ?>/getStateByCountryId/'+eid;
        $.ajax({url:url,
        success:function(result){   
          $("#state_id").html(result);
        }});
    }); 
    //end on change country get state

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
        $('#deposite').val(deposite1);
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
                    $("#country_id").val(obj.country_id);
                    $("#state_id").val(obj.state_id);
                    $("#city").val(obj.city);
                    //$("#address").val(obj.address);
              }
            });
        }
    });

    //getFloorRoomTypes(<?php echo $building_id; ?>);
});

// function getFloorRoomTypes(building_id){
//     $.ajax({
//       type: "POST",
//       url: '<?= base_url(); ?>booking/getFloorRoomTypes', 
//       data: {building_id:building_id},
//       dataType: "text",  
//       cache:false,
//       success: 
//       function(data){
//             const obj = JSON.parse(data);                  
//             //console.log(obj);

//             $("#floor_id").empty().append(obj.strFloors);
//             $("#room_type_id").empty().append(obj.strTypes);
            
//       }
//     });
// }
</script>