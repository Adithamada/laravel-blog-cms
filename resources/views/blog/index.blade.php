<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head-admin')
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            @include('partials.preloader')
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            @include('partials.navbar-admin')
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <div href="index3.html" class="brand-link">
                <img src="{{ asset('vendor/img/logo.svg') }}" alt="AdminLTE Logo" class="brand-image" style="filter: brightness(0) invert(1);opacity: .8">
            </div>

            <!-- Sidebar -->
            <div class="sidebar">


                <!-- SidebarSearch Form -->
                <div class="form-inline mt-4">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    @include('partials.sidebar-admin')
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Manage Blog</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item">Manage Blog</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header d-flex">
                            <h3>Blog</h3>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Add Blog
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Blog</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('create-blog')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Category</label>
                                                    <select name="category_id" id="" class="form-control">
                                                        @foreach($category as $c)
                                                        <option value="{{$c->id}}">{{ $c->category }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <p class="help-block"></p>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="date">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Image</label>
                                                    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="image">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tags" class="form-label">Tags</label>
                                                    <input type="text" class="form-control" id="tags" name="tag">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Desk</label>
                                                    <input id="x" type="hidden" name="desk">
                                                    <trix-editor input="x"></trix-editor>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Post View</th>
                                        <th>Date</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($paginateblog as $p)
                                    <tr>
                                        <td>{{ $p->id }} </td>
                                        <td><img src="{{ asset('vendor/img/'.$p->image) }}" class="w-50 rounded"></td>
                                        <td>{{ $p->title }} </td>
                                        <td>{{ $p->category->category }} </td>
                                        <td>{{ $p->user->name }} </td>
                                        @if($p->status == 'Public')
                                        <td class="text-center"><span class="badge badge-success">{{ $p->status }}</span></td>
                                        @else
                                        <td class="text-center"><span class="badge badge-danger">{{ $p->status }}</span></td>
                                        @endif
                                        <td>{{ $p->post_view }} </td>
                                        <td>{{ $p->date }} </td>
                                        <td>
                                            <a data-bs-toggle="modal" data-bs-target="#editBlog{{$p->id}}" class="btn btn-success">Edit</a>
                                            <div class="modal fade" id="editBlog{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Blog</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('update-blog',['id'=>$p->id])}}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('Patch')
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Title</label>
                                                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" value="{{old('title',$p->title)}}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Category</label>
                                                                    <select name="category_id" id="" class="form-control">
                                                                        @foreach($category as $c)
                                                                        <option value="{{$c->id}}">{{ $c->category }} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Image</label>
                                                                    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="image">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Status</label>
                                                                    <select name="status" id="" class="form-control">
                                                                        <option value="Public">Public</option>
                                                                        <option value="Hide">Hide</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Desk</label>
                                                                    <input id="desk" type="hidden" name="desk" value="{{ old('desk', $p->desk) }}">
                                                                    <trix-editor input="desk"></trix-editor>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="{{ route('delete-blog',['id'=>$p->id]) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="/"><b>Meta</b>blog</a>.</strong>
            All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
    <script>
        // Wait for the Trix editor to be initialized
        document.addEventListener('trix-initialize', function(event) {
            // Set the value of the Trix editor after initialization
            var trixEditor = event.target.editor;
            var deskValue = document.getElementById('desk').value;
            trixEditor.loadHTML(deskValue);
        });
    </script>
    @include('partials.footer-admin')
</body>

</html>