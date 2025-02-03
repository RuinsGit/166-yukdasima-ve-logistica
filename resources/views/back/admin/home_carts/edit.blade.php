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
                        <form action="{{ route('back.pages.home-carts.update', $homeCart->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label>Mövcud Şəkil</label><br>
                                <img src="{{ asset('storage/'.$homeCart->image_path) }}" 
                                     class="img-thumbnail" 
                                     style="width: 200px; height: 150px;">
                            </div>

                            <div class="mb-3">
                                <label>Yeni Şəkil Seçin (Dəyişdirmək istəmirsinizsə boş buraxın)</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="mb-3">
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
                                        <label>ALT Mətni (Azərbaycanca)</label>
                                        <textarea class="form-control" name="alt_az" rows="3" required>{{ $homeCart->alt_az }}</textarea>
                                    </div>
                                    <div class="tab-pane fade" id="altEn">
                                        <label>ALT Mətni (İngiliscə)</label>
                                        <textarea class="form-control" name="alt_en" rows="3" required>{{ $homeCart->alt_en }}</textarea>
                                    </div>
                                    <div class="tab-pane fade" id="altRu">
                                        <label>ALT Mətni (Rusca)</label>
                                        <textarea class="form-control" name="alt_ru" rows="3" required>{{ $homeCart->alt_ru }}</textarea>
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