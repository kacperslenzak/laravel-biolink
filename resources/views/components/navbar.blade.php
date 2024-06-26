<div class="container d-flex justify-content-center">
    <nav class="navbar navbar-dark px-3 py-2 my-5">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold">fraud<span>.</span>cool</a>
            <div class="d-flex align-items-center">
                <a class="nav-link me-4 text-white" aria-current="page" href="https://discord.gg/yTYFJGCVfd">Discord</a>
                @if (!auth()->check())
                    <a class="nav-link me-4 text-white" href="{{ url('/account/login') }}">Login</a>
                    <a class="nav-link text-white me-4" href="{{ url('/account/register') }}">Register</a>
                @else
                    <a class="nav-link me-4 text-white" href="{{ url('/account') }}">Dashboard</a>
                @endif
                <a class="nav-link text-white exclusive" href="https://discord.gg/yTYFJGCVfd"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512" style="vertical-align: -5px; margin-right: 4px; font-size: 20.5px;"><path fill="currentColor" d="m208 512l-52.38-139.62L16 320l139.62-52.38L208 128l52.38 139.62L400 320l-139.62 52.38ZM88 176l-23.57-64.43L0 88l64.43-23.57L88 0l23.57 64.43L176 88l-64.43 23.57Zm312 80l-31.11-80.89L288 144l80.89-31.11L400 32l31.11 80.89L512 144l-80.89 31.11Z"></path></svg> Exclusive</a>
            </div>
        </div>
    </nav>
</div>
