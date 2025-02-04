@extends('back.layouts.master')
@section('title', 'Yeni Contact Əlavə Et')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if($errors->any())
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Xəta!',
                                        html: `@foreach($errors->all() as $error)
                                                 <p>{{ $error }}</p>
                                               @endforeach`,
                                        confirmButtonText: 'Tamam'
                                    });
                                });
                            </script>
                        @endif

                        <form action="{{ route('back.pages.contacts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- Adres Bölümü -->
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>Ünvan Məlumatları</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">

                                                <label>Ünvan (AZ)</label>
                                                <input type="text" class="form-control" name="address_az" required>
                                            </div>
                                            <div class="mb-3">

                                                <label>Ünvan (EN)</label>
                                                <input type="text" class="form-control" name="address_en" required>
                                            </div>

                                            <div class="mb-3">
                                                <label>Ünvan (RU)</label>
                                                <input type="text" class="form-control" name="address_ru" required>
                                            </div>
                                            <div class="mb-3">

                                                <label>Ünvan Şəkli</label>
                                                <input type="file" class="form-control" name="address_image" required>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Mail Bölümü -->
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header bg-info text-white">
                                            <h5>Mail Məlumatları</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">

                                                <label>Mail Adresi</label>
                                                <input type="email" class="form-control" name="mail" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Mail Şəkli</label>
                                                <input type="file" class="form-control" name="mail_image" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Nömrə Bölümü -->
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header bg-success text-white">
                                            <h5>Telefon Məlumatları</h5>
                                        </div>
                                        <div class="card-body">

                                            <div class="mb-3">
                                                <label>Telefon Nömrəsi</label>
                                                <input type="text" class="form-control" name="number" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Nömrə Şəkli</label>
                                                <input type="file" class="form-control" name="number_image" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Yadda Saxla</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
