<?php

function serverName()
{
    $sslOrNot = env('HTTPS');
    if ($sslOrNot == FALSE)
        $sslOrNot = 'http://';
    else
        $sslOrNot = 'https://';
    return $sslOrNot . request()->getHost();
}

function checkLocale($lang)
{
    return app()->getLocale() == $lang;
}

function setSessionAppLocale($locale){
    app()->setlocale($locale);
    session()->put('locale', $locale);
}
function matchSessionAppLocale(){
    if (session()->has('locale')) {
        app()->setlocale(session('locale'));
    } else {
        session()->put('locale', app()->getLocale());
    }
}
//function checkSessionLocale($lang){
//    $locale = session('locale');
//    return $locale == $lang;
//}

function checkHeaderLang(string $lang)
{
    return request()->header('lang') == $lang ?? false;
}

function matchLocaleWithHeader()
{
    if (request()->is('api/*') && !request()->header('lang'))
        app()->setLocale('ar');
    else
        checkLocale(request()->header('lang')) ? null : app()->setLocale(request()->header('lang'));
}

function activeGuard($guard = null)
{
    if ($guard)
        return $guard;
    foreach (array_keys(config('auth.guards')) as $guard) {
        if (auth()->guard($guard)->check())
            return $guard;
    }
    return 'web';
}
