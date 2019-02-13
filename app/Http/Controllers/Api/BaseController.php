<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    // Success
    const HTTP_STATUS_CODE_OK						= 200; // Everything is working.
    const HTTP_STATUS_CODE_CREATED                  = 201; // New resource has been created.
    const HTTP_STATUS_CODE_NO_CONTENT				= 204; // The resource was successfully edited (optional) or deleted.

    // Client Error
    const HTTP_STATUS_CODE_BAD_REQUEST				= 400; // The request was invalid or cannot be served.
    const HTTP_STATUS_CODE_UNAUTHORIZED 			= 401; // The request requires an user authentication.
    const HTTP_STATUS_CODE_FORBIDDEN                = 403; // The server understood the request, but is refusing it or the access is not allowed.
    const HTTP_STATUS_CODE_NOT_FOUND 				= 404; // There is no resource behind the URI.
    const HTTP_STATUS_CODE_CONFLICT 				= 409; // The request could not be completed due to a conflict with the current state of the target resource.
    const HTTP_STATUS_CODE_UNPROCESSABLE_ENTITY     = 422; // The server cannot process the entity, e.g. if an image cannot be formatted or mandatory fields are missing in the payload.

    // Server Error
    const HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR    = 500; // A generic error message, given when an unexpected condition was encountered and no more specific message is suitable.

    /**
     * The error is used as a "catch-all response for when the origin server returns something unexpected", listing connection resets, large headers, and empty or invalid responses as common triggers.
     * Common causes:
     * - Connection resets after a successful TCP handshake.
     * - Headers that exceed size limit.
     * - An empty response from the origin server.
     * - An invalid HTTP response.
     * - An HTTP response without response headers.
     */
    const HTTP_STATUS_CODE_UNKNOWN_ERROR   			= 520;

    public $user; // Authenticated user

    /**
     * Authenticate a JWT token
     *
     * @param $request
     * @return mixed - To be remove
     */
    public function authenticate(Request $request)
    {
        $this->user = JWTAuth::authenticate($request->token);
    }

    /**
     * Response
     *
     * @param $status
     * @param $success
     * @param $message
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function response($status, $success, $message, $data = [])
    {
        return response()->json([
            'status'    => $status,
            'success'   => $success,
            'message'   => $message,
            'data'      => (object) $data
        ], $status);
    }
}
