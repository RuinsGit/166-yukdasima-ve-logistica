@extends('back.layouts.master')
@section('title', 'Slayder Siyahısı')

@section('content')
    <style>
        .swal2-popup {
            border-radius: 50px;
        }
    </style>

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

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Slayder Siyahısı</h4>
                        <div class="page-title-right">
                            <a href="{{ route('back.pages.home-heroes.create') }}" class="btn btn-primary" >
                                <i class="fas fa-plus" ></i> Yeni Slayder
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Media</th>
                                        <th>Tip</th>
                                        <th>Status</th>
                                        <th>Əməliyyatlar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($heroes as $hero)
                                        <tr>
                                        
                                    <td>
                                        @if($hero->media_type === 'image')
                                            <img src="{{ asset('storage/'.$hero->media_path) }}" class="media-preview" style="width: 150px; height: 100px; border-radius: 10px; object-fit: cover;">
                                        @else
                                            <video class="media-preview" controls style="width: 150px; height: 100px; border-radius: 10px; object-fit: cover;">
                                                <source src="{{ asset('storage/'.$hero->media_path) }}">
                                            </video>
                                        @endif
                                    </td>
                                            <td>{{ $hero->media_type === 'image' ? 'Şəkil' : 'Video' }}</td>
                                            <td>
                                                    <form action="{{ route('back.pages.home-heroes.toggle-status', $hero->id) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-{{ $hero->status ? 'success' : 'danger' }}">
                                                            {{ $hero->status ? 'Aktiv' : 'Deaktiv' }}
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="{{ route('back.pages.home-heroes.edit', $hero->id) }}" class="btn btn-primary btn-sm" style="background-color: #5bf91b; border-color: green">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $hero->id }}" action="{{ route('back.pages.home-heroes.destroy', $hero->id) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $hero->id }})">
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
                cancelButtonText: 'Xeyr'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endsection














