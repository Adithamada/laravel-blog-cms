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
                <div class="col-8 m-auto">
                    <h5>
                        <a href="{{ route('list-category',['category'=>$blog->category->category]) }}"><span class="badge badge-lg bg-primary">{{ $blog->category->category }}</span></a>
                    </h5>
                    <h1>{{ $blog->title }} </h1>
                    <div class="author d-flex">
                        <i class="bi bi-person-circle text-secondary"></i>
                        <p class=" mx-3">{{ $blog->user->name }}</p>
                        <p class="">{{ $blog->date }}</p>
                    </div>
                    <div class="single-img">
                        <img src="{{ asset('vendor/img/'.$blog->image) }}" alt="" class="img-single rounded" style="width: 800px;height:462px;">
                    </div>
                    <div class="single-content mt-5">
                        <?= $blog->desk ?>
                    </div>
                    <div class="tag mt-5 d-flex align-item-center">
                        <h4>Tags :</h4>
                        <div class="tag-content">
                            <ul class="tag-wrapper">
                                @foreach($blog->tag as $tag)
                                <li><span class="badge bg-secondary">{{ $tag->tag }} </span></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer bg-body-secondary p-5">
        @include('partials.mainfooter')
    </footer>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>