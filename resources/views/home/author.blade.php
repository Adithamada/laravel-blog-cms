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

    <section class="hero">
        <div class="container mb-5">
            <div class="row">
                <div class="col-12  text-center">
                    <div class="card bg-body-secondary p-5" style="border: none;">
                        <div class="author-hero d-flex justify-content-center">
                            <div class="author-name d-flex justify-content-center">
                                <h1>
                                    <i class="bi bi-person-circle"></i>
                                </h1>
                                <div class="mx-2">
                                    <h5 class="mx-4">{{ $name->name }} </h5>
                                    <p class="text-secondary">Developer & Editor</p>
                                </div>
                            </div>
                            <div class="col-5 author-bio text-center m-auto">
                                <p>Meet {{ $name->name }}, a passionate writer and blogger with a love for technology and travel. {{ $name->name }} holds a degree in Computer Science and has spent years working in the tech industry, gaining a deep understanding of the impact technology has on our lives.</p>
                            </div>
                            <div class="button-socmed d-flex justify-content-center">
                                <div class="btn btn-block btn-secondary"><i class="bi bi-facebook"></i></div>
                                <div class="btn btn-block btn-secondary mx-3"><i class="bi bi-instagram"></i></div>
                                <div class="btn btn-block btn-secondary"><i class="bi bi-twitter-x"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="second-hero">
        <div class="container">
            <h3 class="latest">
                Latest Post
            </h3>
            <div class="row mb-4">
                @foreach($blog as $b)
                <div class="col-4 mb-3">
                    <div class="card p-3">
                        <img src="{{ asset('vendor/img/'.$b->image) }}" alt="">
                        <div class="card-body">
                            <span class="badge bg-body-secondary text-primary">{{ $b->category->category }} </span>
                            <h4>{{ Illuminate\Support\Str::limit($b->title, 40, '...') }}</h4>
                            <div class="author d-flex">
                                <i class="bi bi-person-circle"></i>
                                <p class="text-secondary mx-3">{{ $b->user->name }}</p>
                                <p class="text-secondary">{{ $b->date }} </p>
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