<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Ajax\BaseController;

class TestController extends BaseController
{
    public function something(Request $request)
    {
    	$data = [];

    	return $this->response(self::HTTP_STATUS_CODE_OK, true, 'Success.', ['data' => $data]);
    }
}
