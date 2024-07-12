<header class="header" id="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo" href="{{ route('home') }}"><img alt="" src="{{ getImage(getFilePath('logoIcon') . '/logo.png') }}"></a>
            <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler header-button" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
                <span id="hiddenNav"><i class="las la-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-menu ms-auto align-items-lg-center">
                    @php
                        $defaultPages = App\Models\Page::where('is_default', Status::YES)
                            ->where('is_hidden', Status::NO)
                            ->where('tempname', $activeTemplate)
                            ->get();

                        $pages = App\Models\Page::where('is_default', Status::NO)
                            ->where('tempname', $activeTemplate)
                            ->get();
                            
                    @endphp

                    @foreach ($defaultPages as $defaultpage)
                        <li class="nav-item">
                            <a class="nav-link {{ menuActive($defaultpage->slug) }}" href="{{ route('pages', ['slug' => $defaultpage->slug]) }}">{{ __($defaultpage->name) }}</a>
                        </li>
                    @endforeach
                    
                    @foreach ($pages as $item)
                        <li class="nav-item">
                            <a class="nav-link {{ menuActive('pages', param:$item->slug) }}" href="{{ route('pages', ['slug' => $item->slug]) }}">{{ __($item->name) }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="top-button flex-between">
                    <ul class="login-registration-list flex-align">
                        @guest
                            <li class="login-registration-list__item"><a class=" btn btn--base btn--sm outline" href="{{ route('user.login') }}">@lang('Login')</a></li>
                            <li class="login-registration-list__item"><a class="btn btn--base btn--sm" href="{{ route('user.register') }}">@lang('Register')</a></li>
                        @else
                            <li class="login-registration-list__item"><a class=" btn btn--base btn--sm outline" href="{{ route('user.home') }}">@lang('Dashboard')</a></li>
                            <li class="login-registration-list__item"><a class="btn btn--base btn--sm" href="{{ route('user.logout') }}">@lang('Logout')</a></li>
                        @endguest
                    </ul>
                    @if ($general->multi_language)
                        @php
                            $language     = App\Models\Language::where('is_hidden', Status::NO)->get();
                            $selectedLang = $language->where('code', config('app.locale'))->first();
                        @endphp
                        <div class="custom--dropdown">
                            <div class="custom--dropdown__selected dropdown-list__item">
                                <div class="thumb">
                                    <img alt="image" src="{{ getImage(getFilePath('language') . '/' . @$selectedLang->flag, getFileSize('language')) }}">
                                </div>
                            </div>
                            <ul class="dropdown-list">
                                @foreach ($language as $lang)
                                    <li class="dropdown-list__item" data-value="{{ $lang->code }}">
                                        <a class="thumb" href="{{ route('lang', $lang->code) }}">
                                            <img alt="image" src="{{ getImage(getFilePath('language') . '/' . @$lang->flag, getFileSize('language')) }}">
                                        <span class="text">{{ strtoupper($lang->code) }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</header>
