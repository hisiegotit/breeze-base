<div class="navbar bg-base-100">
    <div class="flex-1">
      <a href="{{ route('dashboard') }}" class="btn btn-ghost text-xl">{{ env('APP_NAME') }}</a>
    </div>
    <div class="flex-none">
      <ul class="menu menu-horizontal px-1">
        <li>
          <details>
            <summary class="hover:bg-secondary focus:bg-secondary">{{ Auth::user()->name }}</summary>
            <ul class="bg-base-100 rounded-t-none p-2">
              <li><a class="hover:bg-secondary" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
              <li>
                <form  class="hover:bg-secondary" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
              </li>
            </ul>
          </details>
        </li>
      </ul>
    </div>
  </div>
