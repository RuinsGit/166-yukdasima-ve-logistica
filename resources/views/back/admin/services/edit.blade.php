@extends('back.layouts.master')
@section('title', 'Xidməti Redaktə Et')

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

                        <form action="{{ route('back.pages.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Yeni resim yükleme alanı -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Main Image</label>
                                        @if($service->image_main)
                                            <img src="{{ asset('storage/'.$service->image_main) }}" class="d-block mb-2 img-thumbnail" 
                                            
                                            style="width: 150px; height: 100px; object-fit: cover; border-radius: 10px;">
                                            <div class="">

                                                    <!-- <input type="checkbox" name="remove_image_main" class="form-check-input">   
                                                    <label class="form-check-label text-danger">Şəkli sil</label> -->
                                            </div>
                                        @endif
                                        <input type="file" class="form-control" name="image_main">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Bottom Image</label>
                                        @if($service->image_bottom)
                                            <img src="{{ asset('storage/'.$service->image_bottom) }}" class="d-block mb-2 img-thumbnail" 
                                            
                                            style="width: 150px; height: 100px; object-fit: cover; border-radius: 10px;">
                                            <div class="">
                                                    <!-- <input type="checkbox" name="remove_image_bottom" class="form-check-input">   


                                                    <label class="form-check-label text-danger">Şəkli sil</label> -->
                                            </div>
                                        @endif

                                        <input type="file" class="form-control" name="image_bottom">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#azTab">AZ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#enTab">EN</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#ruTab">RU</a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-3">
                                    <!-- AZ Tab -->
                                    <div class="tab-pane fade show active" id="azTab">
                                        <div class="mb-3">
                                            <label>Ad (AZ)</label>
                                            <input type="text" class="form-control" name="name_az" value="{{ $service->name_az }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Qısa Mətn (AZ)</label>
                                            <textarea class="form-control" name="text_az" rows="3" required>{{ $service->text_az }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Ətraflı Açıqlama (AZ)</label>
                                            <textarea class="form-control" name="description_az" rows="5" required>{{ $service->description_az }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Slug (AZ)</label>
                                            <input type="text" class="form-control" name="slug_az" value="{{ $service->slug_az }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Əsas Şəkil ALT Mətni (AZ)</label>
                                            <input type="text" class="form-control" name="image_main_alt_az" value="{{ $service->image_main_alt_az }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>Alt Şəkil ALT Mətni (AZ)</label>
                                            <input type="text" class="form-control" name="image_bottom_alt_az" value="{{ $service->image_bottom_alt_az }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>Əlavə Açıqlama  (AZ)</label>
                                            <textarea class="form-control summernote" name="description2_az" rows="3">{{ $service->description2_az }}</textarea>
                                        </div>
                                    </div>

                                    <!-- EN Tab -->
                                    <div class="tab-pane fade" id="enTab">
                                        <div class="mb-3">
                                            <label>Name (EN)</label>
                                            <input type="text" class="form-control" name="name_en" value="{{ $service->name_en }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Short Text (EN)</label>
                                            <textarea class="form-control" name="text_en" rows="3" required>{{ $service->text_en }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Detailed Description (EN)</label>
                                            <textarea class="form-control" name="description_en" rows="5" required>{{ $service->description_en }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Slug (EN)</label>
                                            <input type="text" class="form-control" name="slug_en" value="{{ $service->slug_en }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Main Image ALT Text (EN)</label>
                                            <input type="text" class="form-control" name="image_main_alt_en" value="{{ $service->image_main_alt_en }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>Bottom Image ALT Text (EN)</label>
                                            <input type="text" class="form-control" name="image_bottom_alt_en" value="{{ $service->image_bottom_alt_en }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>Additional Description  (EN)</label>
                                            <textarea class="form-control summernote" name="description2_en" rows="3">{{ $service->description2_en }}</textarea>
                                        </div>
                                    </div>

                                    <!-- RU Tab -->
                                    <div class="tab-pane fade" id="ruTab">
                                        <div class="mb-3">
                                            <label>Название (RU)</label>
                                            <input type="text" class="form-control" name="name_ru" value="{{ $service->name_ru }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Краткий текст (RU)</label>
                                            <textarea class="form-control" name="text_ru" rows="3" required>{{ $service->text_ru }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Подробное описание (RU)</label>
                                            <textarea class="form-control" name="description_ru" rows="5" required>{{ $service->description_ru }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Slug (RU)</label>
                                            <input type="text" class="form-control" name="slug_ru" value="{{ $service->slug_ru }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>ALT текст главного изображения (RU)</label>
                                            <input type="text" class="form-control" name="image_main_alt_ru" value="{{ $service->image_main_alt_ru }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>ALT текст нижнего изображения (RU)</label>
                                            <input type="text" class="form-control" name="image_bottom_alt_ru" value="{{ $service->image_bottom_alt_ru }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>Дополнительное описание 2 (RU)</label>
                                            <textarea class="form-control summernote" name="description2_ru" rows="3">{{ $service->description2_ru }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Xidmət Növü</label>
                                <select name="service_type_id" class="form-control select2" required>
                                    <option value="">Növ seçin</option>
                                    @foreach($serviceTypes as $type)
                                        <option value="{{ $type->id }}" {{ $service->service_type_id == $type->id ? 'selected' : '' }}>
                                            {{ $type->name_az }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Yenilə</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    // Slug oluşturma fonksiyonu
    function slugify(text) {
        const trMap = {
            'çÇ':'c', 'ğĞ':'g', 'şŞ':'s', 'üÜ':'u',
            'ıİ':'i', 'öÖ':'o', 'əƏ':'e', '/': '-', '_': '-'
        };
        return text.toString().toLowerCase()
            .replace(/([çğşüöıə])/gi, function(match) {
                return trMap[match] || match;
            })
            .replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .replace(/^-+|-+$/g, '');
    }

    ['az', 'en', 'ru'].forEach(lang => {
        const titleInput = document.querySelector(`input[name="name_${lang}"]`);
        const slugInput = document.querySelector(`input[name="slug_${lang}"]`);
        let isManual = false;


        if(titleInput && slugInput) {
            
            isManual = slugInput.value !== slugify(titleInput.value);

            titleInput.addEventListener('input', function() {
                if(!isManual) {
                    slugInput.value = slugify(this.value);
                }
            });
            
            slugInput.addEventListener('change', function() {
                isManual = this.value !== slugify(titleInput.value);
            });
        }
    });

    $('.summernote').summernote({
        height: 200,
        toolbar: [

            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['codeview', 'help']]
        ]
    });
});
</script>
@endsection 