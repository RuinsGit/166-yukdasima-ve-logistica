@extends('back.layouts.master')
@section('title', 'Kartların Siyahısı')

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
                    <h4 class="mb-0">Kartların Siyahısı</h4>
                    <div class="page-title-right">
                        <a href="{{ route('back.pages.home-carts.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Yeni Kart
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif -->

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
                                    <th>ALT Mətnlər</th>
                                    <th>Status</th>
                                    <th>Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carts as $cart)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/'.$cart->image_path) }}" 
                                             class="img-thumbnail" 
                                             style="width: 150px; height: 100px; object-fit: cover; border-radius: 10px;">
                                    </td>
                                    <td>
                                        <strong>AZ:</strong> {{ $cart->alt_az }}<br>
                                        <strong>EN:</strong> {{ $cart->alt_en }}<br>
                                        <strong>RU:</strong> {{ $cart->alt_ru }}
                                    </td>
                                    <td>
                                        <form action="{{ route('back.pages.home-carts.toggle-status', $cart->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-{{ $cart->status ? 'success' : 'danger' }}">
                                                {{ $cart->status ? 'Aktiv' : 'Deaktiv' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                                    <a href="{{ route('back.pages.home-carts.edit', $cart->id) }}" class="btn btn-primary btn-sm" style="background-color: #5bf91b; border-color: green">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $cart->id }}" action="{{ route('back.pages.home-carts.destroy', $cart->id) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $cart->id }})">
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

