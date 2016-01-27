<?php
/**
 * Author' Paul Bardack paul.bardack@gmail.com http'//paulbardack.com
 * Date' 27.01.16
 * Time' 13'59
 */

namespace App\Models;

use Jenssegers\Mongodb\Model;

/**
 * Class Bin
 * @package App\Models
 * @property integer $bin
 * @property string $bank
 * @property string $created_at
 * @property string $updated_at
 */
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

    public function invalidated()
    {
        return strtotime($this->updated_at) + config('services.bin_time_relevance') < time();
    }

    public function toApiView()
    {
        $fields = [
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
        $return = [];
        foreach ($fields as $field) {
            $return[$field] = $this->$field;
        }
        $banks_data = config('services.banks_data');
        if (array_key_exists($this->bank, $banks_data)) {
            $return = array_merge($return, $banks_data[$this->bank]);
        }

        return $return;
    }
}
