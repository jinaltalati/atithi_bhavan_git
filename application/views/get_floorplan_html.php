<?php
	$listFloor = array_column($floor_data,'floor_name','id');
    $listRoomTypes = array_column($room_type_data,'room_type_name','id');

    if(empty($arrRooms)) {
        echo "<div>No rooms found.</div>";
    }

    foreach($listFloor as $kf=>$floor){
                if(empty($arrRooms[$kf])) { continue; }
        ?>

        <div _ngcontent-rfl-104="" class="row col-md-12">
        <div _ngcontent-rfl-104="" class="col-md-12 border-div">
            <div _ngcontent-rfl-104="" class="col-md-2 PLR0">
                <h3 _ngcontent-rfl-104="" class="MT0"><?php echo $floor; ?></h3>
            </div>

         <?php if(!empty($arrRooms[$kf])) { 
                foreach ($arrRooms[$kf] as $kr => $room) { ?>
    
            <div _ngcontent-rfl-104="" class="col-md-1">
                <div _ngcontent-rfl-104="" class="room-book-category col-md-12 PLR0">
                    <!--template bindings={}--><div _ngcontent-rfl-104="">
                    <div _ngcontent-rfl-104="" class="multiple-check-in-room">
                            <!--template bindings={}-->

                            <!--template bindings={}--><div _ngcontent-rfl-104="" class="availableBook">
                                <a _ngcontent-rfl-104="">
                                    <div _ngcontent-rfl-104="" class="btn-category status-<?= strtolower(str_replace(' ','_', $room['status'])); ?>" roomchart="">
                                        <div _ngcontent-rfl-104="" class="room-number-box room_status" id="big_<?= $room['building_id']; ?>_<?php echo $room['floor_id']; ?>_<?= $room['id'] ?>_<?= $room['status']; ?>" style="color: #fff;"><?php echo $room['room_name']; ?><span style="font-size: 8px; float: right;"><?php if($listRoomTypes[$room['room_type_id']] == "A.C") { echo $listRoomTypes[$room['room_type_id']]; } ?></span></div>
                                        <!--template bindings={}-->
                                        
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>

                    <!--template bindings={}-->
                    <div _ngcontent-rfl-104="" class="clearfix"></div>
                </div>
            </div>

            <?php } ?> 
        <?php } ?>
          </div>
    </div>
    <?php }?>

    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Where would you like to put room from cleaning?</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="change_room_status_id" class="change_room_status_id" id="change_room_status_id" value="">
          <button class="btn btn_available status-available" style="color: #fff!important;" value="Available">Available</button>
          <button class="btn btn_maintainance status-maintainance" style="color: #fff!important;" value="Maintainance">Maintainance</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
    </div>
  

    <script type="text/javascript">

    $(".btn_available").click(function(){

        var ids = $('.change_room_status_id').val();
        var id = ids.split("_");
        //alert(ids);
        $.ajax({

            type: "POST",
            url: '<?= base_url(); ?>dashboard/change_room_status', 
            data: {building_id: id[1], floor_id: id[2], room_id: id[3], room_status: id[4], status: 'Available'},
            dataType: "text",  
            cache:false,
            success: 
              function(data){
                alert(data);  //as a debugging message.
                location.reload();
                //$('#big_'+ids).attr('class="green"');
              }

            
        });
    });

    $(".btn_maintainance").click(function(){

        var ids = $('.change_room_status_id').val();
        var id = ids.split("_");
        //alert(ids);
        $.ajax({

            type: "POST",
            url: '<?= base_url(); ?>dashboard/change_room_status', 
            data: {building_id: id[1], floor_id: id[2], room_id: id[3], room_status: id[4], status: 'Maintainance'},
            dataType: "text",  
            cache:false,
            success: 
              function(data){
                alert(data);  //as a debugging message.
                location.reload();
                //$('#big_'+ids).attr('class="green"');
              }

            
        });
    });


    $(".room_status").click(function(){
        //alert('hi');
        var ids = $(this).attr('id');
        
        var id = ids.split("_");
        //alert(id);
        if(id[4] == "Available") {
            document.location.href = "<?= base_url(); ?>booking/add/"+id[1]+'/'+id[2]+'/'+id[3];
        }

        if(id[4] == "Booked") {
            document.location.href = "<?= base_url(); ?>booking/edit/"+id[1]+'/'+id[2]+'/'+id[3];

        }

        if(id[4] == "In Cleaning") {

            $('#myModal').modal('show');
            $('#change_room_status_id').val(ids);
           
        }

        if(id[4] == "Maintainance") {
            var userselection = confirm("Are you sure you want to change status of maintainance room to available?");

            if (userselection == true){
                $.ajax({

                    type: "POST",
                    url: '<?= base_url(); ?>dashboard/change_room_status', 
                    data: {building_id: id[1], floor_id : id[2], room_id: id[3], room_status: id[4], status:"Available"},
                    dataType: "text",  
                    cache:false,
                    success: 
                      function(data){
                        alert(data);  //as a debugging message.
                        location.reload();
                        //$('#big_'+ids).attr('class="green"');
                      }

                    
                });

            } else{
                alert("Your room status is not change.");
            }
        }
    });
    </script>