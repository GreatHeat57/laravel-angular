jQuery(document).ready(function (){
    
    function creatCategory() {
        var showAry = "";
        $('#show-config input[type=checkbox]').each(function (i, ele) {
            showAry += "," + ($(ele).prop('checked') == true ? '1' : '0');
        });
        showAry = showAry.slice(1,showAry.length);

        // return;
        OverLayer($('.content'), 'draw');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/category-config',
            data: {
                'category_name': $('#category_name').val(),
                'search_text_0': $('#search_text_0').val(),
                'search_field_0': $('#search_field_0').val(),
                'search_text_1': $('#search_text_1').val(),
                'search_field_1': $('#search_field_1').val(),
                'search_text_2': $('#search_text_2').val(),
                'search_field_2': $('#search_field_2').val(),
                'search_text_3': $('#search_text_3').val(),
                'search_field_3': $('#search_field_3').val(),
                'search_text_4': $('#search_text_4').val(),
                'search_field_4': $('#search_field_4').val(),
                'search_text_5': $('#search_text_5').val(),
                'search_field_5': $('#search_field_5').val(),
                'search_text_6': $('#search_text_6').val(),
                'search_field_6': $('#search_field_6').val(),
                'search_text_7': $('#search_text_7').val(),
                'search_field_7': $('#search_field_7').val(),
                'search_text_8': $('#search_text_8').val(),
                'search_field_8': $('#search_field_8').val(),
                'search_text_9': $('#search_text_9').val(),
                'search_field_9': $('#search_field_9').val(),
                'show_array': showAry
            }, success: function (data, e) {
                OverLayer($('.content'), 'break');
                
                $('span.invalid-feedback').hide().text('');
                $('#feed-mapping-card input.form-control').removeClass('is-invalid');
                $('#feed-mapping-card select.form-control').removeClass('is-invalid');
                if (data.state === 'in_valid') {
                    var errorRes = data.res;
                    for (var x in errorRes) {
                        $('#' + x).addClass('is-invalid');
                        $('#' + x + " ~ span").show().text(errorRes[x]);
                    }
                    return;
                }

                Swal.fire({
                    type: 'success',
                    title: 'Success Action',
                    text: 'Success your action',
                });
            }, error: function (data, e) {
                OverLayer($('.content'), 'break');
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Found error in progress saving category.',
                });
            }, type: 'POST', dataType: 'json'
        });
    }

    function updateCategory() {
        OverLayer($('.content'), 'draw');
        var show_array = "";
        $('#show-config input[type=checkbox]').each(function (i, ele) {
            if (i > 0) show_array += ","
            show_array += ($(ele).prop('checked')) ? 1 : 0;
        });

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/category-config/' + $('#hid-category-id').val(),
            data: {
                'category_name': $('#category_name').val(),
                'search_text_0': $('#search_text_0').val(),
                'search_field_0': $('#search_field_0').val(),
                'search_text_1': $('#search_text_1').val(),
                'search_field_1': $('#search_field_1').val(),
                'search_text_2': $('#search_text_2').val(),
                'search_field_2': $('#search_field_2').val(),
                'search_text_3': $('#search_text_3').val(),
                'search_field_3': $('#search_field_3').val(),
                'search_text_4': $('#search_text_4').val(),
                'search_field_4': $('#search_field_4').val(),
                'search_text_5': $('#search_text_5').val(),
                'search_field_5': $('#search_field_5').val(),
                'search_text_6': $('#search_text_6').val(),
                'search_field_6': $('#search_field_6').val(),
                'search_text_7': $('#search_text_7').val(),
                'search_field_7': $('#search_field_7').val(),
                'search_text_8': $('#search_text_8').val(),
                'search_field_8': $('#search_field_8').val(),
                'search_text_9': $('#search_text_9').val(),
                'search_field_9': $('#search_field_9').val(),
                'show_array': show_array
            }, success: function (data, e) {
                OverLayer($('.content'), 'break');

                $('span.invalid-feedback').hide().text('');
                $('#feed-mapping-card input.form-control').removeClass('is-invalid');
                $('#feed-mapping-card select.form-control').removeClass('is-invalid');
                if (data.state === 'in_valid') {
                    var errorRes = data.res;
                    for (var x in errorRes) {
                        $('#' + x).addClass('is-invalid');
                        $('#' + x + " ~ span").show().text(errorRes[x]);
                    }
                    return;
                }

                Swal.fire({
                    type: 'success',
                    title: 'Success Action',
                    text: 'Success your action',
                }).then((result) => {
                    document.location.href = '/category-config';
                });
            }, error: function (data, e) {
                OverLayer($('.content'), 'break');
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Found error in progress saving data feed.',
                });
            }, type: 'PUT', dataType: 'json'
        });
    }

    function makeSearchItem() {
        $('#search-config form select').each(function (i, ele) {
            if ($(ele).hasClass("select2-hidden-accessible")) {
                $(ele).select2('destroy');
            }
            var dataSel2Source = {
                'title': 'title',
                'price': 'price',
                'descript': 'descript',
                'travel_type': 'travel type',
                'duration': 'duration',
                'country': 'country',
                'region': 'region',
                'city': 'city',
                'stars': 'stars',
                'rating': 'rating',
                'service_type': 'service type',
                'allinclusive': 'allinclusive',
                'departure_date': 'departure date',
                'num_person': 'number of person',
                'num_offer': 'number of offer',
                'latitude': 'latitude',
                'longitude': 'longitude',
                'option1': 'option1',
                'option2': 'option2',
                'option3': 'option3',
                'option4': 'option4',
                'option5': 'option5'
            };
    
            var dataSel2 = Array();
            for (var x in dataSel2Source) {
                dataSel2[i] = {};
                dataSel2[i]['id'] = x;
                dataSel2[i]['text'] = dataSel2Source[x];
                i++;
            }
    
            $(ele).select2({ data: dataSel2, placeholder: 'Select your item of search' });
            var selectedVal = $(ele).attr('selected-val');
            if (selectedVal != "") {
                $(ele).val(selectedVal);
                $(ele).trigger('change');
            }
        });
    }

    makeSearchItem();

    $('#btn-save-category').click(function(){
        creatCategory();
    });

    $('#btn-update-category').click(function () {
        updateCategory();
    });

});