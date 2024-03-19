<?php

function app_url(string $path = '')
{
    return implode('/', [
        trim(config('app.url'), '/'),
        trim($path, '/')
    ]);
}

function uuid(): string
{
    return (string) Str::uuid();
}
