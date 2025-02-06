@extends('back.layouts.master')
@section('title', 'Şəbəkələr')

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
                    <h4 class="mb-0">Şəbəkələr</h4>
                    <div class="page-title-right d-flex align-items-center ">
                        <form action="{{ route('back.pages.networks.index') }}" method="GET" class="me-2">
                            <div class="input-group">
                                <input type="text" style="background-color: #fff; border: 2px solid rgb(250, 205, 122);"
                                       class="form-control form-control-sm btn " 



                                       name="search" 
                                       placeholder="Axtarış..."
                                       value="{{ $search ?? '' }}">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                                @if(request('search'))
                                    <a href="{{ route('back.pages.networks.index') }} " 
                                       class="btn btn-sm btn-danger " >
                                        <i class="fas fa-times"></i>
                                    </a>
                                @endif
                            </div>
                        </form>
                        <a href="{{ route('back.pages.networks.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Yeni Şəbəkə
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
                                    <th>Logo</th>
                                    <th>Adlar</th>
                                    <th>Ünvanlar</th>
                                    <th>Status</th>
                                    <th>Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($networks as $network)
                                <tr>
                                    <td>
                                        @if($network->image_path)
                                        <img src="{{ asset('storage/'.$network->image_path) }}" 
                                             class="img-thumbnail" 
                                             style="width: 150px; height: 100px; object-fit: contain;">
                                        @else
                                        <span class="text-muted">Logo yoxdur</span>
                                        @endif
                                    </td>
                                    <td style="display: flex; flex-direction: column;  align-items: start; gap: 15px;">
                                        <div><strong>AZ:</strong> {{ $network->name_az }}</div>
                                        <div><strong>EN:</strong> {{ $network->name_en }}</div>
                                        <div><strong>RU:</strong> {{ $network->name_ru }}</div>
                                    </td>
                                    <td>
                                        <div style="display: flex; flex-direction: column;  align-items: start; gap: 15px;">
                                            <div><strong>AZ:</strong> {{ $network->address_az ?? '-' }}</div>
                                            <div><strong>EN:</strong> {{ $network->address_en ?? '-' }}</div>
                                            <div><strong>RU:</strong> {{ $network->address_ru ?? '-' }}</div>
                                        </div>

                                    </td>
                                    <td>
                                        <form action="{{ route('back.pages.networks.toggle-status', $network->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-{{ $network->status ? 'success' : 'danger' }}">
                                                {{ $network->status ? 'Aktiv' : 'Deaktiv' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('back.pages.networks.edit', $network->id) }}" 
                                           class="btn btn-warning btn-sm" style="background-color: #5bf91b; border-color: green">
                                            <i class="fas fa-edit" style="color: white"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-danger btn-sm" 

                                                onclick="deleteData({{ $network->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{ $network->id }}" 
                                              action="{{ route('back.pages.networks.destroy', $network->id) }}" 
                                              method="POST" 
                                              class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <div class="alert alert-info mb-0">
                                            @if(request('search'))
                                                "{{ request('search') }}" üzrə nəticə tapılmadı
                                            @else
                                                Heç bir şəbəkə tapılmadı
                                            @endif
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