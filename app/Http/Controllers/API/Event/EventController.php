<?php

namespace App\Http\Controllers\API\Event;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Event\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::get();
        return ApiResponse::sendResponse(Response::HTTP_OK, 'All events retrieved successfully', EventResource::collection($events));
    }

    public function show($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return ApiResponse::sendResponse(Response::HTTP_NOT_FOUND, 'Event not found', null);
        }

        return ApiResponse::sendResponse(Response::HTTP_OK, 'Event retrieved successfully', new EventResource($event));
    }

}
