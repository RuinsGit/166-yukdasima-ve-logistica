@extends('back.layouts.master')
@section('title', 'Bayraqı Redaktə Et')

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

                        <form action="{{ route('back.pages.country-flags.update', $countryFlag->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label>Mövcud Şəkil</label><br>
                                <img src="{{ asset('storage/'.$countryFlag->image_path) }}" 
                                     class="img-thumbnail" 
                                     style="width: 150px; height: 100px;">
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
                                        <label>Ad (Azərbaycanca)</label>
                                        <input type="text" class="form-control" name="name_az" value="{{ $countryFlag->name_az }}" required>
                                        
                                        <label class="mt-3">ALT Mətni (AZ)</label>
                                        <input type="text" class="form-control" name="alt_az" value="{{ $countryFlag->alt_az }}" required>
                                    </div>
                                    <div class="tab-pane fade" id="nameEn">
                                        <label>Name (English)</label>
                                        <input type="text" class="form-control" name="name_en" value="{{ $countryFlag->name_en }}" required>
                                        
                                        <label class="mt-3">ALT Text (EN)</label>
                                        <input type="text" class="form-control" name="alt_en" value="{{ $countryFlag->alt_en }}" required>
                                    </div>
                                    <div class="tab-pane fade" id="nameRu">
                                        <label>Название (Русский)</label>
                                        <input type="text" class="form-control" name="name_ru" value="{{ $countryFlag->name_ru }}" required>
                                        
                                        <label class="mt-3">ALT Текст (RU)</label>
                                        <input type="text" class="form-control" name="alt_ru" value="{{ $countryFlag->alt_ru }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Yeni Şəkil Seçin (Dəyişdirmək istəmirsinizsə boş buraxın)</label>
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