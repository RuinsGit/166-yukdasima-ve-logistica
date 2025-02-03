@extends('back.layouts.master')
@section('title', 'Bölmələr Siyahısı')

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
                    <h4 class="mb-0">Bölmələr Siyahısı</h4>
                    <div class="page-title-right">
                        @if($sections->count() == 0)
                        <a href="{{ route('back.pages.home-sections.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Yeni Bölmə
                        </a>
                        @else
                        <button class="btn btn-secondary" disabled>
                            <i class="fas fa-plus"></i> Yalnız 1 bölmə əlavə edilə bilər
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

        @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Xəta!',
                    text: "{{ session('error') }}",
                    confirmButtonText: 'Tamam'
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
                                    <th>Ad (AZ/EN/RU)</th>
                                    <th>Rəqəmlər</th>
                                    <th>Status</th>
                                    <th>Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sections as $section)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/'.$section->image_path) }}" 
                                             class="img-thumbnail" 
                                             style="width: 150px; height: 100px; object-fit: cover; border-radius: 10px;">
                                    </td>
                                    <td>
                                        <strong>AZ:</strong> {{ $section->name_az }}<br>
                                        <strong>EN:</strong> {{ $section->name_en }}<br>
                                        <strong>RU:</strong> {{ $section->name_ru }}
                                    </td>
                                    <td>
                                        <strong>Birinci:</strong> {{ $section->number_one }}<br>
                                        <strong>İkinci:</strong> {{ $section->number_two }}
                                    </td>
                                    <td>
                                        <form action="{{ route('back.pages.home-sections.toggle-status', $section->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-{{ $section->status ? 'success' : 'danger' }}">
                                                {{ $section->status ? 'Aktiv' : 'Deaktiv' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                                    <a href="{{ route('back.pages.home-sections.edit', $section->id) }}" class="btn btn-primary btn-sm" style="background-color: #5bf91b; border-color: green">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $section->id }}" action="{{ route('back.pages.home-sections.destroy', $section->id) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $section->id }})">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
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