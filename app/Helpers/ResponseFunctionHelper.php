<?php

use Illuminate\Http\JsonResponse;

function createdResponse($data = [], $message = 'Created', $status = 'success'): JsonResponse
{
    return response()->json([
        'message' => $message,
        'status' => $status,
        'data' => $data,
    ], 201);
}

function okResponse($data = [], $message = 'ok', $status = 'ok'): JsonResponse
{
    return response()->json([
        'message' => $message,
        'status' => $status,
        'data' => $data,
    ]);
}

function badRequestResponse($message = 'Bad Request', $data = [], $status = 'bad_request'): JsonResponse
{
    return response()->json([
        'message' => $message,
        'status' => $status,
        'data' => $data,
    ], 400);
}

function unauthorizedRequestResponse($message = 'Unauthorized', $data = [], $status = 'unauthorized'): JsonResponse
{
    return response()->json([
        'message' => $message,
        'status' => $status,
        'data' => $data,
    ], 401);
}

function forbiddenRequestResponse($message = 'Forbidden', $data = [], $status = 'forbidden'): JsonResponse
{
    return response()->json([
        'message' => $message,
        'status' => $status,
        'data' => $data,
    ], 403);
}

function notFoundRequestResponse($message = 'Not Found', $data = [], $status = 'not_found'): JsonResponse
{
    return response()->json([
        'message' => $message,
        'status' => $status,
        'data' => $data,
    ], 404);
}

function methodNotAllowedRequestResponse($message = 'Method Not Allowed', $data = [], $status = 'method_not_allowed'): JsonResponse
{
    return response()->json([
        'message' => $message,
        'status' => $status,
        'data' => $data,
    ], 405);
}

function tooManyRequestsResponse($message = 'Too Many Requests', $data = [], $status = 'too_many_requests'): JsonResponse
{
    return response()->json([
        'message' => $message,
        'status' => $status,
        'data' => $data,
    ], 429);
}

function serverErrorResponse($message = 'Something went wrong', $data = [], $status = 'server_error'): JsonResponse
{
    return response()->json([
        'message' => $message,
        'status' => $status,
        'data' => $data,
    ], 500);
}

function errorResponse($message, $data = [], $status = null, $statusCode = 500): JsonResponse
{
    return response()->json([
        'message' => $message,
        'status' => $status,
        'data' => $data,
    ], $statusCode);
}

function successResponse($message, $data = [], $status = 'success', $statusCode = 200): JsonResponse
{
    return response()->json([
        'message' => $message,
        'status' => $status,
        'data' => $data,
    ], $statusCode);
}
