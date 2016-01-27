<?php
/**
 * Author' Paul Bardack paul.bardack@gmail.com http'//paulbardack.com
 * Date' 27.01.16
 * Time' 13'59
 */

namespace App\Models;

use Jenssegers\Eloquent\Model;

class Bin extends Model
{
    protected $fillable = [
        'bin',
        'brand',
        'sub_brand',
        'country_code',
        'country_name',
        'bank',
        'card_type',
        'card_category',
        'latitude',
        'longitude',
    ];
}
