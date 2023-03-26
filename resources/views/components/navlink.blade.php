<li class="my-nav-item position-relative {{ $attributes['href'] == url()->current() ? 'my-active-item' : '' }}">
    <a class="my-nav-link {{ $attributes['href'] == url()->current() ? 'my-active-link' : '' }}" {{ $attributes }} )>
        {{ $slot }}
    </a>
</li>
