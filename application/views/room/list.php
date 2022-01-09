<div class="body-content">
        <router-outlet ></router-outlet><app-appboard><div class="demo-grid-list">
    
    <md-card class="mdCard">
        <md-card-content class="demo-basic-list">
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
                <h3><i class="glyphicon-notes"></i><?php echo $title; ?></h3>
                <a href="<?php echo base_url(). $this->router->class . '/add/'; ?>"><h3 class="right"><i class="icon-plus"></i>Add Room</h3></a>
            </div>
            <!---------------------------- TABLE START ------------------------------------>
            <div class="box-content nopadding">
                <table class="table table-hover table-nomargin table-bordered dataTable-custom dataTable-columnfilter dataTable-tools dataTable-colvis userTable">
                    <thead>
                        <tr class='thefilter'>
                            <th>Id</th>
                            <th>Building Name</th>
                            <th>Floor Name</th>
                            <th>Room No</th>
                            <th>Room Type</th>
                            <th>Room Capacity</th>
                            <th>Room Charge</th>
                            <th>Room Deposite</th>
                            <!-- <th>Room Status</th> -->
                            <th>Options</th>
                        </tr>     
                        <tr>
                            <th>Id</th>
                            <th>Building Name</th>
                            <th>Floor Name</th>
                            <th>Room No</th>
                            <th>Room Type</th>
                            <th>Room Capacity</th>
                            <th>Room Charge</th>
                            <th>Room Deposite</th>
                            <!-- <th>Room Status</th> -->
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($arrData as $key => $data)
                        {
                            ?>
                            <tr>
                                <td><?php echo  $data->id; ?></td>
                                <?php foreach ($building_data as $key => $value) {
                                    if($value->id == $data->building_id) { ?>
                                    <td><?php  echo  $value->building_name;  ?></td>
                                <?php } } ?>
                                <?php foreach ($floor_data as $key => $value) {
                                if($value->id == $data->floor_id) { ?>
                                    <td><?php  echo  $value->floor_name;  ?></td>
                                <?php } } ?>
                                    <td><?php echo  $data->room_name; ?></td>
                                     <?php foreach ($room_type_data as $key => $value) {
                                        if($value['id'] == $data->room_type_id) { ?>
                                            <td><?php  echo  $value['room_type_name'];  ?></td>
                                        <?php } } ?>
                                    <td><?php echo  $data->capacity; ?></td>
                                    <td><?php echo  $data->charge; ?></td>
                                    <td><?php echo  $data->deposite; ?></td>
                                   <!--  <td>
                                        <?php if($data->status == 'Available') { ?> 
                                            <span class="btn btn-success"><?php echo  $data->status; ?></span>
                                        <?php } else if($data->status == 'In Cleaning') { ?>
                                            <span class="btn btn-primary" style="background: #368ee0;"><?php echo  $data->status; ?></span>
                                        <?php } else if($data->status == 'Booked') { ?>
                                            <span class="btn btn-danger"><?php echo  $data->status; ?></span>
                                        <?php } else if($data->status == 'Maintainance') { ?>
                                            <span class="btn btn-primary" style="background: #e2e22b;"><?php echo  $data->status; ?></span>
                                        <?php } ?>
                                    </td> -->
                                    <td>
                                        <a href=" <?php echo base_url() . $this->router->class . '/edit/' . $data->id; ?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
                                        <!-- <a href=" <?php echo base_url() . $this->router->class . '/delete/' . $data->id; ?>" class="btn" rel="tooltip" title="Delete"><i class="icon-remove"></i></a> -->
                                    </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!---------------------------- TABLE END ---------------------------------------->
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
    $(document).ready(function() {
        if ($(".userTable").length > 0) {
            var e = {sPaginationType: "full_numbers", oLanguage: {sSearch: "<span>Search:</span> ", sInfo: "Showing <span>_START_</span> to <span>_END_</span> of <span>_TOTAL_</span> entries", sLengthMenu: "_MENU_ <span>entries per page</span>"}, sDom: "lfrtip", aoColumnDefs: [{bSortable: !1, aTargets: [2]}], oColVis: {buttonText: "Change columns <i class='icon-angle-down'></i>"}, oTableTools: {sSwfPath: "../assets/js/plugins/datatable/swf/copy_csv_xls_pdf.swf"}}, t = $(".userTable").dataTable(e);
            $(".dataTables_filter input").attr("placeholder", "Search here...");
            $(".dataTables_length select").wrap("<div class='input-mini'></div>").chosen({disable_search_threshold: 9999999});
            t.columnFilter({sPlaceHolder: "head:after", aoColumns: [ {type: "text"},{type: "select"},{type: "select"},{type: "text"},{type: "select"},{type: "text"},{type: "text"},{type: "text"},{type: "text"}]});
            $(".userTable").css("width", "100%")
        }
    });
</script>