<?php

if ( ! function_exists('is_installed'))
{
    /**
     * Checks if Nuclear is installed
     *
     * @return bool
     */
    function is_installed()
    {
        return ((env('APP_STATUS', 'INSTALLED') === 'INSTALLED') && ! empty(env('DB_DATABASE')));
    }
}

if ( ! function_exists('is_request_reactor'))
{
    /**
     * Checks if the request is a reactor request
     *
     * @return bool
     */
    function is_request_reactor()
    {
        return (request()->segment(1) === config('app.reactor_prefix'));
    }
}

if ( ! function_exists('is_request_install'))
{
    /**
     * Checks if the request is a reactor request
     *
     * @return bool
     */
    function is_request_install()
    {
        return (request()->segment(1) === 'install');
    }
}

if ( ! function_exists('nuclear_version'))
{
    /**
     * Returns the current nuclear version
     *
     * @return int
     */
    function nuclear_version()
    {
        return Reactor\Providers\ReactorServiceProvider::VERSION;
    }
}

if ( ! function_exists('routes_path'))
{
    /**
     * Returns the routes path
     *
     * @param string $path
     * @return string
     */
    function routes_path($path = '')
    {
        return app()->make('path.routes') . ($path ? '/' . $path : $path);
    }
}

if ( ! function_exists('uppercase'))
{
    /**
     * Converts string to uppercase depending on the language
     * This helper mainly resolves the issue for Turkish i => İ
     * This should otherwise be done with CSS
     *
     * @param string
     * @return string
     */
    function uppercase($string)
    {
        if (App::getLocale() === 'tr')
        {
            return mb_strtoupper(str_replace('i', 'İ', $string), 'UTF-8');
        }

        return mb_strtoupper($string, 'UTF-8');
    }
}

if ( ! function_exists('locales'))
{
    /**
     * Returns app locales
     *
     * @return array
     */
    function locales()
    {
        return config('translatable.locales');
    }
}

if ( ! function_exists('locale_count'))
{
    /**
     * Returns the locale count of the app
     *
     * @return int
     */
    function locale_count()
    {
        return count(config('translatable.locales'));
    }
}

if ( ! function_exists('get_full_locale_for'))
{
    /**
     * Returns the locale count of the app
     *
     * @param string $locale
     * @param bool $trim
     * @return string
     */
    function get_full_locale_for($locale, $trim = false)
    {
        $locale = config('translatable.full_locales.' . $locale);

        return $trim ? rtrim($locale, '.UTF-8') : $locale;
    }
}