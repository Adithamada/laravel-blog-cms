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
                    <li><a href="/">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="/blog">Blog</a></li>
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
                    @foreach($categoryfooter as $c)
                    <li><a href="{{ route('list-category',['category'=>$c->category]) }}">{{ $c->category }} </a></li>
                    @endforeach
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