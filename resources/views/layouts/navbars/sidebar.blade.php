<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('AD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Admin') }}</a>
        </div>
        <ul class="nav">
            <li @if (request()->routeIs('dashboard')) class="active" @endif>
                <a href="{{ route('dashboard') }}">
                    <i class="tim-icons icon-support-17"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li @if (request()->routeIs('banners.index')) class="active" @endif>
                <a href="{{ route('banners.index') }}">
                    <i class="tim-icons icon-bold"></i>
                    <p>{{ __('Banner') }}</p>
                </a>
            </li>
            <li @if (request()->routeIs('about.index')) class="active" @endif>
                <a href="{{ route('about.index') }}">
                    <i class="tim-icons icon-paper"></i>
                    <p>{{ __('About') }}</p>
                </a>
            </li>
            <li @if (request()->routeIs('home-section.index')) class="active" @endif>
                <a href="{{ route('home-section.index') }}">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ __('Home') }}</p>
                </a>
            </li>
            <li @if (request()->routeIs('contact.index')) class="active" @endif>
                <a href="{{ route('contact.index') }}">
                    <i class="tim-icons icon-square-pin"></i>
                    <p>{{ __('Contact') }}</p>
                </a>
            </li>
            <li @if (request()->routeIs('page-banner.index')) class="active" @endif>
                <a href="{{ route('page-banner.index') }}">
                    <i class="tim-icons icon-image-02"></i>
                    <p>{{ __('Page Banner') }}</p>
                </a>
            </li>
            <li @if (request()->routeIs('service.index')) class="active" @endif>
                <a href="{{ route('service.index') }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ __('Service') }}</p>
                </a>
            </li>
            <li @if (request()->routeIs('faq.index')) class="active" @endif>
                <a href="{{ route('faq.index') }}">
                    <i class="tim-icons icon-chat-33"></i>
                    <p>{{ __('FAQs') }}</p>
                </a>
            </li>
            <li @if (request()->routeIs('image.index')) class="active" @endif>
                <a href="{{ route('image.index') }}">
                    <i class="tim-icons icon-camera-18"></i>
                    <p>{{ __('Gallery') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>