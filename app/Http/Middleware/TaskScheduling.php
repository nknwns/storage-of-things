<?php

namespace App\Http\Middleware;

use App\Models\View;
use Carbon\Carbon;
use Closure;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;

class TaskScheduling
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->getClientIP();

        $viewIsExist = View::where('ip', '=', $ip)->whereDate('created_at', Carbon::today())->exists();

        if (!$viewIsExist) {
            $view = new View();
            $view->ip = $ip;
            $view->save();
        }

        return $next($request);
    }
}
