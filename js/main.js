$(document).ready(function () {
    $('#gmenu .dropdown ul').addClass('dropdown-menu');
})
function clickone(_this) {
    $('select[name="Application[paper_id]"], select[name="Store[paper_id]"]').val($(_this).attr('data-id')).trigger('change');
    return false;
}

function clickonestate(_this) {
    $('select[name="Application[state_id]"], select[name="Store[state_id]"]').val($(_this).attr('data-id')).trigger('change');
    return false;
}

function clickoneheight(_this) {
    $('input[name="Application[height]"], input[name="Store[height]"]').val($(_this).attr('data-id')).trigger('change');
    return false;
}

function clickonewidth(_this) {
    $('input[name="Application[width]"], input[name="Store[width]"]').val($(_this).attr('data-id')).trigger('change');
    return false;
}

function clickonecreated_from(_this) {
    $('input[name="Application[created_from]"], input[name="Store[created_from]"]').val($(_this).attr('data-id')).trigger('change');
    return false;
}

function clickonecreated_to(_this) {
    $('input[name="Application[created_to]"], input[name="Store[created_to]"]').val($(_this).attr('data-id')).trigger('change');
    return false;
}

function clickonenomer(_this) {
    $('input[name="Store[nomer_search]"], input[name="Application[nomer_search]"]').val($(_this).attr('data-id')).trigger('change');
    return false;
}