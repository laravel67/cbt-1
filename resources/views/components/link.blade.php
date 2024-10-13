@props(['href'=> '/', 'active'=> []])
@php
    $currentRoute = Request::route()->getName();
    $isActive = in_array($currentRoute, (array) $active);
@endphp

<a href="{{ $href }}" class="nav-item nav-link {{ $isActive ? 'active' : '' }}" wire:navigate>
    {{ $slot }}
</a>