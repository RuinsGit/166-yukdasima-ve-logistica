@extends('back.layouts.master')
@section('title', 'Blog Növləri')

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
                    <h4 class="mb-0">Blog Növləri</h4>
                    <div class="page-title-right">
                        <a href="{{ route('back.pages.blog-types.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Yeni Növ
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
                                    <th>Ad (AZ)</th>
                                    <th>Ad (EN)</th>
                                    <th>Ad (RU)</th>
                                    <th>Status</th>
                                    <th>Əməliyyatlar</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach($types as $type)
                                <tr>
                                    <td>
                                        <strong>AZ:</strong> {{ $type->name_az }}<br>
                                        
                                    </td>
                                    <td>
                                        
                                        <strong>EN:</strong> {{ $type->name_en }}<br>
                                      
                                    </td>
                                    <td>
                                        
                                        <strong>RU:</strong> {{ $type->name_ru }}
                                    </td>
                                    <td>
                                        <form action="{{ route('back.pages.blog-types.toggle-status', $type->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-{{ $type->status ? 'success' : 'danger' }}">
                                                {{ $type->status ? 'Aktiv' : 'Deaktiv' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('back.pages.blog-types.edit', $type->id) }}" 
                                           class="btn btn-warning btn-sm" style="background-color: #5bf91b; border-color: green; color: white">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-danger btn-sm" 
                                                onclick="deleteData({{ $type->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{ $type->id }}" 
                                              action="{{ route('back.pages.blog-types.destroy', $type->id) }}" 
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