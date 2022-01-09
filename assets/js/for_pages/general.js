function doubleCheckDelete(str)
{
    var check1 = confirm(str);
    if (check1)
    {
        var check2 = confirm("Are you 100% sure to delete?");
        if (check2)
        {
            return true;
        }
        else
            return false;
    }
    else
        return false;
}
function doubleCheckChange(str)
{
    var check1 = confirm(str);
    if (check1)
    {
        var check2 = confirm("Are you 100% sure?");
        if (check2)
        {
            return true;
        }
        else
            return false;
    }
    else
        return false;
}
$(document).ready(function(){
    $(".toggle-subnav").click(function(){
        $(".toggle-subnav").removeClass("active");
        $(this).addClass("active");
    });
});