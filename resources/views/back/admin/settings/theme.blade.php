<!-- Footer Ayarları -->
@extends('back.layouts.master')

@section('title', 'Tema Parametrləri')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Tema Parametrləri</h4>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('back.pages.theme-settings.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Ümumi Parametrlər -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">Ümumi Tema Parametrləri</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Fon növü</label>
                                    <select class="form-select" name="background_type" id="backgroundType">
                                        <option value="image" {{ $settings->background_type == 'image' ? 'selected' : '' }}>Şəkil</option>
                                        <option value="color" {{ $settings->background_type == 'color' ? 'selected' : '' }}>Rəng</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Yan menyu eni</label>
                                    <select class="form-select" name="sidebar_width">
                                        <option value="default" {{ $settings->sidebar_width == 'default' ? 'selected' : '' }}>Standart</option>
                                        <option value="compact" {{ $settings->sidebar_width == 'compact' ? 'selected' : '' }}>Komakt</option>
                                        <option value="wide" {{ $settings->sidebar_width == 'wide' ? 'selected' : '' }}>Geniş</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="dark_mode" 
                                               id="darkModeSwitch" {{ $settings->dark_mode ? 'checked' : '' }}>
                                        <label class="form-check-label" for="darkModeSwitch">Qaranlıq tema</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Fon Parametrləri -->
                    <div class="card mt-4">
                        <div class="card-header bg-info text-white">
                            <h5 class="card-title mb-0">Fon Parametrləri</h5>
                        </div>
                        <div class="card-body">
                            <div id="imageSection" style="{{ $settings->background_type == 'color' ? 'display:none;' : '' }}">
                                <div class="mb-4">
                                   
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Xüsusi fon yüklə</label>
                                    <input type="file" class="form-control" name="background_image">
                                    <small class="form-text text-muted">Maksimum fayl ölçüsü: 2MB</small>
                                    
                                    @if($settings->background_image)
                                    <div class="mt-2">
                                        <img src="{{ asset($settings->background_image) }}" class="img-thumbnail" style="max-width: 200px;">
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div id="colorSection" style="{{ $settings->background_type == 'image' ? 'display:none;' : '' }}">
                                <label class="form-label">Fon rəngi</label>
                                <input type="color" class="form-control form-control-color" name="background_color" 
                                       value="{{ $settings->background_color }}" title="Rəng seçin">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rəng Parametrləri -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h5 class="card-title mb-0">Rəng Parametrləri</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Başlıq rəngi</label>
                                <input type="color" class="form-control form-control-color" name="header_color" 
                                       value="{{ $settings->header_color }}">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Altlıq fon rəngi</label>
                                <input type="color" class="form-control form-control-color" name="footer_bg_color" 
                                       value="{{ $settings->footer_bg_color }}">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Altlıq mətn rəngi</label>
                                <input type="color" class="form-control form-control-color" name="footer_text_color" 
                                       value="{{ $settings->footer_text_color }}">
                            </div>
                        </div>
                    </div>

                    <!-- Altlıq mətni -->
                    <div class="card mt-4">
                        <div class="card-header bg-warning text-dark">
                            <h5 class="card-title mb-0">Altlıq mətni</h5>
                        </div>
                        <div class="card-body">
                            <textarea class="form-control" name="footer_text" rows="5" 
                                      placeholder="Altlıq mətninizi bura yazın...">{{ $settings->footer_text }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Saxla düyməsi -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary w-lg">
                            <i class="ri-save-line align-middle me-1"></i> 
                            Parametrləri saxla
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const backgroundType = document.getElementById('backgroundType');
    const imageSection = document.getElementById('imageSection');
    const colorSection = document.getElementById('colorSection');

    function toggleSections() {
        if(backgroundType.value === 'image') {
            imageSection.style.display = 'block';
            colorSection.style.display = 'none';
        } else {
            imageSection.style.display = 'none';
            colorSection.style.display = 'block';
        }
    }

    backgroundType.addEventListener('change', toggleSections);
    toggleSections(); // İlkin yoxlama
});
</script>

@endsection