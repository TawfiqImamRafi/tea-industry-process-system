<!-- header -->
<header>
    <div class="header">
        <div class="header-left">
            <div class="logo">
                <a href="{{ route('dashboard') }}">
                    <h2>Tea Process System</h2>
                </a>
            </div>
            <span id="nav-control"><i class="bx bx-arrow-from-right"></i></span>
        </div>
        <div class="header-right">
            @if (Auth::user()->hasRole('farmer'))
            <div class="header-nav">
                Farmer
            </div>
            @endif
            @if (Auth::user()->hasRole('company'))
            <div class="header-nav">
                Company
            </div>
            @endif
            @if (Auth::user()->hasRole('wholesaler'))
            <div class="header-nav">
                Wholesaler
            </div>
            @endif
            <div class="header-user">
                <ul>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn-outline-light btn btn-sm" type="submit"><i class="bx bx-log-out"></i> Logout ({{ Auth::user()->name }})</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
