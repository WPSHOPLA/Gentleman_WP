(function($) {
    "use strict";

    $(document).ready(function($){
        initQodeLike();
    });

    function initQodeLike(){
        $(document).on('click','.qode-like', function() {

            var likeLink = $(this);
            var id = $(this).attr('id');

            if(likeLink.hasClass('liked')) return false;

            var type = '';
            if(typeof likeLink.data('type') !== 'undefined') {
                type = likeLink.data('type');
            }

            var $dataToPass = {
                action: 'qode_like',
                likes_id: id,
                type: type
            }

            $.ajax({
                method: 'POST',
                url: qodeLike.ajaxurl,
                data: $dataToPass,
                success: function(data) {
                    likeLink.html(data).addClass('liked').attr('title','You already like this!');
                    likeLink.find('span').css('opacity',1);
                }
            });

            return false;
        });
    }
})(jQuery)