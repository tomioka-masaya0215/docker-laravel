@props(['width'])
<img {{ $attributes->merge(['width' => $width.'px']) }} src="{{asset('img/logo.png')}}">
