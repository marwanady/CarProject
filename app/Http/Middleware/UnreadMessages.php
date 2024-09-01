<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\contact;
use Illuminate\Support\Facades\View;




class UnreadMessages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $unreadmessage_count = Contact::where('is_read',false)->count();
        View::share('unreadmessage_count', $unreadmessage_count);
        return $next($request);
    }
}
