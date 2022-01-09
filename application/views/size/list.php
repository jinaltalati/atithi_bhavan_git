<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title two-title">
                <h3><i class="glyphicon-notes"></i><?php echo $title; ?></h3>
                <a href="<?php echo base_url(). $this->router->class . '/add/'; ?>"><h3 class="right"><i class="icon-plus"></i>Add Size</h3></a>
            </div>
            <!---------------------------- TABLE START ------------------------------------>
            <div class="box-content nopadding">
                <table class="table table-hover table-nomargin table-bordered dataTable-custom dataTable-columnfilter dataTable-tools dataTable-colvis userTable">
                    <thead>
                        <tr class='thefilter'>
                            <th>Id</th>
                            <th>Size</th>
                            <th>Sequence No.</th>
                            <th>Options</th>
                        </tr>     
                        <tr>
                            <th>Id</th>
                            <th>Size</th>
                            <th>Sequence No.</th>
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
                                <td><?php echo  $data->size_w. ' X '.$data->size_h  ; ?></td>
                                <td><?php echo  $data->seq; ?></td>
                                <td>
                                    <a href=" <?php echo base_url() . $this->router->class . '/edit/' . $data->id; ?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
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
<script type="text/javascript">
    $(document).ready(function() {
        if ($(".userTable").length > 0) {
            var e = {sPaginationType: "full_numbers", oLanguage: {sSearch: "<span>Search:</span> ", sInfo: "Showing <span>_START_</span> to <span>_END_</span> of <span>_TOTAL_</span> entries", sLengthMenu: "_MENU_ <span>entries per page</span>"}, sDom: "lfrtip", aoColumnDefs: [{bSortable: !1, aTargets: [2]}], oColVis: {buttonText: "Change columns <i class='icon-angle-down'></i>"}, oTableTools: {sSwfPath: "../assets/js/plugins/datatable/swf/copy_csv_xls_pdf.swf"}}, t = $(".userTable").dataTable(e);
            $(".dataTables_filter input").attr("placeholder", "Search here...");
            $(".dataTables_length select").wrap("<div class='input-mini'></div>").chosen({disable_search_threshold: 9999999});
            t.columnFilter({sPlaceHolder: "head:after", aoColumns: [ {type: "text"},{type: "text"},{type: "text"}]});
            $(".userTable").css("width", "100%")
        }
    });
</script>