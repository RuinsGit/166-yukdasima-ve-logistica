@extends('back.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Network Hero</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Ana Səhifə</a></li>
                                <li class="breadcrumb-item active">Network Hero</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Network Hero Məlumatlarını Redaktə Et</h4>

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('back.pages.network-hero.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <!-- Mevcut Resim -->
                                    @if($networkHero && $networkHero->image_path)
                                        <div class="col-md-12 mb-3">
                                            <div class="current-image">
                                                <img src="{{ asset('storage/' . $networkHero->image_path) }}" alt="Mevcut Resim" class="img-thumbnail" style="max-height: 200px">
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Resim Yükleme -->
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Hero Şəkli</label>
                                            <input type="file" class="form-control" name="image" accept=".png,.jpg,.jpeg,.gif,.svg,.webp">
                                            @if($networkHero && $networkHero->image_path)
                                                <small class="form-text text-muted">Yeni bir şəkil yükləyəniz, əvvəlki şəkil silinəcək.</small>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Alt Metinleri -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Alt Mətn (AZ)</label>
                                            <input type="text" class="form-control" name="alt_az" value="{{ $networkHero->alt_az ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Alt Mətn (EN)</label>
                                            <input type="text" class="form-control" name="alt_en" value="{{ $networkHero->alt_en ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Alt Mətn (RU)</label>
                                            <input type="text" class="form-control" name="alt_ru" value="{{ $networkHero->alt_ru ?? '' }}">
                                        </div>
                                    </div>

                                    <!-- Durum -->
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="statusSwitch" 
                                                    {{ ($networkHero && $networkHero->status) ? 'checked' : '' }}
                                                    onclick="window.location.href='{{ route('back.pages.network-hero.toggle-status') }}'">
                                                <label class="form-check-label" for="statusSwitch">Aktiv/Deaktiv</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Yadda Saxla</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 