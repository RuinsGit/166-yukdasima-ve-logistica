@extends('back.layouts.master')

@section('title', 'Şəbəkə Bölməsi Redaktə Et')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Şəbəkə Bölməsi Redaktə</h4>
                            <a href="{{ route('back.pages.network-sections.index') }}" class="btn btn-primary btn-round">
                                <i class="fa fa-arrow-left"></i> Geri
                            </a>
                        </div>
                    </div>
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

                        <form action="{{ route('back.pages.network-sections.update', $networkSection->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label>Qitə Seçin</label>
                                <select name="continent_id" class="form-control" required>
                                    <option value="">Qitə seçin</option>
                                    @foreach($continents as $continent)
                                        <option value="{{ $continent->id }}" {{ $networkSection->continent_id == $continent->id ? 'selected' : '' }}>
                                            {{ $continent->name_az }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#nameAz">AZ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#nameEn">EN</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#nameRu">RU</a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-3">
                                    <div class="tab-pane fade show active" id="nameAz">
                                       
                                        
                                        <label class="mt-3">Ölkə adı (AZ)</label>
                                        <input type="text" class="form-control" name="ulke_adi_az" value="{{ $networkSection->ulke_adi_az }}" required>
                                    </div>
                                    <div class="tab-pane fade" id="nameEn">
                                      
                                        <label class="mt-3">Ölkə adı (EN)</label>
                                        <input type="text" class="form-control" name="ulke_adi_en" value="{{ $networkSection->ulke_adi_en }}" required>
                                    </div>
                                    <div class="tab-pane fade" id="nameRu">
                                       
                                        
                                        <label class="mt-3">Ölkə adı (RU)</label>
                                        <input type="text" class="form-control" name="ulke_adi_ru" value="{{ $networkSection->ulke_adi_ru }}" required>
                                    </div>
                                </div>
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