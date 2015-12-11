/*
 <a href="posts/2" data-method="delete"> <---- We want to send an HTTP DELETE request

 - Or, request confirmation in the process -

 <a href="posts/2" data-method="delete" data-confirm="Are you sure?">
 */

(function () {

    var laravel = {
        initialize: function () {
            this.methodLinks = $('a[data-method]');

            this.registerEvents();
        },

        registerEvents: function () {
            this.methodLinks.on('click', this.handleMethod);
        },

        handleMethod: function (e) {
            var link = $(this);
            var httpMethod = link.data('method').toUpperCase();
            var form;

            // If the data-method attribute is not DELETE,
            // then we don't know what to do. Just ignore.
            if ($.inArray(httpMethod, ['DELETE']) === -1) {
                return;
            }

            e.preventDefault();
            return laravel.verifyConfirm(link);
        },

        verifyConfirm: function (link) {
            return bootbox.dialog(
                {
                    title: 'You are about to delete an item',
                    message: "This is not reversible.  Are you sure you want to proceed?",
                    buttons: {
                        success: {
                            label: "Yes",
                            className: "btn-primary",
                            callback: function () {
                                form = laravel.createForm(link);
                                form.submit();
                            }
                        },
                        danger: {
                            label: "No",
                            className: "btn-primary",
                        }
                    }
                }
            );
        },

        createForm: function (link) {
            var form =
                    $('<form>', {
                        'method': 'POST',
                        'action': link.attr('href')
                    });

            var token =
                    $('<input>', {
                        'type': 'hidden',
                        'name': '_token',
                        'value': window.csrfToken
                    });

            var hiddenInput =
                    $('<input>', {
                        'name': '_method',
                        'type': 'hidden',
                        'value': link.data('method')
                    });

            return form.append(token, hiddenInput)
                .appendTo('body');
        }
    };

    laravel.initialize();

})();
