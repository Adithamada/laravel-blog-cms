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
                </div>
            </div>
        </div>
    </section>

    <section class="second-hero">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </section>

    <footer class="footer bg-body-secondary p-5">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="information">
                        <h4>About</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis cumque doloremque facere fugit dolore corrupti eligendi rem architecto nobis quasi.</p>
                        <p><span class="fw-bold">Email :</span> info@template.com</p>
                        <p><span class="fw-bold">Phone :</span> +62 87754527187</p>
                    </div>
                </div>
                <div class="col-2">
                    <h4>Quick Link</h4>
                    <div class="quick-link">
                        <ul class="quick-nav">
                            <li><a href="">Home</a></li>
                            <li><a href="">About</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="">Archived</a></li>
                            <li><a href="">Author</a></li>
                            <li><a href="">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-2">
                    <h4>Category</h4>
                    <div class="category-link">
                        <ul class="category-nav">
                            <li><a href="">Home</a></li>
                            <li><a href="">About</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-5">
                    <div class="bg-light rounded">
                        <form action="" class="form-news">
                            <label for="" class="title-label">
                                <h4>Weekly Newsletter</h4>
                                <p>Get blog articles and offers via email</p>
                            </label>
                            <input type="text" class="input-news mb-2 rounded" placeholder="Your Email">
                            <button class="btn btn-block btn-primary">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="img-copyright">
                        <img src="{{asset('vendor/img/Copyright Info.svg')}}" alt="">
                    </div>
                </div>
                <div class="col-8">
                    <ul class="copyright-nav">
                        <li><a href="">Terms Of Use</a></li>
                        <li><a href="">Privacy Policy</a></li>
                        <li><a href="">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>