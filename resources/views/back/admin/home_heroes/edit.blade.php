@extends('back.layouts.master')

@section('title', 'Hero Redaktəsi')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('back.pages.home-heroes.update', $homeHero->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Medya Türü Seçim Butonları -->
            <div class="mb-4">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-primary media-type-btn {{ $homeHero->media_type === 'image' ? 'active' : '' }}" data-type="image">
                        <i class="ri-image-line me-2"></i>Şəkil
                    </button>
                    <button type="button" class="btn btn-outline-primary media-type-btn {{ $homeHero->media_type === 'video' ? 'active' : '' }}" data-type="video">
                        <i class="ri-video-line me-2"></i>Video
                    </button>
                </div>
                <input type="hidden" name="media_type" id="selectedMediaType" value="{{ $homeHero->media_type }}">
            </div>

            <div class="media-preview-container">
                @if($homeHero->media_type === 'image')
                    <img src="{{ asset('storage/'.$homeHero->media_path) }}" 
                         class="media-preview" 
                         alt="Mövcud media">
                @else
                    <video class="media-preview" controls controlsList="nodownload">
                        <source src="{{ asset('storage/'.$homeHero->media_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @endif
            </div>

            <div class="media-info mt-2">
                <small class="text-muted">
                    <i class="ri-information-line"></i>
                    Fayl adı: {{ basename($homeHero->media_path) }}<br>
                    Yüklənmə tarixi: {{ $homeHero->created_at->format('d.m.Y H:i') }}
                </small>
            </div>

            <div class="mb-3">
                <label class="form-label">Yeni Media Faylı (Dəyişdirmək üçün)</label>
                <input type="file" class="form-control" name="media">
            </div>

            <!-- Dillər üzrə ALT mətnləri -->
            <div id="altFields" style="{{ $homeHero->media_type === 'video' ? 'display:none;' : '' }}">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#altAz">AZ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#altEn">EN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#altRu">RU</a>
                    </li>
                </ul>

                <div class="tab-content mt-3">
                    <div class="tab-pane fade show active" id="altAz">
                        <div class="mb-3">
                            <label>ALT Mətni (Azərbaycanca)</label>
                            <textarea class="form-control" name="alt_az" rows="3" required>{{ old('alt_az', $homeHero->alt_az) }}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="altEn">
                        <div class="mb-3">
                            <label>ALT Mətni (İngiliscə)</label>
                            <textarea class="form-control" name="alt_en" rows="3" required>{{ old('alt_en', $homeHero->alt_en) }}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="altRu">
                        <div class="mb-3">
                            <label>ALT Mətni (Rusca)</label>
                            <textarea class="form-control" name="alt_ru" rows="3" required>{{ old('alt_ru', $homeHero->alt_ru) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Video Başlığı -->
            <div class="mb-3" id="videoTitleField" style="{{ $homeHero->media_type === 'image' ? 'display:none;' : '' }}">
                <label>Video Başlığı</label>
                <input type="text" class="form-control" name="video_title" value="{{ old('video_title', $homeHero->video_title) }}">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="ri-refresh-line"></i> Yenilə
            </button>
        </form>
    </div>
</div>

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mediaTypeBtns = document.querySelectorAll('.media-type-btn');
        const altFields = document.getElementById('altFields');
        const videoTitleField = document.getElementById('videoTitleField');
        const selectedMediaType = document.getElementById('selectedMediaType');

        let activeType = '{{ $homeHero->media_type }}';
        
        function toggleFields(type) {
            activeType = type;
            selectedMediaType.value = type;

            mediaTypeBtns.forEach(btn => {
                const isActive = btn.dataset.type === activeType;
                btn.classList.toggle('btn-primary', isActive);
                btn.classList.toggle('btn-outline-primary', !isActive);
                btn.classList.toggle('active', isActive);
            });

            const isImage = activeType === 'image';
            altFields.style.display = isImage ? 'block' : 'none';
            videoTitleField.style.display = isImage ? 'none' : 'block';

            document.querySelectorAll('#altFields textarea').forEach(el => {
                el.required = isImage;
                el.disabled = !isImage;
            });
            
            const videoInput = document.querySelector('#videoTitleField input');
            videoInput.required = !isImage;
            videoInput.disabled = isImage;
        }

        mediaTypeBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const type = btn.dataset.type;
                if(type !== activeType) {
                    toggleFields(type);
                }
            });
        });

        // İlkin vəziyyət
        toggleFields(activeType);
    });
</script>
@endpush

<style>
    .media-preview-container {
        position: relative;
        max-width: 300px;
        margin: 10px 0;
        border-radius: 10px;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .media-preview {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    
    .media-preview:hover {
        transform: scale(1.03);
    }
    
    video.media-preview {
        background: #f0f0f0;
        border: 2px solid #e0e0e0;
    }
</style>
@endsection
