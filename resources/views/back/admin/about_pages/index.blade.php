@extends('back.layouts.master')
@section('title', 'Haqqımızda')


@section('content')
<style>
    .swal2-popup {
        border-radius: 50px;
    }
</style>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">

        <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Haqqımızda Tənzimləməsi</h4>
                    <div class="page-title-right">
                        @if($aboutPages->isEmpty())


                            <a href="{{ route('back.pages.about-pages.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Yeni Haqqımızda Əlavə Et
                            </a>
                        @else


                            <button class="btn btn-secondary" disabled>
                                <i class="fas fa-ban"></i> Maksimum sayda haqqımızda var
                            </button>
                        @endif


                    </div>
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
                                    <th>Ad</th>
                                    <th>Statistikalar</th>
                                    <th>Status</th>
                                    <th>Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($aboutPages as $page)
                                <tr>
                                <td>
                                        <img src="{{ asset('storage/'.$page->image_path) }}" 
                                             class="img-thumbnail" 
                                             style="width: 150px; height: 100px; object-fit: cover; border-radius: 10px;">
                                    </td>
                                    <td style="display: flex; flex-direction: column;  align-items: start; gap: 15px;">
                                        <div><strong>AZ:</strong> {{ $page->name_az }}</div>
                                        <div><strong>EN:</strong> {{ $page->name_en }}</div>
                                        <div><strong>RU:</strong> {{ $page->name_ru }}</div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-6" style="display: flex; flex-direction: column;  align-items: start; gap: 15px;">
                                                <small>Xidmət: {{ $page->services_number }}</small><br>
                                                <small>Müştəri: {{ $page->customer_number }}</small>
                                            </div>
                                            <div class="col-6" style="display: flex; flex-direction: column;  align-items: start; gap: 15px;">
                                                <small>Təminat: {{ $page->transportations_number }}</small><br>
                                                <small>Razı: {{ $page->satisfied_number }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('back.pages.about-pages.toggle-status', $page->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-{{ $page->status ? 'success' : 'danger' }}">
                                                {{ $page->status ? 'Aktiv' : 'Deaktiv' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('back.pages.about-pages.edit', $page->id) }}" 
                                           class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-danger btn-sm" 
                                                onclick="deleteData({{ $page->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{ $page->id }}" 
                                              action="{{ route('back.pages.about-pages.destroy', $page->id) }}" 
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