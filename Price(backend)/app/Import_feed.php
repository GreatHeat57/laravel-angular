<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import_feed extends Model
{
    protected $table = 'import_feed';
    protected $fillable = [
        'data_feed_id',
        'category_feed_id',
        'product_id',
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
