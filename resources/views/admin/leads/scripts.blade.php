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


</script>
