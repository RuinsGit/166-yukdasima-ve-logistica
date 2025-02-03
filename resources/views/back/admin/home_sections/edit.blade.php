@extends('back.layouts.master')
@section('title', 'Bölməni Redaktə Et')

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

                        <form action="{{ route('back.pages.home-sections.update', $homeSection->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Mövcud şəkil -->
                            <div class="mb-3">
                                <label>Mövcud Şəkil</label><br>
                                <img src="{{ asset('storage/'.$homeSection->image_path) }}" 
                                     class="img-thumbnail" 
                                     style="width: 200px; height: 150px;">
                            </div>

                            <!-- Ad sahəsi -->
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
                                    <!-- AZERBAYCAN CONTENT -->
                                    <div class="tab-pane fade show active" id="azTab">
                                        <div class="mb-3">
                                            <label>Ad (AZ)</label>
                                            <input type="text" class="form-control" name="name_az" value="{{ $homeSection->name_az }}" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label>Birinci Mətn (AZ)</label>
                                            <textarea class="form-control" name="text_one_az" rows="3" required>{{ $homeSection->text_one_az }}</textarea>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label>İkinci Mətn (AZ)</label>
                                            <textarea class="form-control" name="text_two_az" rows="3" required>{{ $homeSection->text_two_az }}</textarea>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label>ALT Mətni (AZ)</label>
                                            <input type="text" class="form-control" name="alt_az" value="{{ $homeSection->alt_az }}" required>
                                        </div>
                                    </div>

                                    <!-- ENGLISH CONTENT -->
                                    <div class="tab-pane fade" id="enTab">
                                        <div class="mb-3">
                                            <label>Name (EN)</label>
                                            <input type="text" class="form-control" name="name_en" value="{{ $homeSection->name_en }}" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label>First Text (EN)</label>
                                            <textarea class="form-control" name="text_one_en" rows="3" required>{{ $homeSection->text_one_en }}</textarea>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label>Second Text (EN)</label>
                                            <textarea class="form-control" name="text_two_en" rows="3" required>{{ $homeSection->text_two_en }}</textarea>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label>ALT Text (EN)</label>
                                            <input type="text" class="form-control" name="alt_en" value="{{ $homeSection->alt_en }}" required>
                                        </div>
                                    </div>

                                    <!-- RUSSIAN CONTENT -->
                                    <div class="tab-pane fade" id="ruTab">
                                        <div class="mb-3">
                                            <label>Название (RU)</label>
                                            <input type="text" class="form-control" name="name_ru" value="{{ $homeSection->name_ru }}" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label>Первый текст (RU)</label>
                                            <textarea class="form-control" name="text_one_ru" rows="3" required>{{ $homeSection->text_one_ru }}</textarea>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label>Второй текст (RU)</label>
                                            <textarea class="form-control" name="text_two_ru" rows="3" required>{{ $homeSection->text_two_ru }}</textarea>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label>ALT Текст (RU)</label>
                                            <input type="text" class="form-control" name="alt_ru" value="{{ $homeSection->alt_ru }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Rəqəmsal dəyərlər -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Birinci Rəqəm</label>
                                    <input type="number" class="form-control" name="number_one" value="{{ $homeSection->number_one }}" min="0" required>
                                </div>
                                <div class="col-md-6">
                                    <label>İkinci Rəqəm</label>
                                    <input type="number" class="form-control" name="number_two" value="{{ $homeSection->number_two }}" min="0" required>
                                </div>
                            </div>

                            <!-- Yeni şəkil seçimi -->
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