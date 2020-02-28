$(function() {

    $('.tombolTambahData').on('click', function() {

        $('#formModalLabel').html('Add Airports');
        $('.modal-footer button[type=submit]').html('Add Data');

        $('#code').val('');
        $('#name').val('');
        $('#cityCode').val('');
        $('#cityName').val('');
        $('#countryName').val('');
        $('#countryCode').val('');
        $('#timezone').val('');
        $('#lat').val('');
        $('#lon').val('');
        $('#numAirports').val('');
        $('#city').val('');
    });

    $('.tampilModalUbah').on('click', function() {
        
        $('#formModalLabel').html('Edit Airports Data');
        $('.modal-footer button[type=submit]').html('Update');
        $('.modal-body form').attr('action', 'http://localhost/myci/airports/update');

        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost/myci/airports/getUpdate',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id)
                $('#code').val(data.code)
                $('#name').val(data.name)
                $('#cityCode').val(data.cityCode)
                $('#cityName').val(data.cityName)
                $('#countryName').val(data.countryName)
                $('#countryCode').val(data.countryCode)
                $('#timezone').val(data.timezone)
                $('#lat').val(data.lat)
                $('#lon').val(data.lon)
                $('#numAirports').val(data.numAirports)
                $('#city').val(data.city)
            }
        });
    });
});