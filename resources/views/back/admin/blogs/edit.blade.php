@extends('back.layouts.master')
@section('title', 'Blog Redaktə')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">Blog Məzmununu Redaktə Et</h4>
                            <a href="{{ route('back.pages.blogs.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Siyahıya Qayıt
                            </a>
                        </div>

                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>Xəta: Zəhmət olmasa bütün tələb olunan sahələri doldurun
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <form action="{{ route('back.pages.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <div class="mb-3">
                                    <label>Blog Növü</label>
                                    <select class="form-select" name="blog_type_id" required>
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}" {{ $blog->blog_type_id == $type->id ? 'selected' : '' }}>
                                                {{ $type->name_az }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

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
                                            <input type="text" class="form-control" name="name_az" id="name_az" value="{{ $blog->name_az }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Qısa Mətn (AZ)</label>
                                            <textarea class="form-control" name="text_az" rows="3" required>{{ $blog->text_az }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Ətraflı Mətn (AZ)</label>
                                            <textarea class="form-control" name="description_az" rows="5" required>{{ $blog->description_az }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label style="display: flex;"> <div style="color: orange; margin-right: 10px;">Slug</div> (Diqqət! Slug Avtomatik olaraq yaradılır)</label>
                                            <input type="text" class="form-control" name="slug_az" id="slug_az" value="{{ $blog->slug_az }}" required>
                                        </div>
                                        <div class="mb-3">


                                            <label>Meta Başlıq (AZ)</label>
                                            <input type="text" class="form-control" name="meta_title_az" value="{{ $blog->meta_title_az }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>Meta Açıqlama (AZ)</label>
                                            <textarea class="form-control" name="meta_description_az" rows="2">{{ $blog->meta_description_az }}</textarea>
                                        </div>
                                    </div>

                                    <!-- EN Tab Content -->
                                    <div class="tab-pane fade" id="enTab">
                                        <div class="mb-3">
                                            <label>Name (EN)</label>
                                            <input type="text" class="form-control" name="name_en" id="name_en" value="{{ $blog->name_en }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Short Text (EN)</label>
                                            <textarea class="form-control" name="text_en" rows="3" required>{{ $blog->text_en }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Detailed Text (EN)</label>
                                            <textarea class="form-control" name="description_en" rows="5" required>{{ $blog->description_en }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label style="display: flex;"> <div style="color: orange; margin-right: 10px;">Slug</div> (Warning! Slug will be generated automatically)</label>
                                            <input type="text" class="form-control" name="slug_en" id="slug_en" value="{{ $blog->slug_en }}" required>
                                        </div>
                                        <div class="mb-3">

                                            <label>Meta Title (EN)</label>
                                            <input type="text" class="form-control" name="meta_title_en" value="{{ $blog->meta_title_en }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>Meta Description (EN)</label>
                                            <textarea class="form-control" name="meta_description_en" rows="2">{{ $blog->meta_description_en }}</textarea>
                                        </div>
                                    </div>

                                    <!-- RU Tab Content -->
                                    <div class="tab-pane fade" id="ruTab">
                                        <div class="mb-3">
                                            <label>Название (RU)</label>
                                            <input type="text" class="form-control" name="name_ru" id="name_ru" value="{{ $blog->name_ru }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Краткий текст (RU)</label>
                                            <textarea class="form-control" name="text_ru" rows="3" required>{{ $blog->text_ru }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Подробный текст (RU)</label>
                                            <textarea class="form-control" name="description_ru" rows="5" required>{{ $blog->description_ru }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label style="display: flex;"> <div style="color: orange; margin-right: 10px;">Slug</div> (Внимание! Слаг будет сгенерирован автоматически)</label>
                                            <input type="text" class="form-control" name="slug_ru" id="slug_ru" value="{{ $blog->slug_ru }}" required>
                                        </div>
                                        <div class="mb-3">



                                            <label>Мета заголовок (RU)</label>
                                            <input type="text" class="form-control" name="meta_title_ru" value="{{ $blog->meta_title_ru }}">
                                        </div>
                                        <div class="mb-3">
                                            <label>Мета описание (RU)</label>
                                            <textarea class="form-control" name="meta_description_ru" rows="2">{{ $blog->meta_description_ru }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>  <div style="color: orange;">Əsas Şəkil </div> (Diqqət! Şəkli Dəyişdirmək istəmirsinizsə boş qoyun)</label>
                                        <input type="file" class="form-control" name="image">
                                        @if($blog->image)
                                            <div class="mt-2">


                                                <img src="{{ asset($blog->image) }}" alt="" class="img-thumbnail" style="max-height: 100px">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label>Alt Mətn (AZ)</label>
                                        <input type="text" class="form-control" name="alt_az" value="{{ $blog->alt_az }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Alt Mətn (EN)</label>
                                        <input type="text" class="form-control" name="alt_en" value="{{ $blog->alt_en }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Alt Mətn (RU)</label>
                                        <input type="text" class="form-control" name="alt_ru" value="{{ $blog->alt_ru }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label><div style="color: orange;">Daxili Şəkil</div> (Diqqət! Şəkli Dəyişdirmək istəmirsinizsə boş qoyun)</label>
                                        <input type="file" class="form-control" name="bottom_image">
                                        @if($blog->bottom_image)
                                            <div class="mt-2">




                                                <img src="{{ asset($blog->bottom_image) }}" alt="" class="img-thumbnail" style="max-height: 100px">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label>Daxili Alt Mətn (AZ)</label>
                                        <input type="text" class="form-control" name="bottom_alt_az" value="{{ $blog->bottom_alt_az }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Daxili Alt Mətn (EN)</label>
                                        <input type="text" class="form-control" name="bottom_alt_en" value="{{ $blog->bottom_alt_en }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Daxili Alt Mətn (RU)</label>
                                        <input type="text" class="form-control" name="bottom_alt_ru" value="{{ $blog->bottom_alt_ru }}" required>
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

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Slug Generation Script
    const slugify = (text) => {
        let trMap = {'çÇ':'c','ğĞ':'g','şŞ':'s','üÜ':'u','ıİ':'i','öÖ':'o','əƏ':'e'};
        for(let key in trMap) {
            text = text.replace(new RegExp('['+key+']','g'), trMap[key]);
        }
        return text.toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim();
    };

    const setupSlug = (titleId, slugId) => {
        const title = document.getElementById(titleId);
        const slug = document.getElementById(slugId);
        let isManual = false;

        title?.addEventListener('input', function() {
            if(!isManual) slug.value = slugify(this.value);
        });
        
        slug?.addEventListener('input', function() {
            isManual = this.value !== slugify(title.value);
        });
    };

    ['az', 'en', 'ru'].forEach(lang => setupSlug(`name_${lang}`, `slug_${lang}`));

    // Summernote Init
    $('.summernote').summernote({
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
});
</script>

<style>
.nav-pills .nav-link {
    border-radius: 8px;
    transition: all 0.3s ease;
    border: 1px solid #dee2e6;
}

.nav-pills .nav-link.active {
    background: linear-gradient(45deg, #3b5de7, #6c757d);
    color: white !important;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.file-upload-wrapper {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    background: #f8f9fa;
    padding: 15px;
}

.card-title.text-primary {
    border-bottom: 2px solid #3b5de7;
    padding-bottom: 10px;
}

.input-group-text {
    background-color: #e9ecef;
    border-color: #dee2e6;
}

.form-control:focus {
    box-shadow: 0 0 0 0.2rem rgba(59,93,231,0.25);
    border-color: #3b5de7;
}
</style>
@endsection
