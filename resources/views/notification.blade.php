<div class="notification @isset($type) notification--{{ $type }} @endisset border-t-4 text-white px-4 py-3" role="alert">
    <div class="text-center">
        <div class="notification--svg"></div>
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
