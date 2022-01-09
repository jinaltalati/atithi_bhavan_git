function getBranchName(region_id)
{
    if (region_id != "")
    {
        $.ajax({
            url: BASE_URL + 'region/get_branch_name',
            type: 'POST',
            data: {'region_id': region_id},
            success: function(data) {
                $("#branch_name").html(data);
            }
        });
    }
    else
    {
        $("#branch_name").html('');
    }
}

$(document).ready(function() {
    $("#region_id").change(function() {
        var region_id = $(this).val();
        getBranchName(region_id);
    });
});
