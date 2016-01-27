<?php
/**
 * Author: Paul Bardack paul.bardack@gmail.com http://paulbardack.com
 * Date: 27.01.16
 * Time: 16:46
 */

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class BinListCurlException extends HttpException
{
    public function __construct($message, $code = 503)
    {
        parent::__construct($code, $message);
    }
}
