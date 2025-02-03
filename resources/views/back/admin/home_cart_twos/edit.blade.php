@extends('back.layouts.master')
@section('title', 'Kartı Redaktə Et')

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

                        <form action="{{ route('back.pages.home-cart-twos.update', $homeCartTwo->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label>Mövcud Şəkil</label><br>
                                <img src="{{ asset('storage/'.$homeCartTwo->image_path) }}" 
                                     class="img-thumbnail" 
                                     style="width: 200px; height: 150px;">
                            </div>

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
                                    <div class="tab-pane fade show active" id="azTab">
                                        <div class="mb-3">
                                            <label>Mətn (AZ)</label>
                                            <textarea class="form-control" name="text_az" rows="4" required>{{ $homeCartTwo->text_az }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>ALT Mətni (AZ)</label>
                                            <input type="text" class="form-control" name="alt_az" value="{{ $homeCartTwo->alt_az }}" required>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="enTab">
                                        <div class="mb-3">
                                            <label>Text (EN)</label>
                                            <textarea class="form-control" name="text_en" rows="4" required>{{ $homeCartTwo->text_en }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>ALT Text (EN)</label>
                                            <input type="text" class="form-control" name="alt_en" value="{{ $homeCartTwo->alt_en }}" required>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="ruTab">
                                        <div class="mb-3">
                                            <label>Текст (RU)</label>
                                            <textarea class="form-control" name="text_ru" rows="4" required>{{ $homeCartTwo->text_ru }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>ALT Текст (RU)</label>
                                            <input type="text" class="form-control" name="alt_ru" value="{{ $homeCartTwo->alt_ru }}" required>
                                        </div>
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