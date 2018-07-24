jQuery(function() {
    document.formvalidator.setHandler('name',
        function (value) {
            regex=/^[^0-9]+$/;
            return regex.test(value);
        });
});

jQuery(function() {
    document.formvalidator.setHandler('url',
        function (value) {
            regex=/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[\-;:&=\+\$,\w]+@)?[A-Za-z0-9\.\-]+|(?:www\.|[\-;:&=\+\$,\w]+@)[A-Za-z0-9\.\-]+)((?:\/[\+~%\/\.\w\-_]*)?\??(?:[\-\+=&;%@\.\w_]*)#?(?:[\.\!\/\\\w]*))?)/;
            return regex.test(value);
        });
});
