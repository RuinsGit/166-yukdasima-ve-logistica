@extends('back.layouts.master')
@section('title', 'Yeni Müştəri Əlavə Et')

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

                        <form action="{{ route('back.pages.our-clients.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <h4 class="mb-3">Əsas Bölmə</h4>
                                <div class="mb-3">
                                    <label>Əsas Şəkil</label>
                                    <input type="file" class="form-control" name="main_image" required>
                                </div>

                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#mainAz">AZ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#mainEn">EN</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#mainRu">RU</a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-3">
                                    <div class="tab-pane fade show active" id="mainAz">
                                        <div class="mb-3">
                                            <label>Başlıq (AZ)</label>
                                            <input type="text" class="form-control" name="text_az" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Açıqlama (AZ)</label>
                                            <textarea class="form-control" name="description_az" rows="4" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Alt Mətni (AZ)</label>
                                            <input type="text" class="form-control" name="main_alt_az" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Meta Başlıq (AZ)</label>
                                            <input type="text" class="form-control" name="meta_title_az">
                                        </div>
                                        <div class="mb-3">
                                            <label>Meta Açıqlama (AZ)</label>
                                            <textarea class="form-control" name="meta_description_az" rows="3"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="mainEn">
                                        <div class="mb-3">
                                            <label>Title (EN)</label>
                                            <input type="text" class="form-control" name="text_en" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Description (EN)</label>
                                            <textarea class="form-control" name="description_en" rows="4" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Alt Text (EN)</label>
                                            <input type="text" class="form-control" name="main_alt_en" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Meta Title (EN)</label>
                                            <input type="text" class="form-control" name="meta_title_en">
                                        </div>
                                        <div class="mb-3">
                                            <label>Meta Description (EN)</label>
                                            <textarea class="form-control" name="meta_description_en" rows="3"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="mainRu">
                                        <div class="mb-3">
                                            <label>Заголовок (RU)</label>
                                            <input type="text" class="form-control" name="text_ru" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Описание (RU)</label>
                                            <textarea class="form-control" name="description_ru" rows="4" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Alt Текст (RU)</label>
                                            <input type="text" class="form-control" name="main_alt_ru" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Мета Заголовок (RU)</label>
                                            <input type="text" class="form-control" name="meta_title_ru">
                                        </div>
                                        <div class="mb-3">
                                            <label>Мета Описание (RU)</label>
                                            <textarea class="form-control" name="meta_description_ru" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h4 class="mb-3">Alt Şəkillər</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Alt Şəkil 1</label>
                                            <input type="file" class="form-control" name="bottom_image1" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Alt Şəkil 2</label>
                                            <input type="file" class="form-control" name="bottom_image2" required>
                                        </div>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#bottomAz">AZ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#bottomEn">EN</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#bottomRu">RU</a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-3">
                                    <div class="tab-pane fade show active" id="bottomAz">
                                        <div class="mb-3">
                                            <label>Alt Şəkil 1 Alt Mətni (AZ)</label>
                                            <input type="text" class="form-control" name="bottom1_alt_az" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Alt Şəkil 2 Alt Mətni (AZ)</label>
                                            <input type="text" class="form-control" name="bottom2_alt_az" required>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="bottomEn">
                                        <div class="mb-3">
                                            <label>Bottom Image 1 Alt Text (EN)</label>
                                            <input type="text" class="form-control" name="bottom1_alt_en" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Bottom Image 2 Alt Text (EN)</label>
                                            <input type="text" class="form-control" name="bottom2_alt_en" required>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="bottomRu">
                                        <div class="mb-3">
                                            <label>Alt Текст для Нижнего Изображения 1 (RU)</label>
                                            <input type="text" class="form-control" name="bottom1_alt_ru" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Alt Текст для Нижнего Изображения 2 (RU)</label>
                                            <input type="text" class="form-control" name="bottom2_alt_ru" required>
                                        </div>
                                    </div>
                                </div>
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