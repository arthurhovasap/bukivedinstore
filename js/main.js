$(document).ready(function () {
    $('#gmenu .dropdown ul').addClass('dropdown-menu');
})
function clickone(_this) {
    $('select[name="Application[paper_id]"]').val($(_this).attr('data-id')).trigger('change');
    $('#City').val('A').trigger('change');
    return false;
}

function clickonestate(_this) {
    $('select[name="Application[state_id]"]').val($(_this).attr('data-id')).trigger('change');
    $('#City').val('A').trigger('change');
    return false;
}

function clickoneheight(_this) {
    $('input[name="Application[height]"]').val($(_this).attr('data-id')).trigger('change');
    $('#City').val('A').trigger('change');
    return false;
}

function clickonewidth(_this) {
    $('input[name="Application[width]"]').val($(_this).attr('data-id')).trigger('change');
    $('#City').val('A').trigger('change');
    return false;
}