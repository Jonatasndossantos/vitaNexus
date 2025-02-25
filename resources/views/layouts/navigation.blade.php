<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <x-application-logo class="h-9" />
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="">
                        <button class="{{ request()->routeIs('home') ? 'text-success' : '' }} btn" type="button">{{ __('Home') }}</button>
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link :href="route('history')" :active="request()->routeIs('history')" class="nav-link">
                        <button class="{{ request()->routeIs('history') ? 'text-success' : '' }} btn" type="button">{{ __('Histórico de Saúde') }}</button>
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link :href="route('bemEstar')" class="nav-link">
                        <button class="{{ request()->routeIs('bemEstar') ? 'text-success' : '' }} btn" type="button">{{ __('Saúde e Bem-Estar') }}</button>
                    </x-nav-link>
                </li>
            </ul>
            <div class="dropdown">
                <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                        <x-dropdown-link :href="route('profile.edit')" class="dropdown-item">
                            {{ __('Perfil') }}
                        </x-dropdown-link>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="dropdown-item">
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
