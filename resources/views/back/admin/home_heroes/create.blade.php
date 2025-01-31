@extends('back.layouts.master')

@section('title', 'Yeni Hero Əlavə Et')

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
        
        <form action="{{ route('back.pages.home-heroes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Medya Türü Seçim Butonları -->
            <div class="mb-4">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-primary media-type-btn" data-type="image">
                        <i class="ri-image-line me-2"></i>Şəkil
                    </button>
                    <button type="button" class="btn btn-outline-primary media-type-btn" data-type="video">
                        <i class="ri-video-line me-2"></i>Video
                    </button>
                </div>
                <input type="hidden" name="media_type" id="selectedMediaType" value="image">
            </div>

            <div class="mb-3">
                <label class="form-label">Media Faylı Seçin</label>
                <input type="file" class="form-control" name="media" required>
            </div>

            <!-- Dillər üzrə ALT mətnləri -->
            <div id="altFields">
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
                            <textarea class="form-control" name="alt_az" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="altEn">
                        <div class="mb-3">
                            <label>ALT Metni (EN)</label>
                            <textarea class="form-control" name="alt_en" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="altRu">
                        <div class="mb-3">
                            <label>ALT Metni (RU)</label>
                            <textarea class="form-control" name="alt_ru" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Video Başlığı (Sadece Video Seçilirse Görünecek) -->
            <div class="mb-3" id="videoTitleField" style="display: none;">
                <label>Video Başlığı</label>
                <input type="text" class="form-control" name="video_title">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="ri-save-line"></i> Yadda Saxla
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

        // İlkin vəziyyət təyini
        let activeType = 'image';
        
        function toggleFields(type) {
            activeType = type;
            selectedMediaType.value = type;

            // Butonları yenilə
            mediaTypeBtns.forEach(btn => {
                const isActive = btn.dataset.type === activeType;
                btn.classList.toggle('btn-primary', isActive);
                btn.classList.toggle('btn-outline-primary', !isActive);
                btn.classList.toggle('active', isActive);
            });

            // Görünürlük və tələb olunanlıq
            const isImage = activeType === 'image';
            altFields.style.display = isImage ? 'block' : 'none';
            videoTitleField.style.display = isImage ? 'none' : 'block';

            // Inputları idarə et
            document.querySelectorAll('#altFields textarea').forEach(el => {
                el.required = isImage;
                el.disabled = !isImage;
            });
            
            const videoInput = document.querySelector('#videoTitleField input');
            videoInput.required = !isImage;
            videoInput.disabled = isImage;
        }

        // Tıklama hadisələri
        mediaTypeBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const type = btn.dataset.type;
                if(type !== activeType) {
                    toggleFields(type);
                }
            });
        });

        // İlkin yüklənmə
        toggleFields('image');
    });
</script>
@endpush
@endsection 