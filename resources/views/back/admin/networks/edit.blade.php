@extends('back.layouts.master')
@section('title', 'Şəbəkəni Redaktə Et')

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

                        <form action="{{ route('back.pages.networks.update', $network->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @if($network->image_path)
                            <div class="mb-3">
                                <label>Mövcud Logo</label><br>
                                <img src="{{ asset('storage/'.$network->image_path) }}" 
                                     class="img-thumbnail" 
                                     style="width: 150px; height: 100px;">
                            </div>
                            @endif

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
                                        <label>Ad (Azərbaycanca)</label>
                                        <input type="text" class="form-control" name="name_az" value="{{ $network->name_az }}" readonly required>
                                        
                                        <label class="mt-3">Ünvan (AZ)</label>
                                        <textarea class="form-control" name="address_az" rows="3">{{ $network->address_az }}</textarea>
                                    </div>
                                    <div class="tab-pane fade" id="nameEn">
                                        <label>Name (English)</label>
                                        <input type="text" class="form-control" name="name_en" value="{{ $network->name_en }}" readonly required>
                                        
                                        <label class="mt-3">Address (EN)</label>
                                        <textarea class="form-control" name="address_en" rows="3">{{ $network->address_en }}</textarea>
                                    </div>
                                    <div class="tab-pane fade" id="nameRu">
                                        <label>Название (Русский)</label>
                                        <input type="text" class="form-control" name="name_ru" value="{{ $network->name_ru }}" readonly required>
                                        
                                        <label class="mt-3">Адрес (RU)</label>
                                        <textarea class="form-control" name="address_ru" rows="3">{{ $network->address_ru }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Ölkə Kodu</label>
                                <input type="text" class="form-control" name="country_code" 
                                       value="{{ old('country_code', $network->country_code) }}" 
                                       required maxlength="3" readonly>
                            </div>

                            <div class="mb-3">
                                <label>Yeni Logo Seçin (Dəyişdirmək istəmirsinizsə boş buraxın)</label>
                                <input type="file" class="form-control" name="image">
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