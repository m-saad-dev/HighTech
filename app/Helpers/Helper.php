<?php

    use App\Helpers\PdfFacade;

    function printPdf(string $view, array $data, string $fileName, $orientation = 'P'): void
{
    $pdf = new PdfFacade($view, $data, $fileName, $orientation);
    $pdf->printPdf();
}

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

function checkWebsiteActiveRouteName(string $routeNames, string $key)
{
//    if ($key)
    dd($routeNames, request()->route()->uri());
}
function checkActiveRouteName(array $routeNames, string $key = null, string $value = null)
{
    if (in_array(request()->route()->getName(), $routeNames)){
        if (isset($key) && isset($value) && ((request()->has($key) && request()->{$key} == $value)|| (request()->route()->hasParameter($key) && request()->route()->parameter($key) == $value ))){
        //the second if is for the settings route which active (has same routeName and same key but different value of the key
            return true;
        } elseif ( isset($key) && isset($value) && ( !(request()->has($key) && request()->{$key} == $value)|| !(request()->route()->hasParameter($key) && request()->route()->parameter($key) == $value ))){
        //the elseif is for the settings route not active (has same routeName and same key but different value of the key
            return false;
        }

        //else if for the different routes which active
        return true;
    }
    return false;
}

function ifRemovedIdsRemoveImages($request, $item)
{
    if ($request->removedIds){
        $removedIds = strpos($request->removedIds, ',') === 0 ? [$request->removedIds] : explode(',', $request->removedIds);
        $item->media()->whereIn('id', $removedIds)->delete();
    }
}
