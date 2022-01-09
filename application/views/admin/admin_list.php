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
                <a href="<?php echo base_url(). $this->router->class . '/add/'; ?>"><h3 class="right"><i class="icon-plus"></i>Add Admin</h3></a>
            </div>
            <!---------------------------- TABLE START ------------------------------------>
            <div class="box-content nopadding">
                <table class="table table-hover table-nomargin table-bordered dataTable-custom dataTable-columnfilter dataTable-tools dataTable-colvis userTable">
                    <thead>
                        <tr class='thefilter'>
                            <th class='hidden-480'>User Name</th>
                            <th>Code</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class='hidden-480'>Status</th>
                            <th>Options</th>
                        </tr>     
                        <tr>
                            <th class='hidden-480'>User Name</th>
                            <th>Code</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class='hidden-480'>Status</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $arrRole = array('1'=>'Admin','2'=>'Manager');
                        foreach ($userData as $key => $user)
                        {
                            ?>
                            <tr>
                                <td class='hidden-480'><?php echo $user->firstname. ' '. $user->lastname; ?></td>
                                <td><?php echo $user->code; ?></td>
                                <td><?php echo $user->email; ?></td>
                                <td><?php echo $arrRole[$user->role_id]; ?></td>
                                <td class='hidden-480'>
                                    <?php 
                                    if($user->status == 'Active')
                                        echo '<span class="label label-satgreen">Active</span>';
                                    else
                                        echo '<span class="label label-lightred">Inactive</span>';
                                    ?>
                                </td>
                                <td>
                                    <a href=" <?php echo base_url() . $this->router->class . '/edit/' . $user->id; ?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
                                    <a href="<?php echo base_url().$this->router->class . '/delete/' . $user->id; ?>" class="btn" rel="tooltip" title="Delete" onclick="return doubleCheckDelete('Are you sure to delete this record? It will delete all dependent record');" ><i class="icon-remove"></i></a>
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
            var e = {sPaginationType: "full_numbers", oLanguage: {sSearch: "<span>Search:</span> ", sInfo: "Showing <span>_START_</span> to <span>_END_</span> of <span>_TOTAL_</span> entries", sLengthMenu: "_MENU_ <span>entries per page</span>"}, sDom: "lfrtip", aoColumnDefs: [{bSortable: !1, aTargets: [5]}], oColVis: {buttonText: "Change columns <i class='icon-angle-down'></i>"}, oTableTools: {sSwfPath: "../assets/js/plugins/datatable/swf/copy_csv_xls_pdf.swf"}}, t = $(".userTable").dataTable(e);
            $(".dataTables_filter input").attr("placeholder", "Search here...");
            $(".dataTables_length select").wrap("<div class='input-mini'></div>").chosen({disable_search_threshold: 9999999});
            t.columnFilter({sPlaceHolder: "head:after", aoColumns: [{type: "text"},{type: "text"},{type: "text"},{type: "select", bCaseSensitive: !0, values: ["Admin", "Income","Expence","Paper"]},
                {type: "select", bCaseSensitive: !0, values: ["Active", "Inactive"]},null]});
            $(".userTable").css("width", "100%")
        }
    });
</script>