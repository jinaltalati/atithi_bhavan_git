<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title two-title">
                <h3><i class="glyphicon-notes"></i><?php echo $title; ?></h3>
                <a href="<?php echo base_url(). $this->router->class . '/add/'; ?>"><h3 class="right"><i class="icon-plus"></i>Add Entry</h3></a>
            </div>
            <!---------------------------- TABLE START ------------------------------------>
            <div class="box-content nopadding">
                <table class="table table-hover table-nomargin table-bordered dataTable-custom dataTable-columnfilter dataTable-tools dataTable-colvis userTable">
                    <thead>
                        <tr class='thefilter'>
                            <th>Date</th>
                            <th>Cash Sale</th>
                            <th>Web Sale</th>
                            <th class='hidden-480'>Expences</th>
                            <th class='hidden-480'>Printing</th>
                            <th class='hidden-480'>Lamination</th>
                            <th class='hidden-480'>Paper</th>
                            <!-- <th>Options</th> -->
                        </tr>     
                        <tr>
                            <th>Date</th>
                            <th>Cash Sale</th>
                            <th>Web Sale</th>
                            <th class='hidden-480'>Expences</th>
                            <th class='hidden-480'>Printing</th>
                            <th class='hidden-480'>Lamination</th>
                            <th class='hidden-480'>Paper</th>
                            <!-- <th>Options</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $arrBranch = array('1'=>'Sakar','2'=>'Khadia');
                        foreach ($arrData as $key => $data)
                        {
                            ?>
                            <tr>
                                <td><?php echo  $data->entry_date; ?></td>
                                <td><?php echo  $data->cash_sale; ?></td>
                                <td><?php echo  $data->web_sale; ?></td>
                                <td class='hidden-480'><?php echo  $data->expences; ?></td>
                                <td class='hidden-480'><?php echo  $data->printing; ?></td>
                                <td class='hidden-480'><?php echo  $data->lamination; ?></td>
                                <td class='hidden-480'><?php echo  $data->paper; ?></td>
                                <!-- <td>
                                    <a href=" <?php //echo base_url() . $this->router->class . '/edit/' . $data->id; ?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
                                </td> -->
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
            var e = {sPaginationType: "full_numbers", oLanguage: {sSearch: "<span>Search:</span> ", sInfo: "Showing <span>_START_</span> to <span>_END_</span> of <span>_TOTAL_</span> entries", sLengthMenu: "_MENU_ <span>entries per page</span>"}, sDom: "lfrtip", aoColumnDefs: [{bSortable: !1, aTargets: [3]}], oColVis: {buttonText: "Change columns <i class='icon-angle-down'></i>"}, oTableTools: {sSwfPath: "../assets/js/plugins/datatable/swf/copy_csv_xls_pdf.swf"}}, t = $(".userTable").dataTable(e);
            $(".dataTables_filter input").attr("placeholder", "Search here...");
            $(".dataTables_length select").wrap("<div class='input-mini'></div>").chosen({disable_search_threshold: 9999999});
            t.columnFilter({sPlaceHolder: "head:after", aoColumns: [ {type: "text"},{type: "text"},{type: "text"},{type: "text"},{type: "text"},{type: "text"},{type: "text"}]});
            $(".userTable").css("width", "100%")
        }
    });
</script>