@extends('back.layouts.master')

@section('title', 'Yeni Şəbəkə Bölməsi')

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

                        <form action="{{ route('back.pages.network-sections.store') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label>Qitə Seçin</label>
                                <select name="continent_id" class="form-control" required>
                                    <option value="">Qitə seçin</option>
                                    @foreach($continents as $continent)
                                        <option value="{{ $continent->id }}">{{ $continent->name_az }}</option>
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
                                        <label>Ölkə adı (AZ)</label>
                                        <input type="text" class="form-control" name="ulke_adi_az" required>
                                    </div>
                                    <div class="tab-pane fade" id="nameEn">
                                        <label>Ölkə adı (EN)</label>
                                        <input type="text" class="form-control" name="ulke_adi_en" required>
                                    </div>
                                    <div class="tab-pane fade" id="nameRu">
                                        <label>Ölkə adı (RU)</label>
                                        <input type="text" class="form-control" name="ulke_adi_ru" required>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Yadda Saxla</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 