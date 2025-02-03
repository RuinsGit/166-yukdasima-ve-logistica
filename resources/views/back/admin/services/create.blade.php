@extends('back.layouts.master')
@section('title', 'Yeni Xidmət Əlavə Et')

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

                        <form action="{{ route('back.pages.services.store') }}" method="POST">
                            @csrf

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
                                    <!-- AZ Tab -->
                                    <div class="tab-pane fade show active" id="azTab">
                                        <div class="mb-3">
                                            <label>Ad (AZ)</label>
                                            <input type="text" class="form-control" name="name_az" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Qısa Mətn (AZ)</label>
                                            <textarea class="form-control" name="text_az" rows="3" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Ətraflı Açıqlama (AZ)</label>
                                            <textarea class="form-control" name="description_az" rows="5" required></textarea>
                                        </div>
                                    </div>

                                    <!-- EN Tab -->
                                    <div class="tab-pane fade" id="enTab">
                                        <div class="mb-3">
                                            <label>Name (EN)</label>
                                            <input type="text" class="form-control" name="name_en" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Short Text (EN)</label>
                                            <textarea class="form-control" name="text_en" rows="3" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Detailed Description (EN)</label>
                                            <textarea class="form-control" name="description_en" rows="5" required></textarea>
                                        </div>
                                    </div>

                                    <!-- RU Tab -->
                                    <div class="tab-pane fade" id="ruTab">
                                        <div class="mb-3">
                                            <label>Название (RU)</label>
                                            <input type="text" class="form-control" name="name_ru" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Краткий текст (RU)</label>
                                            <textarea class="form-control" name="text_ru" rows="3" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Подробное описание (RU)</label>
                                            <textarea class="form-control" name="description_ru" rows="5" required></textarea>
                                        </div>
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