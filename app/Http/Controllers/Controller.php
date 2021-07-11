<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public static function getResponse($message, $code = 200, $data = 0)
    {
        switch ($code) {
            case 200:
                $state = 'Action Completed';
                break;
            case 201:
                $state = 'Recored Created';
                break;
            case 304:
                $state = 'Action Not Completed';
                break;
            case 401:
                $state = 'Action Not Allowed';
                break;
            case 404:
                $state = 'Recored Not Found';
                break;
            case 405:
                $state = 'Method Not Allowed';
                break;
            default:
                $state = 'Unkown State';
        }

        return response()->json([
            'status' => $state,
            'message' => $message,
            'data' => $data
        ], $code);
    }

   

    public static function  paginate($items, $perPage = 0, $page = null, $options = [])
    {
        $pageName = 'page';
        $options = [
            'path'     => Paginator::resolveCurrentPath(),
            'pageName' => $pageName,
        ];

        if ($perPage == null || $perPage == 0) {
            $perPage = 10;
        }

        $page = $page ?: (Paginator::resolveCurrentPage($pageName) ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator(
            $items->forPage($page, $perPage)->values(),
            $items->count(),
            $perPage,
            $page,
            $options
        );
    }

}
