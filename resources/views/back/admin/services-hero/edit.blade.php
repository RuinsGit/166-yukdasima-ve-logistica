@extends('back.layouts.master')
@section('title', 'Xidmət Hero Redaktə Et')

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
        margin-top: 10px;
    }
</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Xidmət Hero Redaktə Et</h4>
                        <p class="card-title-desc">Xidmət hero məlumatlarını bu form vasitəsilə redaktə edə bilərsiniz.</p>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('back.pages.services-hero.update', $servicesHero->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#mainSection">Əsas Şəkil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#experienceSection">Təcrübə</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#managerSection">Menecer</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#securitySection">Təhlükəsizlik</a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-3">
                                    <!-- Main Image Section -->
                                    <div class="tab-pane fade show active" id="mainSection">
                                        <div class="mb-3">
                                            <label>Mövcud Əsas Şəkil</label><br>
                                            @if($servicesHero->main_image_path)
                                                <img src="{{ asset('storage/'.$servicesHero->main_image_path) }}" 
                                                     class="img-thumbnail" 
                                                     style="width: 150px; height: 100px;">
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label>Yeni Əsas Şəkil</label>
                                            <input type="file" class="form-control" name="main_image">
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
                                                <label>ALT Mətni (AZ)</label>
                                                <input type="text" class="form-control" name="main_image_alt_az" value="{{ $servicesHero->main_image_alt_az }}" required>
                                            </div>
                                            <div class="tab-pane fade" id="mainEn">
                                                <label>ALT Text (EN)</label>
                                                <input type="text" class="form-control" name="main_image_alt_en" value="{{ $servicesHero->main_image_alt_en }}" required>
                                            </div>
                                            <div class="tab-pane fade" id="mainRu">
                                                <label>ALT Текст (RU)</label>
                                                <input type="text" class="form-control" name="main_image_alt_ru" value="{{ $servicesHero->main_image_alt_ru }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Experience Section -->
                                    <div class="tab-pane fade" id="experienceSection">
                                        <div class="mb-3">
                                            <label>Mövcud Təcrübə Şəkili</label><br>
                                            @if($servicesHero->experience_image_path)
                                                <img src="{{ asset('storage/'.$servicesHero->experience_image_path) }}" 
                                                     class="img-thumbnail" 
                                                     style="width: 150px; height: 100px;">
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label>Yeni Təcrübə Şəkili</label>
                                            <input type="file" class="form-control" name="experience_image">
                                        </div>

                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#expAz">AZ</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#expEn">EN</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#expRu">RU</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content mt-3">
                                            <div class="tab-pane fade show active" id="expAz">
                                                <label>Başlıq (AZ)</label>
                                                <input type="text" class="form-control" name="experience_text_az" value="{{ $servicesHero->experience_text_az }}" required>
                                                
                                                <label class="mt-3">Mətn (AZ)</label>
                                                <textarea class="form-control" name="experience_description_az" rows="4" required>{{ $servicesHero->experience_description_az }}</textarea>
                                                
                                                <label class="mt-3">ALT Mətni (AZ)</label>
                                                <input type="text" class="form-control" name="experience_image_alt_az" value="{{ $servicesHero->experience_image_alt_az }}" required>
                                            </div>
                                            <div class="tab-pane fade" id="expEn">
                                                <label>Title (EN)</label>
                                                <input type="text" class="form-control" name="experience_text_en" value="{{ $servicesHero->experience_text_en }}" required>
                                                
                                                <label class="mt-3">Text (EN)</label>
                                                <textarea class="form-control" name="experience_description_en" rows="4" required>{{ $servicesHero->experience_description_en }}</textarea>
                                                
                                                <label class="mt-3">ALT Text (EN)</label>
                                                <input type="text" class="form-control" name="experience_image_alt_en" value="{{ $servicesHero->experience_image_alt_en }}" required>
                                            </div>
                                            <div class="tab-pane fade" id="expRu">
                                                <label>Заголовок (RU)</label>
                                                <input type="text" class="form-control" name="experience_text_ru" value="{{ $servicesHero->experience_text_ru }}" required>
                                                
                                                <label class="mt-3">Текст (RU)</label>
                                                <textarea class="form-control" name="experience_description_ru" rows="4" required>{{ $servicesHero->experience_description_ru }}</textarea>
                                                
                                                <label class="mt-3">ALT Текст (RU)</label>
                                                <input type="text" class="form-control" name="experience_image_alt_ru" value="{{ $servicesHero->experience_image_alt_ru }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Manager Section -->
                                    <div class="tab-pane fade" id="managerSection">
                                        <div class="mb-3">
                                            <label>Mövcud Menecer Şəkili</label><br>
                                            @if($servicesHero->manager_image_path)
                                                <img src="{{ asset('storage/'.$servicesHero->manager_image_path) }}" 
                                                     class="img-thumbnail" 
                                                     style="width: 150px; height: 100px;">
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label>Yeni Menecer Şəkili</label>
                                            <input type="file" class="form-control" name="manager_image">
                                        </div>

                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#managerAz">AZ</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#managerEn">EN</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#managerRu">RU</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content mt-3">
                                            <div class="tab-pane fade show active" id="managerAz">
                                                <label>Başlıq (AZ)</label>
                                                <input type="text" class="form-control" name="manager_text_az" value="{{ $servicesHero->manager_text_az }}" required>
                                                
                                                <label class="mt-3">Mətn (AZ)</label>
                                                <textarea class="form-control" name="manager_description_az" rows="4" required>{{ $servicesHero->manager_description_az }}</textarea>
                                                
                                                <label class="mt-3">ALT Mətni (AZ)</label>
                                                <input type="text" class="form-control" name="manager_image_alt_az" value="{{ $servicesHero->manager_image_alt_az }}" required>
                                            </div>
                                            <div class="tab-pane fade" id="managerEn">
                                                <label>Title (EN)</label>
                                                <input type="text" class="form-control" name="manager_text_en" value="{{ $servicesHero->manager_text_en }}" required>
                                                
                                                <label class="mt-3">Text (EN)</label>
                                                <textarea class="form-control" name="manager_description_en" rows="4" required>{{ $servicesHero->manager_description_en }}</textarea>
                                                
                                                <label class="mt-3">ALT Text (EN)</label>
                                                <input type="text" class="form-control" name="manager_image_alt_en" value="{{ $servicesHero->manager_image_alt_en }}" required>
                                            </div>
                                            <div class="tab-pane fade" id="managerRu">
                                                <label>Заголовок (RU)</label>
                                                <input type="text" class="form-control" name="manager_text_ru" value="{{ $servicesHero->manager_text_ru }}" required>
                                                
                                                <label class="mt-3">Текст (RU)</label>
                                                <textarea class="form-control" name="manager_description_ru" rows="4" required>{{ $servicesHero->manager_description_ru }}</textarea>
                                                
                                                <label class="mt-3">ALT Текст (RU)</label>
                                                <input type="text" class="form-control" name="manager_image_alt_ru" value="{{ $servicesHero->manager_image_alt_ru }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Security Section -->
                                    <div class="tab-pane fade" id="securitySection">
                                        <div class="mb-3">
                                            <label>Mövcud Təhlükəsizlik Şəkili</label><br>
                                            @if($servicesHero->security_image_path)
                                                <img src="{{ asset('storage/'.$servicesHero->security_image_path) }}" 
                                                     class="img-thumbnail" 
                                                     style="width: 150px; height: 100px;">
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label>Yeni Təhlükəsizlik Şəkili</label>
                                            <input type="file" class="form-control" name="security_image">
                                        </div>

                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#securityAz">AZ</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#securityEn">EN</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#securityRu">RU</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content mt-3">
                                            <div class="tab-pane fade show active" id="securityAz">
                                                <label>Başlıq (AZ)</label>
                                                <input type="text" class="form-control" name="security_text_az" value="{{ $servicesHero->security_text_az }}" required>
                                                
                                                <label class="mt-3">Mətn (AZ)</label>
                                                <textarea class="form-control" name="security_description_az" rows="4" required>{{ $servicesHero->security_description_az }}</textarea>
                                                
                                                <label class="mt-3">ALT Mətni (AZ)</label>
                                                <input type="text" class="form-control" name="security_image_alt_az" value="{{ $servicesHero->security_image_alt_az }}" required>
                                            </div>
                                            <div class="tab-pane fade" id="securityEn">
                                                <label>Title (EN)</label>
                                                <input type="text" class="form-control" name="security_text_en" value="{{ $servicesHero->security_text_en }}" required>
                                                
                                                <label class="mt-3">Text (EN)</label>
                                                <textarea class="form-control" name="security_description_en" rows="4" required>{{ $servicesHero->security_description_en }}</textarea>
                                                
                                                <label class="mt-3">ALT Text (EN)</label>
                                                <input type="text" class="form-control" name="security_image_alt_en" value="{{ $servicesHero->security_image_alt_en }}" required>
                                            </div>
                                            <div class="tab-pane fade" id="securityRu">
                                                <label>Заголовок (RU)</label>
                                                <input type="text" class="form-control" name="security_text_ru" value="{{ $servicesHero->security_text_ru }}" required>
                                                
                                                <label class="mt-3">Текст (RU)</label>
                                                <textarea class="form-control" name="security_description_ru" rows="4" required>{{ $servicesHero->security_description_ru }}</textarea>
                                                
                                                <label class="mt-3">ALT Текст (RU)</label>
                                                <input type="text" class="form-control" name="security_image_alt_ru" value="{{ $servicesHero->security_image_alt_ru }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Yenilə</button>
                                    <a href="{{ route('back.pages.services-hero.index') }}" class="btn btn-secondary">Ləğv Et</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 