@extends('back.layouts.master')
@section('title', 'Əlaqə Məlumatları')

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
                    <h4 class="mb-0">Əlaqə Məlumatları</h4>
                    <div class="page-title-right">
                        @if(\App\Models\ContactData::count() < 1)
                            <a href="{{ route('back.pages.contact-data.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Yeni Məlumat
                            </a>
                        @else
                            <button class="btn btn-secondary" disabled>
                                <i class="fas fa-info-circle"></i> Yalnız 1 məlumat əlavə edilə bilər
                            </button>
                        @endif
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
                                    <th>Başlıqlar</th>
                                    <th>Mətnlər</th>
                                    <th>Əlaqə Başlıqları</th>
                                    <th>Status</th>
                                    <th>Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/'.$item->image_path) }}" 
                                             class="img-thumbnail" 
                                             style="width: 150px; height: 100px; object-fit: cover;">
                                    </td>
                                    <td style="display: flex; flex-direction: column;  align-items: start; gap: 15px;">
                                        <div><strong>AZ:</strong> {{ $item->title_az }}</div>
                                        <div><strong>EN:</strong> {{ $item->title_en }}</div>
                                        <div><strong>RU:</strong> {{ $item->title_ru }}</div>
                                    </td>
                                    <td>
                                        <div style="display: flex; flex-direction: column;  align-items: start; gap: 15px;">
                                            <div><strong>AZ:</strong> {{ $item->text_az }}</div>
                                            <div><strong>EN:</strong> {{ $item->text_en }}</div>
                                            <div><strong>RU:</strong> {{ $item->text_ru }}</div>
                                        </div>
                                    </td>
                                    <td> 
                                        <div style="display: flex; flex-direction: column;  align-items: start; gap: 15px;">
                                            <div><strong>AZ:</strong> {{ $item->contact_title_az }}</div>
                                            <div><strong>EN:</strong> {{ $item->contact_title_en }}</div>
                                            <div><strong>RU:</strong> {{ $item->contact_title_ru }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('back.pages.contact-data.toggle-status', $item->id) }}" method="POST">
                                            @csrf

                                            <button type="submit" class="btn btn-sm btn-{{ $item->status ? 'success' : 'danger' }}">
                                                {{ $item->status ? 'Aktiv' : 'Deaktiv' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('back.pages.contact-data.edit', $item->id) }}" 
                                           class="btn btn-warning btn-sm" style="background-color: #5bf91b; border-color: green">
                                            <i class="fas fa-edit" style="color: white"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-danger btn-sm" 
                                                onclick="deleteData({{ $item->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{ $item->id }}" 
                                              action="{{ route('back.pages.contact-data.destroy', $item->id) }}" 
                                              method="POST" 
                                              class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <div class="alert alert-info mb-0">
                                            Heç bir məlumat tapılmadı
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
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