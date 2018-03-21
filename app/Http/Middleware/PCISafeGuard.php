<?php

namespace App\Http\Middleware;

use Closure;

class PCISafeGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(!$request->isMethod('post')) {
            return $next($request);
        }

        $is_it_probably_credit_card = '\b(?:\d[ -]*?){13,16}\b';
        $does_it_resemble_a_credit_card = '\b(3[47]\d{2}([ -]?)(?!(\d)\3{5}|123456|234567|345678)\d{6}\2(?!(\d)\4{4})\d{5}|((4\d|5[1-5]|65)\d{2}|6011)([ -]?)(?!(\d)\8{3}|1234|3456|5678)\d{4}\7(?!(\d)\9{3})\d{4}\7\d{4})\b';

        foreach($request->toArray() as $validation) {
            if(preg_match($is_it_probably_credit_card, $validation)) {
                return redirect()->back()->withErrors(['msg', 'The input you provided matched a pattern that is probably a Credit Card Number. This is not permitted.']);
            }
            if(preg_match($does_it_resemble_a_credit_card, $validation)) {
                return redirect()->back()->withErrors(['msg', 'The input you provided matched a pattern that is resembles a Credit Card Number. This is not permitted.']);
            }
        }
        return $next($request);
    }
}
