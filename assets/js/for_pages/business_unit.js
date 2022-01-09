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

function getHospitalName(hospital_id)
{
    if (hospital_id != "")
    {
        $.ajax({
            url: BASE_URL + 'hospital/get_region_name',
            type: 'POST',
            data: {'hospital_id': hospital_id},
            success: function(data) {
                var regionJson  = jQuery.parseJSON(data);
                $("#region_name").html(regionJson.region_name);
                getBranchName(regionJson.id);
            }
        });
    }
    else
    {
        $("#region_name").html('');
         $("#branch_name").html('');
    }
}

$(document).ready(function() {
    $("#hospital_id").change(function() {
        var hospital_id = $(this).val();
        getHospitalName(hospital_id);
        
    });
});
