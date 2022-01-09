<?php
    $listBuilding = array_column($building_data,'building_name','id');
    $listFloor = array_column($floor_data,'floor_name','id');
    $arrColor = array('Available'=>'green','Booked'=>'red','In Cleaning'=>'blue','Maintainance'=>'yellow');
?>
<div class="row-fluid">
<div class="span12">
    <label>Status:-</label>
    <ul class="stats" >

        <li class="green">
            <div class=""><!-- details -->
                <span class="big">Available</span>
            </div>
        </li>
        <li class="red">
            <div class="">
                <span class="big">Booked</span>
            </div>
        </li>
        <li class="blue">
            <div class="">
                <span class="big">In Cleaning</span>
            </div>
        </li>
        <li class="yellow" style="background: #e2e22b;">
            <div class="">
                <span class="big">Maintainance</span>
            </div>
        </li>
        
    </ul>
</div>
</div>
<?php
    foreach($listBuilding as $kb => $building){ //pre($building);
            if(empty($arrRooms[$kb])) { continue; }
        ?>
        <div class="row-fluid">

            <div class="span12">
                <div class="box box-color box-bordered">
                    <div class="box-title two-title">
                        <h3><i class="glyphicon-notes"></i><?php echo $building; ?></h3>
                    </div>

                    <!---------------------------- TABLE START ------------------------------------>
                    <div class="box-content nopadding">
                      
                            <div class="box-content" style="border:none;">
                                <!-- <h3><?php echo $floor; ?></h3> -->


                                <ul class="stats room_status">

                                    <?php   
                                        if(!empty($arrRooms[$kb])) { 
                                        foreach ($arrRooms[$kb] as $kr => $room) { ?>
                                        <li class="<?php echo $arrColor[$room['status']]; ?>" id="big_<?= $room['building_id']; ?>_<?= $room['id'] ?>_<?= $room['status']; ?>">
                                            <div class=""><!-- details -->
                                                <span class="big"><?php echo $room['room_name']; ?></span>
                                            </div>
                                        </li>                                        
                                    <?php } } ?>

                                    <?php if(false){ ?>
                                    <li class="red">
                                        <div class=""><!-- details -->
                                            <span class="big">K-1 AC</span>
                                        </div>
                                    </li>
                                    <li class="blue">
                                        <div class="">
                                            <span class="big">K-2 AC</span>
                                        </div>
                                    </li>
                                    <li class="green">
                                        <div class="">
                                            <span class="big">K-3 AC</span>
                                        </div>
                                    </li>
                                    <?php } ?>
                                    
                                </ul>
                            </div>

                                            
                       
                        </div>
                            <!---------------------------- TABLE END ---------------------------------------->
                        </div>
                    </div>
                </div>
    <?php } ?>


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
      <button class="btn btn-primary btn_available" style="background: green;" value="Available">Available</button>
      <button class="btn btn-primary btn_maintainance" style="background: #e2e22b;" value="Maintainance">Maintainance</button>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
  
</div>
</div>
  
<script>
$(document).ready(function(){ 

$(".btn_available").click(function(){

    var ids = $('.change_room_status_id').val();
    var id = ids.split("_");
    alert(ids);
    $.ajax({

        type: "POST",
        url: '<?= base_url(); ?>dashboard/change_room_status', 
        data: {building_id: id[1], room_id: id[2], room_status: id[3], status: 'Available'},
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
    alert(ids);
    $.ajax({

        type: "POST",
        url: '<?= base_url(); ?>dashboard/change_room_status', 
        data: {building_id: id[1], room_id: id[2], room_status: id[3], status: 'Maintainance'},
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


  $(".room_status li").click(function(){
    
    var ids = $(this).attr('id');
    var id = ids.split("_");
    
    if(id[3] == "Available") {
        document.location.href = "<?= base_url(); ?>booking/add/"+id[1]+'/'+id[2];
    }

    if(id[3] == "Booked") {
        document.location.href = "<?= base_url(); ?>booking/edit/"+id[1]+'/'+id[2];

    }

    if(id[3] == "In Cleaning") {

        $('#myModal').modal('show');
        $('#change_room_status_id').val(ids);
       
    }

    if(id[3] == "Maintainance") {
        var userselection = confirm("Are you sure you want to change status of maintainance room to available?");
 
        if (userselection == true){
            $.ajax({

                type: "POST",
                url: '<?= base_url(); ?>dashboard/change_room_status', 
                data: {building_id: id[1], room_id: id[2], room_status: id[3], status:"Available"},
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


    // if(id[3] == "In Cleaning") {
    //     var userselection = confirm("Are you sure you want to change status of cleaning room to available?");
 
    //     if (userselection == true){
    //         $.ajax({

    //             type: "POST",
    //             url: '<?= base_url(); ?>dashboard/change_room_status', 
    //             data: {building_id: id[1], room_id: id[2], room_status: id[3]},
    //             dataType: "text",  
    //             cache:false,
    //             success: 
    //               function(data){
    //                 alert(data);  //as a debugging message.
    //                 location.reload();
    //                 //$('#big_'+ids).attr('class="green"');
    //               }

                
    //         });

    //     } else{
    //         alert("Your room status is not change.");
    //     }

    // }
   
  });
});
</script>

<style type="text/css">
.stats li span {color:#fff;}
.stats>li { margin-bottom: 1%;}
.box .box-content {padding: 0 8px;}

.nopadding {
  padding: 8px!important;
}

.yellow {
    background: #e2e22b;
}
</style>