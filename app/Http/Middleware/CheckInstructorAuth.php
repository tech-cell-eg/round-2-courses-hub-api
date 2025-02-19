<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckInstructorAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $instructor = Auth::guard('instructors')->user();

        if (!$instructor) {
            return response()->json(['message' => 'Unauthorized - No instructor found'], 401);
        }

        return $next($request);
    }

}
