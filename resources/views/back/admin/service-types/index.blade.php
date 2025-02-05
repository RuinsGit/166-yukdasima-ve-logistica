@extends('back.layouts.master')
@section('title', 'Xidmət Növləri')

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
                    <h4 class="mb-0">Xidmət Növləri</h4>
                    <div class="page-title-right">
                        <a href="{{ route('back.pages.services-types.create') }}" class="btn btn-primary">
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
                                    <th>Şəkil</th>
                                    <th>Ad (AZ)</th>
                                    <th>Name (EN)</th>
                                    <th>Название (RU)</th>
                                    <th>Sıra</th>
                                    <th>Status</th>
                                    <th>Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($types as $type)
                                <tr>
                                    <td>
                                        @if($type->image)
                                            <img src="{{ asset('storage/'.$type->image) }}" 
                                                 class="img-thumbnail" 
                                                 style="width: 150px; height: 100px; object-fit: cover; border-radius: 10px;">
                                        @endif
                                    </td>
                                    <td>{{ $type->name_az }}</td>
                                    <td>{{ $type->name_en }}</td>
                                    <td>{{ $type->name_ru }}</td>
                                    <td>{{ $type->number }}</td>
                                    <td>
                                        <form action="{{ route('back.pages.services-types.toggle-status', [$type->id]) }}" method="POST">
                                            @csrf


                                            <button type="submit" class="btn btn-sm btn-{{ $type->status ? 'success' : 'danger' }}">
                                                {{ $type->status ? 'Aktiv' : 'Deaktiv' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('back.pages.services-types.edit', [$type->id]) }}" 
                                           class="btn btn-warning btn-sm" style="background-color: #5bf91b; border-color: green">
                                            <i class="fas fa-edit" style="color: white;"></i>
                                        </a>

                                        <button type="button" 
                                                class="btn btn-danger btn-sm" 
                                                onclick="deleteData({{ $type->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{ $type->id }}" 
                                              action="{{ route('back.pages.services-types.destroy', [$type->id]) }}" 
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
