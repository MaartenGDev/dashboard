$(document).ready(function () {
    $('.collapsible-header').click(function () {
        var dropdownContent = $(this).parents('.collapsible').find('.collapsible-body');
        var currentContent = $(this).parent().find('.collapsible-body');
        var isHidden = currentContent.hasClass('hidden');
        dropdownContent.addClass('hidden');

        if(isHidden) currentContent.removeClass('hidden');

    });
});
