<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('vendor/css/style.css')}}">
    <title>Home</title>
</head>

<body>
    <nav class="mb-5">
        @include('partials.navbar')
    </nav>

    <section class=" mb-5">
        <div class="container">
            <div class="row">
                <div class="link-list col-12">
                    <h2>{{ $category->category }} </h2>
                    <ul class="nav-link-list">
                        <li class=""><a href="" class="">Home</a></li>
                        |
                        <li class=""><a href="" class="">Link One</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="hero">
        <div class="container mb-5">
            <div class="row">
                <div class="col-12 ">
                    <div class="hero-img">
                        <img src="{{ asset('vendor/img/'.$latestblog->image) }}" alt="" class="img-fluid hero rounded">
                        <div class="col-4">
                            <div class="card-list-hero border-none p-2">
                                <div class="card-body  text-light">
                                    <span class="badge bg-primary">{{$latestblog->category->category}}</span>
                                    <h1>{{$latestblog->title}}</h1>
                                    <div class="author d-flex">
                                        <i class="bi bi-person-circle"></i>
                                        <p class="text-light mx-3">{{$latestblog->user->name}}</p>
                                        <p class="text-light">{{$latestblog->date}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="second-hero">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($blog as $b)
                <div class="col-4 mb-4">
                    <div class="card p-3">
                        <img src="{{ asset('vendor/img/'.$b->image) }}" alt="" class="rounded">
                        <div class="card-body">
                        <a href="{{ route('list-category',['category'=>$b->category->category]) }}"><span class="badge bg-body-secondary text-primary">{{ $b->category->category }}</span></a>
                            <h4><a href="{{ route('show-blog', ['title' => $b->title]) }}" class="link text-dark text-decoration-none">{{ Illuminate\Support\Str::limit($b->title, 50, '...') }}</a></h4>
                            <div class="author d-flex">
                                <i class="bi bi-person-circle"></i>
                                <p class="text-secondary mx-3"><a href="{{ route('author-page',['authorName'=>$b->user->name]) }}" class="link text-dark text-decoration-none">{{ $b->user->name }}</a></p>
                                <p class="text-secondary">{{$b->date}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer class="footer bg-body-secondary p-5">
        @include('partials.mainfooter')
    </footer>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>