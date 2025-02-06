@extends('back.layouts.master')
@section('title', 'Yeni Əlaqə Məlumatı')

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

                        @if(\App\Models\ContactData::count() >= 1)
                            <div class="alert alert-danger text-center py-4">
                                <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                                <h4 class="mb-0">Sistemdə artıq məlumat mövcuddur!</h4>
                                <p class="mb-0">Yalnız 1 məlumat əlavə edilə bilər</p>
                            </div>
                        @else
                            <form action="{{ route('back.pages.contact-data.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

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
                                                <input type="text" class="form-control" name="title_az" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Mətn (AZ)</label>
                                                <textarea class="form-control" name="text_az" rows="4" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label>Əlaqə Başlığı (AZ)</label>
                                                <input type="text" class="form-control" name="contact_title_az" required>
                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="titleEn">
                                            <div class="mb-3">
                                                <label>Title (EN)</label>
                                                <input type="text" class="form-control" name="title_en" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Text (EN)</label>
                                                <textarea class="form-control" name="text_en" rows="4" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label>Contact Title (EN)</label>
                                                <input type="text" class="form-control" name="contact_title_en" required>
                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="titleRu">
                                            <div class="mb-3">
                                                <label>Заголовок (RU)</label>
                                                <input type="text" class="form-control" name="title_ru" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Текст (RU)</label>
                                                <textarea class="form-control" name="text_ru" rows="4" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label>Контактный Заголовок (RU)</label>
                                                <input type="text" class="form-control" name="contact_title_ru" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Şəkil</label>
                                    <input type="file" class="form-control" name="image" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Yadda Saxla</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 