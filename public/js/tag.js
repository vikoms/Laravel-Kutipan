    var i = 0;
    $(document).ready(function () {
        $('#add_tag').click(function () {
            i++;
            if (i < 3) {
                $("#tag_select").clone().appendTo('#tag_wrapper');
            }
        });
    });
