(function ($) {

    $(document).on(
        'click touchstart',
        '.addCriterion',
        function (event) {
            event.preventDefault();
            var template = '<p><input type="text" name="criterions[]" value=""></p>';
            $(template).insertBefore($(this));
        }
    );

    $(document).ready(function(){
        $('.color-picker').wpColorPicker();
    });

})(jQuery)