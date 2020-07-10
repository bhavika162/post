<?php

namespace App\Web;

use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class WebException
 * @package App\Web
 */
class WebException extends HttpException
{

    /**
     * ApiException constructor.
     * @param string $message
     * @param int $code
     * @param int $statusCode
     * @param \Exception|null $previous
     * @param array $headers
     */
    public function __construct($message = "Api Exception", $code = 0, $statusCode = 500, \Exception $previous = null, array $headers = array())
    {

        $headers['Exception-Type'] = 'API Exception';
        $headers['Generated-By'] = 'Laravel API Handler';
        parent::__construct($statusCode, $message, $previous, $headers, $code);

    }

}
