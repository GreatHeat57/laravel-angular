<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_feed_config extends Model
{
    protected $table = 'data_feed_config';
    protected $fillable = [
        'merchant_name',
        'interval_hours',
        'feed_url',
        'parser_cls',
        'min_price',
        'active_state',
        'category_config_id',
        'category_alias',
        'title',
        'price',
        'buy_link',
        'image',
        'descript',
        'travel_type',
        'duration',
        'country',
        'region',
        'city',
        'stars',
        'rating',
        'service_type',
        'allinclusive',
        'departure_date',
        'num_person',
        'num_offer',
        'latitude',
        'longitude',
        'option1',
        'option2',
        'option3',
        'option4',
        'option5'
    ];
}
