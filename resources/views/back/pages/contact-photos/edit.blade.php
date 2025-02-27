@extends('back.layouts.master')
@section('title', 'Əlaqə Şəkili Redaktə Et')

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

                        <form action="{{ route('back.pages.contact-photos.update', $contactPhoto->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label>Mövcud Şəkil</label>
                                @if($contactPhoto->image_path)
                                    <div>
                                        <img src="{{ asset('storage/' . $contactPhoto->image_path) }}" 
                                             alt="{{ $contactPhoto->image_alt }}"
                                             style="max-width: 200px;">
                                    </div>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label>Yeni Şəkil (Dəyişdirmək istəmirsinizsə boş buraxın)</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="mb-4">
                                <label>Şəkil Alt Text</label>
                                <input type="text" class="form-control" name="image_alt" value="{{ $contactPhoto->image_alt }}">
                            </div>

                            <div class="mb-4">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#titleAz">AZ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#titleEn">EN</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#titleRu">RU</a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-3">
                                    <div class="tab-pane fade show active" id="titleAz">
                                        <label>Başlıq (AZ)</label>
                                        <input type="text" class="form-control" name="title_az" value="{{ $contactPhoto->title_az }}" required>
                                    </div>
                                    <div class="tab-pane fade" id="titleEn">
                                        <label>Başlıq (EN)</label>
                                        <input type="text" class="form-control" name="title_en" value="{{ $contactPhoto->title_en }}" required>
                                    </div>
                                    <div class="tab-pane fade" id="titleRu">
                                        <label>Başlıq (RU)</label>
                                        <input type="text" class="form-control" name="title_ru" value="{{ $contactPhoto->title_ru }}" required>
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