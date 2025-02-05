@extends('back.layouts.master')
@section('title', 'Yeni Blog Əlavə Et')

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

                        <form action="{{ route('back.pages.blogs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

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
                                    <!-- AZ Tab Content -->
                                    <div class="tab-pane fade show active" id="azTab">
                                        <div class="mb-3">
                                            <label>Başlıq (AZ)</label>
                                            <input type="text" class="form-control" name="name_az" id="name_az" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Qısa Mətn (AZ)</label>
                                            <textarea class="form-control" name="text_az" rows="3" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Ətraflı Mətn Başlığı (AZ)</label>
                                            <textarea class="form-control" name="text_2_az" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Ətraflı Mətn (AZ)</label>
                                            <textarea class="form-control summernote" name="description_az" rows="5" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Çoxlu Şəkillər</label>
                                            <input type="file" class="form-control" name="multiple_images[]" multiple>
                                        </div>
                                        <div class="mb-3">
                                            <label>Ətraflı Mətn 2 (AZ)</label>
                                            <textarea class="form-control summernote" name="description_3_az" rows="5"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label style="display: flex;"> <div style="color: orange; margin-right: 10px;">Slug</div> (Diqqət! Slug Avtomatik olaraq yaradılır)</label>
                                            <input type="text" class="form-control" name="slug_az" id="slug_az" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Meta Başlıq (AZ)</label>
                                            <input type="text" class="form-control" name="meta_title_az">
                                        </div>
                                        <div class="mb-3">
                                            <label>Meta Açıqlama (AZ)</label>
                                            <textarea class="form-control" name="meta_description_az" rows="2"></textarea>
                                        </div>
                                    </div>

                                    <!-- EN Tab Content -->
                                    <div class="tab-pane fade" id="enTab">
                                        <div class="mb-3">
                                            <label>Name (EN)</label>
                                            <input type="text" class="form-control" name="name_en" id="name_en" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Short Text (EN)</label>
                                            <textarea class="form-control" name="text_en" rows="3" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Detailed Text Title (EN)</label>
                                            <textarea class="form-control" name="text_2_en" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Detailed Text (EN)</label>
                                            <textarea class="form-control summernote" name="description_en" rows="5" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Çoxlu Şəkillər</label>
                                            <input type="file" class="form-control" name="multiple_images[]" multiple>
                                        </div>
                                        <div class="mb-3">
                                            <label>Detailed Text 2 (EN)</label>
                                            <textarea class="form-control summernote" name="description_3_en" rows="5"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label style="display: flex;"> <div style="color: orange; margin-right: 10px;">Slug</div> (Warning! Slug will be generated automatically)</label>
                                            <input type="text" class="form-control" name="slug_en" id="slug_en" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Meta Title (EN)</label>
                                            <input type="text" class="form-control" name="meta_title_en">
                                        </div>
                                        <div class="mb-3">
                                            <label>Meta Description (EN)</label>
                                            <textarea class="form-control" name="meta_description_en" rows="2"></textarea>
                                        </div>
                                    </div>

                                    <!-- RU Tab Content -->
                                    <div class="tab-pane fade" id="ruTab">
                                        <div class="mb-3">
                                            <label>Название (RU)</label>
                                            <input type="text" class="form-control" name="name_ru" id="name_ru" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Краткий текст (RU)</label>
                                            <textarea class="form-control" name="text_ru" rows="3" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>подробный текст заголовка (RU)</label>
                                            <textarea class="form-control" name="text_2_ru" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Подробный текст (RU)</label>
                                            <textarea class="form-control summernote" name="description_ru" rows="5" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Çoxlu Şəkillər</label>
                                            <input type="file" class="form-control" name="multiple_images[]" multiple>
                                        </div>
                                        <div class="mb-3">
                                            <label>Подробный текст 2 (RU)</label>
                                            <textarea class="form-control summernote" name="description_3_ru" rows="5"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label style="display: flex;"> <div style="color: orange; margin-right: 10px;">Slug</div> (Внимание! Слаг будет сгенерирован автоматически)</label>
                                            <input type="text" class="form-control" name="slug_ru" id="slug_ru" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Мета заголовок (RU)</label>
                                            <input type="text" class="form-control" name="meta_title_ru">
                                        </div>
                                        <div class="mb-3">
                                            <label>Мета описание (RU)</label>
                                            <textarea class="form-control" name="meta_description_ru" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Əsas Şəkil</label>
                                        <input type="file" class="form-control" name="image" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Alt Mətn (AZ)</label>
                                        <input type="text" class="form-control" name="alt_az" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Alt Mətn (EN)</label>
                                        <input type="text" class="form-control" name="alt_en" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Alt Mətn (RU)</label>
                                        <input type="text" class="form-control" name="alt_ru" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Daxili Şəkil </label>
                                        <input type="file" class="form-control" name="bottom_image" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Daxili Alt Mətn (AZ)</label>
                                        <input type="text" class="form-control" name="bottom_alt_az" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Daxili Alt Mətn (EN)</label>
                                        <input type="text" class="form-control" name="bottom_alt_en" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Daxili Alt Mətn (RU)</label>
                                        <input type="text" class="form-control" name="bottom_alt_ru" required>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slugify = (text) => {
        let trMap = {
            'çÇ':'c',
            'ğĞ':'g',
            'şŞ':'s', 
            'üÜ':'u',
            'ıİ':'i',
            'öÖ':'o',
            'əƏ':'e'
        };
        for(let key in trMap) {
            text = text.replace(new RegExp('['+key+']','g'), trMap[key]);
        }
        return text
            .toLowerCase()
            .replace(/[^-a-zA-Z0-9\s]+/ig, '')
            .replace(/\s/gi, "-")
            .replace(/-+/g, "-")
            .trim();
    };

    // AZ dil üçün
    const titleAz = document.getElementById('name_az');
    const slugAz = document.getElementById('slug_az');
    let isAzSlugManual = false;

    titleAz.addEventListener('input', function() {
        if(!isAzSlugManual) {
            slugAz.value = slugify(this.value);
        }
    });
    
    slugAz.addEventListener('input', function() {
        isAzSlugManual = this.value !== slugify(titleAz.value);
    });

    // EN dil üçün
    const titleEn = document.getElementById('name_en');
    const slugEn = document.getElementById('slug_en');
    let isEnSlugManual = false;

    titleEn.addEventListener('input', function() {
        if(!isEnSlugManual) {
            slugEn.value = slugify(this.value);
        }
    });
    
    slugEn.addEventListener('input', function() {
        isEnSlugManual = this.value !== slugify(titleEn.value);
    });

    // RU dil üçün
    const titleRu = document.getElementById('name_ru');
    const slugRu = document.getElementById('slug_ru');
    let isRuSlugManual = false;

    titleRu.addEventListener('input', function() {
        if(!isRuSlugManual) {
            slugRu.value = slugify(this.value);
        }
    });
    
    slugRu.addEventListener('input', function() {
        isRuSlugManual = this.value !== slugify(titleRu.value);
    });
});
</script>

@endsection

