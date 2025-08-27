<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Gate;
use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{

    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        if (!in_array(strtolower($user->role), $roles)) {
            // Agar unauthorized hai to JSON / session me message bhej do
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['error' => 'Unauthorized access'], 403);
            }

            // Normal web request ke liye flash message
            return redirect()->back()->with('error', 'Unauthorized Access! You cannot open this page.');
        }

        return $next($request);
    }

   
}
