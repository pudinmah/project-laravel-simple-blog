@include('admin.header')
@include('admin.navbar')

@include('admin.sidebar')


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><b>X</b></button>
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Halaman Artikel
            </div>
            <div class="card-body">
                {{-- Content --}}
                <div class="page-content">

                    <h1 class="post_title">All Post</h1>

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert"
                                aria-hidden="true"><b>X</b></button>
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <tr>
                            <th>Post title</th>
                            <th>Description</th>
                            <th>Post by</th>
                            <th>Post Status</th>
                            <th>UserType</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->post_status }}</td>
                                <td>{{ $post->usertype }}</td>
                                <td>
                                    <img src="{{ asset('postimage/' . $post->image) }}" alt="img" width="50"
                                        height="50">
                                </td>
                                <td>

                                    <a href="#" class="btn btn-success">Edit</a>

                                    <a href="#" class="btn btn-danger"
                                        onclick="return confirm('Are You sure to Delete This ? ')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                {{-- Content --}}

                <div class="p-5">
                    {{ $posts->links() }} <!-- Ganti $b dengan $blog -->
                </div>

            </div>
        </div>
    </div>
</main>


@include('admin.footer')
