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
                Tambah Artikel
            </div>
            <div class="card-body">
                <!-- services section start -->

                <form action="{{ route('update_post', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="">Post Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="">Post Description</label>
                        <textarea name="description" class="form-control">{{ $post->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Old Image :</label>
                        <img src="{{ asset('postimage/' . $post->image) }}" alt="" width="100">
                    </div>
                    <div class="mb-3">
                        <label for="">Update Old Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                </form>
                <!-- services section end -->
            </div>
        </div>
    </div>
</main>


@include('admin.footer')
