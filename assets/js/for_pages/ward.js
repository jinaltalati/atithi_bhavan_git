function fillRegionId(branch_id, region_id)
{
    $.ajax({
        url: BASE_URL + 'region/get_regions_for_branch',
        type: 'POST',
        data: {'branch_id': branch_id, 'region_id': region_id},
        success: function(data) {
            $('#region_id').find('option').remove().end().append(data);
        }
    });
    // fillHospitalId(region_id);
}
function fillHospitalId(region_id, hospital_id)
{
    $.ajax({
        url: BASE_URL + 'hospital/get_hospitals_for_region',
        type: 'POST',
        data: {'region_id': region_id, 'hospital_id': hospital_id},
        success: function(data) {
            $('#hospital_id').find('option').remove().end().append(data);
        }
    });
    //fillBusinessUnitId(hospital_id);
}

function fillBusinessUnitId(hospital_id, business_unit_id)
{
    $.ajax({
        url: BASE_URL + 'businessUnit/get_businessunits_for_hospital',
        type: 'POST',
        data: {'hospital_id': hospital_id, 'business_unit_id': business_unit_id},
        success: function(data) {
            $('#business_unit_id').find('option').remove().end().append(data);
        }
    });
}

/** Used in ward filleing :: Client section **/
function fillWardId(branch_id,region_id,hospital_id,business_unit_id,ward_id)
{
    $.ajax({
        url: BASE_URL + 'ward/get_wards_for_businessunit',
        type: 'POST',
        data: {'branch_id':branch_id,'region_id':region_id,'hospital_id':hospital_id,'business_unit_id': business_unit_id, 'ward_id': ward_id},
        success: function(data) {
            $('#ward_id').find('option').remove().end().append(data);
        }
    });
}

$(document).ready(function() {
    /** chnage Branch **/
    $("#branch_id").change(function() {
        var branch_id = $(this).val();
        fillRegionId(branch_id);
    });

    /** chnage Region **/
    $("#region_id").change(function() {
        var region_id = $(this).val();
        fillHospitalId(region_id);
    });

    /** Change  Hospital **/
    $("#hospital_id").change(function() {
        var hospital_id = $(this).val();
        fillBusinessUnitId(hospital_id);
    });

    /** Change  Business Unit **/
    $("#business_unit_id").change(function() {
        var branch_id = $("#branch_id").val();
        var region_id = $("#region_id").val();
        var hospital_id = $('#hospital_id').val();
        var business_unit_id = $(this).val();
        fillWardId(branch_id,region_id,hospital_id,business_unit_id);
    });
});