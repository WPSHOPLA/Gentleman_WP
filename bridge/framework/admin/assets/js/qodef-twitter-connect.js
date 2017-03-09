(function($) {
    $(document).ready(function() {
        qodefTwitterRequestToken();
    });

    function qodefTwitterRequestToken() {
        if($('#qodef-tw-request-token-btn').length) {
            $('#qodef-tw-request-token-btn').click(function(e) {
                e.preventDefault();

                var that = $(this);
                var currentPageUrl = $('input[data-name="current-page-url"]').val();

                //@TODO get this from data attr
                $(this).text('Working...');

                var data = {
                    action: 'qode_twitter_obtain_request_token',
                    currentPageUrl: currentPageUrl
                }

                $.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        if(typeof response.status !== 'undefined' && response.status) {
                            $(that).text('Redirect to Twitter...');

                            if(typeof response.redirectURL !== 'undefined' && response.redirectURL !== '') {
                                window.location = response.redirectURL;
                            }
                        } else {
                            alert(response.message);
                        }
                    }
                });
            });
        }
    }
})(jQuery)
