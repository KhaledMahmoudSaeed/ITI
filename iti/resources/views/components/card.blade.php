@props(['type' => 'all'])
@php
    $class = 'group relative';
    if ($type == 'description') {
        $class = 'h-[15%] flex flex-col justify-center items-center mt-2 text-center';
    } elseif ($type == 'borrowed') {
        $class = 'flex flex-wrap justify-center space-x-1 mt-1 w-full';
    } elseif ($type == 'commponnent') {
        $class = 'aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-900 lg:aspect-none group';
    }
@endphp

<div class="{{ $class }}"> {{ $slot }}</div>
