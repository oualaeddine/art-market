$(document).ready(function () {
    $('#wilaya_id').on('change', function () {
        var id = $(this).val();

        $.ajax({
            url: '/GetCommune/'+id,
            type: 'GET',
            dataType: 'json',
            error: function(error) {
                console.log(error)
            },
            success: function(data) {
                $('#commune_id').empty()

                $('#commune_id').append("<option value='' disabled selected>Your commune</option>")
                $.each(data, function (i, commune) {
                    $('#commune_id').append(new Option(commune.text,commune.id,false,false))
                });
                $('.select').niceSelect('destroy'); //destroy the plugin
                $('.select').niceSelect(); //apply again
            }
        });
    });
});
