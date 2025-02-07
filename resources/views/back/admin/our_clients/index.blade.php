@extends('back.layouts.master')
@section('title', 'Müştərilərimiz')

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
                    <h4 class="mb-0">Müştərilərimiz</h4>
                    <div class="page-title-right">
                        <a href="{{ route('back.pages.our-clients.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Yeni Müştəri
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
                                    <th>Əsas Şəkil</th>
                                    <th>Alt Şəkillər</th>
                                    <th>Başlıq</th>
                                    <th>Status</th>
                                    <th>Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/'.$client->main_image_path) }}" 
                                        class="img-thumbnail" 
                                        style="width: 150px; height: 100px; object-fit: contain;">
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <img src="{{ asset('storage/'.$client->bottom_image1_path) }}" 
                                            class="img-thumbnail" 
                                            style="width: 150px; height: 100px; object-fit: contain;">
                                            <img src="{{ asset('storage/'.$client->bottom_image2_path) }}" 
                                            class="img-thumbnail" 
                                            style="width: 150px; height: 100px; object-fit: contain;">

                                        </div>
                                    </td>
                                    <td style="display: flex; flex-direction: column;  align-items: start; gap: 15px;">
                                        
                                        <div><strong>AZ:</strong> {{ $client->text_az }}</div>
                                        <div><strong>EN:</strong> {{ $client->text_en }}</div>
                                        <div><strong>RU:</strong> {{ $client->text_ru }}</div>
                                    </td>
                                    <td>
                                        <form action="{{ route('back.pages.our-clients.toggle-status', $client->id) }}" method="POST">
                                            @csrf

                                            <button type="submit" class="btn btn-sm btn-{{ $client->status ? 'success' : 'danger' }}">
                                                {{ $client->status ? 'Aktiv' : 'Deaktiv' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('back.pages.our-clients.edit', $client->id) }}" 
                                           class="btn btn-warning btn-sm" style="background-color: #5bf91b; border-color: green; color: white">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-danger btn-sm" 
                                                onclick="deleteData({{ $client->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{ $client->id }}" 
                                              action="{{ route('back.pages.our-clients.destroy', $client->id) }}" 
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