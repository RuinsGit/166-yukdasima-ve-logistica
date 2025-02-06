@extends('back.layouts.master')
@section('title', 'Əlaqə Məlumatını Redaktə Et')

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

                        <form action="{{ route('back.pages.contact-data.update', $contactData->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label>Mövcud Şəkil</label><br>
                                <img src="{{ asset('storage/'.$contactData->image_path) }}" 
                                     class="img-thumbnail" 
                                     style="width: 200px; height: 150px; object-fit: cover;">
                            </div>

                            <div class="mb-4">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#titleAz">AZ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#titleEn">EN</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#titleRu">RU</a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-3">
                                    <div class="tab-pane fade show active" id="titleAz">
                                        <div class="mb-3">
                                            <label>Başlıq (AZ)</label>
                                            <input type="text" class="form-control" name="title_az" value="{{ $contactData->title_az }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Mətn (AZ)</label>
                                            <textarea class="form-control" name="text_az" rows="4" required>{{ $contactData->text_az }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Əlaqə Başlığı (AZ)</label>
                                            <input type="text" class="form-control" name="contact_title_az" value="{{ $contactData->contact_title_az }}" required>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="titleEn">
                                        <div class="mb-3">
                                            <label>Title (EN)</label>
                                            <input type="text" class="form-control" name="title_en" value="{{ $contactData->title_en }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Text (EN)</label>
                                            <textarea class="form-control" name="text_en" rows="4" required>{{ $contactData->text_en }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Contact Title (EN)</label>
                                            <input type="text" class="form-control" name="contact_title_en" value="{{ $contactData->contact_title_en }}" required>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="titleRu">
                                        <div class="mb-3">
                                            <label>Заголовок (RU)</label>
                                            <input type="text" class="form-control" name="title_ru" value="{{ $contactData->title_ru }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Текст (RU)</label>
                                            <textarea class="form-control" name="text_ru" rows="4" required>{{ $contactData->text_ru }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Контактный Заголовок (RU)</label>
                                            <input type="text" class="form-control" name="contact_title_ru" value="{{ $contactData->contact_title_ru }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Yeni Şəkil Seçin (Dəyişdirmək istəmirsinizsə boş buraxın)</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <button type="submit" class="btn btn-primary">Yenilə</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 