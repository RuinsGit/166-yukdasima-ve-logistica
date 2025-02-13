@extends('back.layouts.master')
@section('title', 'Xidmət Hero İdarəetməsi')

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
                    <h4 class="mb-0">Xidmət Hero İdarəetməsi</h4>
                    @if(!$servicesHero)
                    <div class="page-title-right">
                        <a href="{{ route('back.pages.services-hero.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Yeni Əlavə Et
                        </a>
                    </div>
                    @endif
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
                        @if($servicesHero)
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>Əsas Şəkil</th>
                                        <td><img src="{{ asset('storage/' . $servicesHero->main_image_path) }}" class="img-thumbnail"></td>
                                    </tr>
                                    <tr>
                                        <th>Təcrübə Şəkili</th>
                                        <td><img src="{{ asset('storage/' . $servicesHero->experience_image_path) }}" class="img-thumbnail"></td>
                                    </tr>
                                    <tr>
                                        <th>Menecer Şəkili</th>
                                        <td><img src="{{ asset('storage/' . $servicesHero->manager_image_path) }}" class="img-thumbnail"></td>
                                    </tr>
                                    <tr>
                                        <th>Təhlükəsizlik Şəkili</th>
                                        <td><img src="{{ asset('storage/' . $servicesHero->security_image_path) }}" class="img-thumbnail"></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <form action="{{ route('back.pages.services-hero.toggle-status', $servicesHero->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-{{ $servicesHero->status ? 'success' : 'danger' }}">
                                                    {{ $servicesHero->status ? 'Aktiv' : 'Deaktiv' }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Əməliyyatlar</th>
                                        <td>
                                            <a href="{{ route('back.pages.services-hero.edit', $servicesHero->id) }}" 
                                               class="btn btn-warning btn-sm" style="background-color: #5bf91b; border-color: green; color: white">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" 
                                                    class="btn btn-danger btn-sm" 
                                                    onclick="deleteData({{ $servicesHero->id }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <form id="delete-form-{{ $servicesHero->id }}" 
                                                  action="{{ route('back.pages.services-hero.destroy', $servicesHero->id) }}" 
                                                  method="POST" 
                                                  class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">
                                Hələ xidmət hero məlumatı əlavə edilməyib.
                            </div>
                        @endif
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