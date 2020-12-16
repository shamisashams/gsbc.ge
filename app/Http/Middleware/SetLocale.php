<?php

namespace App\Http\Middleware;

use App\Models\Localization;
use Closure;
use function PHPUnit\Framework\throwException;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);
        $localization = Localization::where('abbreviation',$locale)->first();
         if ($localization == null) {
             throwException('Localization is wrong.');
         }
         if (!$localization->status) {
             throwException('Localization is disabled..');
         }
        app()->setLocale($locale);
        return $next($request);
    }
}
