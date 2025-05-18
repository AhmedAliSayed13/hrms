<?php

namespace App\Http\Middleware;

use Closure;

class StripHeaders
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
        // تحذف رأس معين لو موجود
        $headersToRemove = [
            'sec-ch-ua',
            'sec-ch-ua-mobile',
            'sec-fetch-site',
            'sec-fetch-mode',
            'sec-fetch-user',
            'sec-fetch-dest',
            'accept-encoding',
            'accept-language',
            // أضف الرؤوس التي تريد حذفها
        ];

        foreach ($headersToRemove as $header) {
            if ($request->headers->has($header)) {
                $request->headers->remove($header);
            }
        }

        return $next($request);
    }
}
