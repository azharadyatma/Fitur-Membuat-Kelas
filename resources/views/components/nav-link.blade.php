@props(['active'=>false])

<a {{ $attributes }}
    class="{{ $active? 'bg-red-800 text-white' : 'text-white hover:bg-red-800 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
    aria-current="{{ $active?'page' : false}}" {{ $attributes }} > {{ $slot }}</a>
