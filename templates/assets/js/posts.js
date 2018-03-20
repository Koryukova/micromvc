$(function () {

    $(".post .like").on("click", function () {
        var count = $(this).find('.count');
        var icon = $(this).find('i.fa-heart');
        $.ajax({
            url: '/micromvc/?act=like',
            data: {
                act: 'like',
                post_id: 1
            },
            type: 'GET',
            dataType: 'json',
            success: function (data) {


                icon
                    .removeClass('far')
                    .removeClass('fas');

                if (data.is_like) {
                    icon.addClass('fas');
                } else {
                    icon.addClass('far');
                }
                count.text(data.like_count);
            },
            error: function (data) {
                alert(data);
            }
        });

    });

});

