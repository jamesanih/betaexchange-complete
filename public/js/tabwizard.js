$(document).ready(function(){
    var validator = $('#formWizard2').validate();

    var tabs = $('panel-tab').tabs({
        select:function(event, ui) {
            var valid = true;
            var current = $(this).tabs('options', 'selected');
        }
    })
});