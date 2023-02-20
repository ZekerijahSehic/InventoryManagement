<div class="header">
    <div class="header-search">
        @if(request()->is(["/", "products"]))
        <form action="/products/search" method="GET">
            <div style="display: flex; margin: 5px;">
                <div class="form-group" style="width: 70%">
                    <input type="text" name="searchString" class="form-control" placeholder="Search by name or category"
                           style=" width: 95%; padding: 0px 10px; height: 40px; border-radius: 5px; border: 1px solid #EF3B2D;">
                </div>
                <div>
                    <button type="submit" class="btn btn-search">Search</button>
                </div>
            </div>
        </form>
        @endif
    </div>
    <div class="header-menu">
{{--        @if(auth()->check() && (auth()->user()->hasRole('administrator') || auth()->user()->hasRole('manager')))--}}
            <button class="btn btn-add">
                <a href="/products/create"> Add product </a>
            </button>
{{--        @endif--}}
{{--        @if(auth()->check() && auth()->user()->hasRole('administrator'))--}}
            <button class="btn btn-manage">
                <a href="/users"> Manage users </a>
            </button>
{{--        @endif--}}
{{--        @if(auth()->check() && auth()->user()->hasRole('administrator'))--}}
            <button class="btn btn-manage">
                <a href="/roles"> Roles </a>
            </button>
{{--        @endif--}}
{{--        @if(auth()->check() && auth()->user()->hasRole('administrator'))--}}
            <button class="btn btn-manage">
                <a href="/permissions"> Permissions </a>
            </button>
{{--        @endif--}}
        @auth
            <form method="post" action="/logout">
                @csrf
                <button type="submit" class="btn btn-out"> Log out </button>
            </form>
        @endauth
        @guest
            <button class="btn btn-add">
                <a href="/login"> Login </a>
            </button>
        @endguest
    </div>
</div>
