<?php
/**
 * Author: Paul Bardack paul.bardack@gmail.com http://paulbardack.com
 * Date: 27.01.16
 * Time: 13:54
 */

namespace App\Services;

use App\Exceptions\BinListCurlException;
use App\Models\Bin;

class BinList
{
    private $base_url = 'https://www.binlist.net/';

    /**
     * @param $bin
     * @return mixed
     */
    public function getJsonData($bin)
    {
        /** @var Bin $model */
        $model = Bin::where('bin', $bin)->first();
        if (!$model) {
            $model = Bin::create($this->httpGet($this->makeUrl('json', $bin)));
        } elseif ($model->invalidated()) {
            $model->setRawAttributes($this->httpGet($this->makeUrl('json', $bin)))->save();
        }

        return $model->toApiView();
    }

    private function makeUrl($type, $bin)
    {
        return sprintf($this->base_url . '%s/%d', $type, $bin);
    }

    private function httpGet($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BUFFERSIZE, 4096);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);

        $response = curl_exec($ch);

        if ($response === false) {
            throw new BinListCurlException(curl_error($ch));

        } elseif (($code = curl_getinfo($ch)['http_code']) !== 200) {
            throw new BinListCurlException("service_bad_response", $code);
        }

        return json_decode($response, true);
    }
}
