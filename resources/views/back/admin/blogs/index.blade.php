@extends('back.layouts.master')
@section('title', 'Blog Yazıları')

@section('content')
<style>
    .swal2-popup {
        border-radius: 50px;
    }
    .img-thumbnail {
        width: 150px;
        height: 100px;
        object-fit: cover;
        border-radius: 10px;
    }
</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Blog Yazıları</h4>
                    <div class="page-title-right">
                        <a href="{{ route('back.pages.blogs.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Yeni Blog
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "{{ session('success') }}",
                        showConfirmButton: true,
                        confirmButtonText: 'Tamam',
                        timer: 1500
                    });
                });
            </script>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Şəkil</th>
                                    <th>Daxili Şəkil</th>
                                    <th>Ad</th>
                                    <th>Status</th>
                                    <th>Əməliyyatlar</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach($blogs as $blog)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/'.$blog->image_path) }}" 
                                             class="img-thumbnail">
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/'.$blog->bottom_image_path) }}" 
                                             class="img-thumbnail">
                                    </td>
                                    <td style="display: flex; flex-direction: column;  align-items: start; gap: 15px;">


                                        <div><strong>AZ:</strong> {{ $blog->name_az }}</div>
                                        <div><strong>EN:</strong> {{ $blog->name_en }}</div>
                                        <div><strong>RU:</strong> {{ $blog->name_ru }}</div>
                                    </td>

                                    <td>
                                        <form action="{{ route('back.pages.blogs.toggle-status', $blog->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-{{ $blog->status ? 'success' : 'danger' }}">

                                                {{ $blog->status ? 'Aktiv' : 'Deaktiv' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('back.pages.blogs.edit', $blog->id) }}" 
                                           class="btn btn-warning btn-sm" 
                                           style="background-color: #5bf91b; border-color: green; color: white">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-danger btn-sm" 
                                                onclick="deleteData({{ $blog->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{ $blog->id }}" 
                                              action="{{ route('back.pages.blogs.destroy', $blog->id) }}" 
                                              method="POST" 
                                              class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center mt-4">
                            @if($blogs instanceof \Illuminate\Pagination\AbstractPaginator)
                                {{ $blogs->links('pagination::bootstrap-5') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function deleteData(id) {
    Swal.fire({
        title: 'Silmək istədiyinizdən əminsiniz?',
        text: "Bu əməliyyat geri alına bilməz!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Bəli, sil!',
        cancelButtonText: 'Ləğv et'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
</script>

@endsection
