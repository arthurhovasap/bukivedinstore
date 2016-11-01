$(document).ready(function () {
    $('#gmenu .dropdown ul').addClass('dropdown-menu');
})
function clickone(_this){
        $('select[name="Application[paper_id]"]').val($(_this).attr('data-id')).trigger('change');
        $('#City').val('A').trigger('change');
        return false;
    }