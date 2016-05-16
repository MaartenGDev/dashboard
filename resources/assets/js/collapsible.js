$(document).ready(function(){
    $('.collapsible-header').click(function () {
        var dropdownContent = $(this).parents('.collapsible').find('.collapsible-body');
        var currentContent = $(this).parent().find('.collapsible-body');
        dropdownContent.addClass('hidden');
        currentContent.removeClass('hidden');
    });
});
