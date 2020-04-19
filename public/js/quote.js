$(document).on('click', '.btn-like', function () {
    var _this = $(this)

    var _url = "/like/" + _this.attr('data-type') +
        "/" + _this.attr('data-model-id')

    $.get(_url, function (data) {
        if (data == '0') {
            _this.next('.total_like').find('.like_warning').show().delay(500).fadeOut('slow')
        } else {
            _this.addClass('btn-danger btn-unlike').removeClass('btn-like').html('Unlike')
            var likeNumber = _this.parents('.like_wrapper').find('.like_number')
            likeNumber.html(parseInt(likeNumber.html()) + 1)
        }

    })
})

$(document).on('click', '.btn-unlike', function () {
    var _this = $(this)

    var _url = "/unlike/" + _this.attr('data-type') +
        "/" + _this.attr('data-model-id')

    $.get(_url, function (data) {

        _this.removeClass('btn-danger btn-unlike').addClass('btn-primary btn-like').html('Like')
        var likeNumber = _this.parents('.like_wrapper').find('.like_number')
        likeNumber.html(parseInt(likeNumber.html()) - 1)

    })
})
