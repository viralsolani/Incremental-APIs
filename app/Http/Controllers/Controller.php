<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Routing\Controller as BaseController;
use Response;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    /**
     * default status code.
     *
     * @var int
     */
    protected $statusCode = 200;

    /**
     * get the status code.
     *
     * @return statuscode
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * set the status code.
     *
     * @param [type] $statusCode [description]
     *
     * @return mix
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * responsd not found.
     *
     * @param string $message
     *
     * @return mix
     */
    public function respondNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * Respond with error.
     *
     * @param string $message
     *
     * @return mix
     */
    public function respondInternalError($message = 'Internal Error')
    {
        return $this->setStatusCode('500')->respondWithError($message);
    }

    /**
     * Respond.
     *
     * @param array $data
     * @param array $headers
     *
     * @return mix
     */
    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }

    /**
     * respond with pagincation.
     *
     * @param Paginator $lessions
     * @param array     $data
     *
     * @return mix
     */
    public function respondWithPagination($lessions, $data)
    {
        $data = array_merge($data, [
            'paginator'   => [
                'total_count'   => $lessions->total(),
                'total_pages'   => ceil($lessions->total() / $lessions->perPage()),
                'current_page'  => $lessions->currentPage(),
                'limit'         => $lessions->perPage(),
             ],
        ]);

        return $this->respond($data);
    }

    /**
     * respond with error.
     *
     * @param $message
     *
     * @return mix
     */
    public function respondWithError($message)
    {
        return $this->respond([
                'error' => [
                    'message'     => $message,
                    'status_code' => $this->getStatusCode(),
                ],
            ]);
    }

    /**
     * Respond Created.
     *
     * @param string $message
     *
     * @return mix
     */
    public function respondCreated($message)
    {
        return $this->setStatusCode(201)->respond([
            'message' => $message,
        ]);
    }

    /**
     * Throw Validation.
     *
     * @param string $message
     *
     * @return mix
     */
    public function throwValidation($message)
    {
        return $this->setStatusCode(422)
                        ->respondWithError($messaege);
    }
}
