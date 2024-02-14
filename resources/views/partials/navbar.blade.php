<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="img-logo">
                <img src="{{ asset('vendor/img/Logo.svg') }}" alt="Logo" class="logo">
            </div>
        </div>
        <div class="col-md-6">
            <div class="navigation">
                <ul class="nav-wrapper">
                    <li><a href="/">Home</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="">Single Post</a></li>
                    <li><a href="">Pages</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="search-form">
                <form action="{{ route('index-home') }}" method="get">
                    @csrf
                    @method('get')
                    <input type="text" class="search-input" placeholder="Search" name="search" value="{{request('search')}}">
                </form>
            </div>
        </div>
    </div>
</div>