<script>

$('.zip').keyup(function() {
    var keyword = $(this).val();
    let autocompleteList = $(this).closest('.form-floating').find('.zip-autocomplete');

    $.ajax({
        url: "{{route('getAddress_admin')}}",
        type: "GET",
        data: {
            keyword: keyword
        },
        success: function(response) {
            autocompleteList.empty();
            autocompleteList.addClass('autocomplete');
            autocompleteList.show();
            if (response.length > 0) {
                // Loop through the results and append them to the <ul>
                response.forEach(function(city) {
                    autocompleteList.append(
                        `<li>
                            <span class="zipcode">${city.zip_code}</span> :
                            <span class="address_city">${city.city}</span>,
                            <span class="address_state">${city.state}</span>
                        </li>`
                    );
                });
            } else {
                autocompleteList.hide();
            }
        }
    });

});


$(document).on('click', '.zip-autocomplete li', function() {
    var zipcode = $(this).find('.zipcode').text();
    var city = $(this).find('.address_city').text();
    var state = $(this).find('.address_state').text();

    $(this).closest('.row').find('.city').val(city);
    $(this).closest('.row').find('.zip').val(zipcode);

    if ($(this).closest('.row').find(`.state option[value="${state}"]`).val() == state) {
        $(this).closest('.row').find('.state').val(state).trigger('change'); // Select the matching state
    } else {
        console.warn('State not found in select options:', state);
    }
    // $(this).closest('.block-content').find('.state').val(state).trigger('change');
    $(this).closest('.zip-autocomplete').hide();
});


$(document).ready(function() {
    $('#customer_id').on('change', function() {
        var customerId = $(this).val();

        if (customerId === 'new') {
            $('input[name="first_name"]').val('');
            $('input[name="last_name"]').val('');
            $('input[name="email"]').val('');
            $('input[name="phone"]').val('');
            $('input[name="phone2"]').val('');
            $('input[name="cellphone"]').val('');
            $('input[name="city"]').val('');
            $('input[name="zip"]').val('');
            $('input[name="address_1"]').val('');
            $('input[name="address_2"]').val('');
            $('select[name="state"]').val('');
            return;
        }

        $.ajax({
            url: '/dashboard/customer-data/' + customerId,
            type: 'GET',
            success: function(data) {
                $('input[name="first_name"]').val(data.first_name || '');
                $('input[name="last_name"]').val(data.last_name || '');
                $('input[name="email"]').val(data.email || '');
                $('input[name="phone"]').val(data.phone || '');
                $('input[name="phone2"]').val(data.phone2 || '');
                $('input[name="cellphone"]').val(data.cellphone || '');
                $('input[name="city"]').val(data.city || '');
                $('input[name="zip"]').val(data.zip || '');
                $('input[name="address_1"]').val(data.address_1 || '');
                $('input[name="address_2"]').val(data.address_2 || '');
                $('select[name="state"]').val(data.state || '');
            },
            error: function(xhr) {
                console.error('Failed to fetch customer data:', xhr.responseText);
            }
        });
    });
});


</script>
