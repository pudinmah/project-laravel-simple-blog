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
                DataTable Example
            </div>
            <div class="card-body">
                <!-- services section start -->

                <form action="{{ route('add_post') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mt-3">
                        Title
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mt-3">
                        Description
                        <textarea name="description" class="form-control" rows="10"></textarea>
                    </div>
                    <div class="mt-3">
                        Add Image
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="submit" class="btn btn-primary" value="Add Post">
                    </div>
                </form>
                <!-- services section end -->
            </div>
        </div>
    </div>
</main>


@include('admin.footer')
