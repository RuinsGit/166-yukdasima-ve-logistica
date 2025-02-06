@extends('back.layouts.master')
@section('title', 'Yeni Komanda Üzvü Əlavə Et')

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

                        <form action="{{ route('back.pages.teams.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <label>Ad (Azərbaycanca)</label>
                                        <input type="text" class="form-control" name="name_az" required>
                                        
                                        <label class="mt-3">Pozisiya (AZ)</label>
                                        <input type="text" class="form-control" name="position_az" required placeholder="Məs: Adminstrator">
                                    </div>
                                    <div class="tab-pane fade" id="nameEn">
                                        <label>Name (English)</label>
                                        <input type="text" class="form-control" name="name_en" required>
                                        
                                        <label class="mt-3">Position (EN)</label>
                                        <input type="text" class="form-control" name="position_en" required placeholder="Ex: Manager">
                                    </div>
                                    <div class="tab-pane fade" id="nameRu">
                                        <label>Название (Русский)</label>
                                        <input type="text" class="form-control" name="name_ru" required>
                                        
                                        <label class="mt-3">Позиция (RU)</label>
                                        <input type="text" class="form-control" name="position_ru" required placeholder="Напр: Менеджер">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Şəkil</label>
                                <input type="file" class="form-control" name="image" required>
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