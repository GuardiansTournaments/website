<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config("app.name", "Guardians Tournaments") }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet" />

        <!-- Scripts -->
        <script src="{{ asset('/js/app.js') }}" defer></script>

        <!-- Favicon -->
        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="/images/favicon/apple-touch-icon.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="32x32"
            href="/images/favicon/favicon-32x32.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="/images/favicon/favicon-16x16.png"
        />
        <link
            rel="mask-icon"
            href="/images/favicon/safari-pinned-tab.svg"
            color="#5bbad5"
        />
    </head>
</html>
