@extends('back.layouts.master')
@section('title', 'Xidmətlər')

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
                    <h4 class="mb-0">Xidmətlər</h4>
                    <div class="page-title-right">
                        <a href="{{ route('back.pages.services.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Yeni Xidmət
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
                                <th>Alt Şəkil</th>
                                    <th>Ad</th>
                                    
                                    <th>Slug</th>
                                    <th>Qısa Mətn</th>
                                    <th>Status</th>
                                    <th>Xidmət Növü</th>
                                    <th>Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                <tr>
                                <td>
                                        @if($service->image_main)
                                            <img src="{{ asset('storage/'.$service->image_main) }}" 
                                            class="img-thumbnail"
                                            
                                            style="width: 150px; height: 100px; object-fit: cover; border-radius: 10px;">
                                        @endif
                                    </td>
                                    <td>
                                        @if($service->image_bottom)
                                            <img src="{{ asset('storage/'.$service->image_bottom) }}" 
                                            class="img-thumbnail"
                                            
                                            style="width: 150px; height: 100px; object-fit: cover; border-radius: 10px;">
                                        @endif
                                    </td>
                                    <td>{{ $service->slug_az }}</td>
                                    <td>{{ $service->name_az }}</td>
                                    <td>{{ Str::limit($service->text_az, 50) }}</td>
                                    <td>
                                        <form action="{{ route('back.pages.services.toggle-status', $service->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-{{ $service->status ? 'success' : 'danger' }}">
                                                {{ $service->status ? 'Aktiv' : 'Deaktiv' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>{{ $service->type->name_az }}</td>
                                    <td>
                                        <a href="{{ route('back.pages.services.edit', $service->id) }}" 
                                           class="btn btn-warning btn-sm" style="background-color: #5bf91b; border-color: green">
                                            <i class="fas fa-edit" style="color: white;"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-danger btn-sm" 

                                                onclick="deleteData({{ $service->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{ $service->id }}" 
                                              action="{{ route('back.pages.services.destroy', $service->id) }}" 
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