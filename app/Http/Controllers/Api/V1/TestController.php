<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Api\BaseController;

class TestController extends BaseController
{
    public function something(Request $request)
    {
    	$this->authenticate($request);

    	$data = [];

    	return $this->response(self::HTTP_STATUS_CODE_OK, true, 'Success.', ['data' => $data]);
    }
}
