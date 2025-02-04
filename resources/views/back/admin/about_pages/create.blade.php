@extends('back.layouts.master')
@section('title', 'Haqqımızda Səhifəsi Əlavə Et')



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

                        <form action="{{ route('back.pages.about-pages.store') }}" method="POST" enctype="multipart/form-data">
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
                                            <label>Ad (Azərbaycanca)</label>
                                            <input type="text" class="form-control" name="name_az" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label>Əsas Mətn</label>
                                            <textarea class="form-control" name="text_az" rows="5" required></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label>Təsvir</label>
                                            <textarea class="form-control" name="description_az" rows="3" required></textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Xidmət mətni</label>
                                                    <input type="text" class="form-control" name="services_text_az" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Müştəri mətni</label>
                                                    <input type="text" class="form-control" name="customer_text_az" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Razı mətni</label>
                                                    <input type="text" class="form-control" name="satisfied_text_az" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Daşınma mətni</label>
                                                    <input type="text" class="form-control" name="transportation_text_az" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- EN Tab -->
                                    <div class="tab-pane fade" id="enTab">
                                        <div class="mb-3">
                                            <label>Name (English)</label>
                                            <input type="text" class="form-control" name="name_en" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label>Main Text</label>
                                            <textarea class="form-control" name="text_en" rows="5" required></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description_en" rows="3" required></textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Services Text</label>
                                                    <input type="text" class="form-control" name="services_text_en" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Customer Text</label>
                                                    <input type="text" class="form-control" name="customer_text_en" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Satisfied Text</label>
                                                    <input type="text" class="form-control" name="satisfied_text_en" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Transportation Text</label>
                                                    <input type="text" class="form-control" name="transportation_text_en" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- RU Tab -->
                                    <div class="tab-pane fade" id="ruTab">
                                        <div class="mb-3">
                                            <label>Название (Русский)</label>
                                            <input type="text" class="form-control" name="name_ru" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label>Основной текст</label>
                                            <textarea class="form-control" name="text_ru" rows="5" required></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label>Описание</label>
                                            <textarea class="form-control" name="description_ru" rows="3" required></textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Текст услуг</label>
                                                    <input type="text" class="form-control" name="services_text_ru" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Текст клиентов</label>
                                                    <input type="text" class="form-control" name="customer_text_ru" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Текст удовлетворения</label>
                                                    <input type="text" class="form-control" name="satisfied_text_ru" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Текст транспорта</label>
                                                    <input type="text" class="form-control" name="transportation_text_ru" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sayısal Alanlar -->
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label>Xidmət sayı</label>
                                    <input type="number" class="form-control" name="services_number" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Müştəri sayı</label>
                                    <input type="number" class="form-control" name="customer_number" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Razı sayı</label>
                                    <input type="number" class="form-control" name="satisfied_number" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Daşınma sayı</label>
                                    <input type="number" class="form-control" name="transportations_number" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Şəkil</label>
                                <input type="file" class="form-control" name="image" required>
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