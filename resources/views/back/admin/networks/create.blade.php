@extends('back.layouts.master')
@section('title', 'Yeni Şəbəkə Əlavə Et')

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

                        <form action="{{ route('back.pages.networks.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#nameAz">AZ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#nameEn">EN</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#nameRu">RU</a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-3">
                                    <div class="tab-pane fade show active" id="nameAz">
                                        <label>Ölkə adı (AZ)</label>
                                        <input type="text" class="form-control" name="name_az" required>
                                        
                                        <label class="mt-3">Ünvan (AZ)</label>
                                        <textarea class="form-control" name="address_az" rows="3"></textarea>
                                    </div>
                                    <div class="tab-pane fade" id="nameEn">
                                        <label>Country Name (EN)</label>
                                        <input type="text" class="form-control" name="name_en" required>
                                        

                                        <label class="mt-3">Address (EN)</label>
                                        <textarea class="form-control" name="address_en" rows="3"></textarea>
                                    </div>
                                    <div class="tab-pane fade" id="nameRu">
                                        <label>Название страны (RU)</label>
                                        <input type="text" class="form-control" name="name_ru" required>
                                        

                                        <label class="mt-3">Адрес (RU)</label>
                                        <textarea class="form-control" name="address_ru" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Logo (Opsiyonel)</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <button type="submit" class="btn btn-primary">Yadda Saxla</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 