jQuery(document).ready(function (){

    function makeDBMapOpt2(DataMaping) {
        var dataSel2 = Array(); var i = 0;
        for (var x in DataMaping) {
            dataSel2[i] = {};
            dataSel2[i]['id'] = x;
            dataSel2[i]['text'] = DataMaping[x];
            i++;
        }
        
        $('#feed-mapping-card select').each(function (i, ele) {
            if ($(ele).hasClass("select2-hidden-accessible")) {
                $(ele).select2('destroy');
                $(ele).attr('selected-val', "");
            }
            if ($(ele).attr('id') == 'img')
                var selConfigAry = {data: dataSel2, multiple: true}
            else
                var selConfigAry = { data: dataSel2 }
            $(ele).select2(selConfigAry);

            var selectedVal = $(ele).attr('selected-val');
            if ($(ele).attr('id') == 'img')
                selectedVal = selectedVal.split('|');
            $(ele).val(selectedVal);
            $(ele).trigger('change');
        });
        if ($('#title').attr('selected-val') == "") {
            $('#title').val('name');
            $('#title').trigger('change');
        }
        if ($('#price').attr('selected-val') == "") {
            $('#price').val('price');
            $('#price').trigger('change');
        }
        if ($('#buy_link').attr('selected-val') == "") {
            $('#buy_link').val('URL');
            $('#buy_link').trigger('change');
        }
        if ($('#img').attr('selected-val') == "") {
            $('#img').val('image_1');
            $('#img').trigger('change');
        }
        if ($('#descript').attr('selected-val') == "") {
            $('#descript').val('description');
            $('#descript').trigger('change');
        }
    }

    function getExamFeed() {
        OverLayer($('.content'),'draw');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/feed-config/get-exam-feed',
            data: {
                'merchant_name': $('#merchant_name').val(),
                'update_freq': $('#update_freq').val(),
                'feed_url': $('#feed_url').val(),
                'parser_cls': $('#parser_cls').val(),
                'active_state': $('#active_state').prop('checked')
            }, success: function (data, e) {
                OverLayer($('.content'), 'break');
                
                $('span.invalid-feedback').hide().text('');
                $('#form-feed-config input.form-control').removeClass('is-invalid');
                $('#form-feed-config select.form-control').removeClass('is-invalid');
                if (data.state === 'in_valid') {
                    var errorRes = data.res;
                    for (var x in errorRes){
                        $('#' + x).addClass('is-invalid');
                        $('#'+x+" ~ span").show().text(errorRes[x]);
                    }
                    return;
                }

                var ExamFeed = data.res['examStr'];
                var DataMaping = data.res['mapingAry'];
                var html = '';
                for(var x in ExamFeed) {
                    html += '<div class="row" style="border-bottom: 1px solid #e0dcdc; padding-top: 5px; padding-bottom: 3px;"><div class="col-3"><b>' + x + '</b></div>';
                    html += '<div class="col-9">'+ExamFeed[x] + '</div>';
                    html += '</div>';
                }
                if (html == '') html = "Can not found feed item. Please check your Feed Url";
                $('#exam-feed-div').html(html);

                makeDBMapOpt2(DataMaping);
            }, error: function(data, e) {
                OverLayer($('.content'), 'break');
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Found error in progress loading data feed. Please check your Feed Url',
                });
            }, type: 'POST', dataType:'json'
        });
    }

    function makeImgUrls(val) {
        return val.join("|");
    }  
    
    function creatFeed() {
        OverLayer($('.content'), 'draw');
        var activeState = $('#active_state').prop('checked') == false ? 0 : 1;
        var imgUrl = makeImgUrls($('#img').val());
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/feed-config',
            data: {
                'merchant_name': $('#merchant_name').val(),
                'interval_hours': $('#update_freq').val(),
                'feed_url': $('#feed_url').val(),
                'parser_cls': $('#parser_cls').val(),
                'min_price': $('#min_price').val(),
                'active_state': activeState,
                'category_config_id': $('#category_config_id').val(),
                'category_alias': $('#category_alias').val(),
                'title': $('#title').val(),
                'price': $('#price').val(),
                'buy_link': $('#buy_link').val(),
                'image': imgUrl,
                'descript': $('#descript').val(),
                'travel_type': $('#traveltype').val(),
                'duration': $('#duration').val(),
                'country': $('#country').val(),
                'region': $('#region').val(),
                'city': $('#city').val(),
                'stars': $('#stars').val(),
                'rating': $('#rating').val(),
                'service_type': $('#servicetype').val(),
                'allinclusive': $('#allinclusive').val(),
                'departure_date': $('#departuredate').val(),
                'num_person': $('#numberofpersons').val(),
                'num_offer': $('#numberofreviews').val(),
                'latitude': $('#latitude').val(),
                'longitude': $('#longitude').val(),
                'option1': $('#option1').val(),
                'option2': $('#option2').val(),
                'option3': $('#option3').val(),
                'option4': $('#option4').val(),
                'option5': $('#option5').val()
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
                    text: 'Found error in progress saving data feed.',
                });
            }, type: 'POST', dataType: 'json'
        });
    }

    function updateFeed() {
        OverLayer($('.content'), 'draw');
        var activeState = $('#active_state').prop('checked') == false ? 0 : 1;
        var imgUrl = makeImgUrls($('#img').val());
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/feed-config/' + $('#hid-feed-data-id').val(),
            data: {
                'merchant_name': $('#merchant_name').val(),
                'interval_hours': $('#update_freq').val(),
                'feed_url': $('#feed_url').val(),
                'parser_cls': $('#parser_cls').val(),
                'min_price': $('#min_price').val(),
                'active_state': activeState,
                'category_config_id': $('#category_config_id').val(),
                'category_alias': $('#category_alias').val(),
                'title': $('#title').val(),
                'price': $('#price').val(),
                'buy_link': $('#buy_link').val(),
                'image': imgUrl,
                'descript': $('#descript').val(),
                'travel_type': $('#traveltype').val(),
                'duration': $('#duration').val(),
                'country': $('#country').val(),
                'region': $('#region').val(),
                'city': $('#city').val(),
                'stars': $('#stars').val(),
                'rating': $('#rating').val(),
                'service_type': $('#servicetype').val(),
                'allinclusive': $('#allinclusive').val(),
                'departure_date': $('#departuredate').val(),
                'num_person': $('#numberofpersons').val(),
                'num_offer': $('#numberofreviews').val(),
                'latitude': $('#latitude').val(),
                'longitude': $('#longitude').val(),
                'option1': $('#option1').val(),
                'option2': $('#option2').val(),
                'option3': $('#option3').val(),
                'option4': $('#option4').val(),
                'option5': $('#option5').val()
            }, success: function (data, e) {
                OverLayer($('.content'), 'break');

                $('span.invalid-feedback').hide().text('');
                $('#feed-mapping-card input.form-control').removeClass('is-invalid');
                $('#feed-mapping-card select.form-control').removeClass('is-invalid');
                if (data.state === 'in_valid') {
                    var errorRes = data.res;
                    for (var x in errorRes) {
                        $('#' + x).addClass('is-invalid');
                        $('#' + x + " ~ span.invalid-feedback").show().text(errorRes[x]);
                    }
                    return;
                }

                Swal.fire({
                    type: 'success',
                    title: 'Success Action',
                    text: 'Success your action',
                }).then((result) => {
                    document.location.href = '/feed-config';
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

    $('#category_config_id').select2({placeholder: 'Category Group'});
    var selectedVal = $('#category_config_id').attr('selected-val');
    $('#category_config_id').val(selectedVal);
    $('#category_config_id').trigger('change');

    $('#btn-get-exam-feed').click(function(){
        getExamFeed();
    });

    if ($('#hid-feed-data-id').val() != "" || false) {
        getExamFeed();
    }

    $('#btn-save-feed').click(function(){
        creatFeed();
    });

    $('#btn-update-feed').click(function () {
        updateFeed();
    });

});