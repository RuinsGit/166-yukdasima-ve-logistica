@extends('back.layouts.master')
@section('title', 'Haqqımızda Səhifənsini Redaktə Et')


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

                        <form action="{{ route('back.pages.about-pages.update', $aboutPage->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label>Mövcud Şəkil</label><br>
                                <img src="{{ asset('storage/'.$aboutPage->image_path) }}" 
                                     class="img-thumbnail" 
                                     style="width: 150px; height: 100px; object-fit: cover; border-radius: 10px;">
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
                                    <!-- AZ Tab -->
                                    <div class="tab-pane fade show active" id="azTab">
                                        <div class="mb-3">
                                            <label>Ad (Azərbaycanca)</label>
                                            <input type="text" class="form-control" name="name_az" 
                                                   value="{{ old('name_az', $aboutPage->name_az) }}" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label>Əsas Mətn</label>
                                            <textarea class="form-control" name="text_az" rows="5" required>{{ old('text_az', $aboutPage->text_az) }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label>Təsvir</label>
                                            <textarea class="form-control" name="description_az" rows="3" required>{{ old('description_az', $aboutPage->description_az) }}</textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Xidmət mətni</label>
                                                    <input type="text" class="form-control" name="services_text_az" 
                                                           value="{{ old('services_text_az', $aboutPage->services_text_az) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Müştəri mətni</label>
                                                    <input type="text" class="form-control" name="customer_text_az" 
                                                           value="{{ old('customer_text_az', $aboutPage->customer_text_az) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Razı mətni</label>
                                                    <input type="text" class="form-control" name="satisfied_text_az" 
                                                           value="{{ old('satisfied_text_az', $aboutPage->satisfied_text_az) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Daşınma mətni</label>
                                                    <input type="text" class="form-control" name="transportation_text_az" 
                                                           value="{{ old('transportation_text_az', $aboutPage->transportation_text_az) }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- EN Tab -->
                                    <div class="tab-pane fade" id="enTab">
                                        <div class="mb-3">
                                            <label>Name (English)</label>
                                            <input type="text" class="form-control" name="name_en" 
                                                   value="{{ old('name_en', $aboutPage->name_en) }}" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label>Main Text</label>
                                            <textarea class="form-control" name="text_en" rows="5" required>{{ old('text_en', $aboutPage->text_en) }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description_en" rows="3" required>{{ old('description_en', $aboutPage->description_en) }}</textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Services Text</label>
                                                    <input type="text" class="form-control" name="services_text_en" 
                                                           value="{{ old('services_text_en', $aboutPage->services_text_en) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Customer Text</label>
                                                    <input type="text" class="form-control" name="customer_text_en" 
                                                           value="{{ old('customer_text_en', $aboutPage->customer_text_en) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Satisfied Text</label>
                                                    <input type="text" class="form-control" name="satisfied_text_en" 
                                                           value="{{ old('satisfied_text_en', $aboutPage->satisfied_text_en) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Transportation Text</label>
                                                    <input type="text" class="form-control" name="transportation_text_en" 
                                                           value="{{ old('transportation_text_en', $aboutPage->transportation_text_en) }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- RU Tab -->
                                    <div class="tab-pane fade" id="ruTab">
                                        <div class="mb-3">
                                            <label>Название (Русский)</label>
                                            <input type="text" class="form-control" name="name_ru" 
                                                   value="{{ old('name_ru', $aboutPage->name_ru) }}" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label>Основной текст</label>
                                            <textarea class="form-control" name="text_ru" rows="5" required>{{ old('text_ru', $aboutPage->text_ru) }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label>Описание</label>
                                            <textarea class="form-control" name="description_ru" rows="3" required>{{ old('description_ru', $aboutPage->description_ru) }}</textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Текст услуг</label>
                                                    <input type="text" class="form-control" name="services_text_ru" 
                                                           value="{{ old('services_text_ru', $aboutPage->services_text_ru) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Текст клиентов</label>
                                                    <input type="text" class="form-control" name="customer_text_ru" 
                                                           value="{{ old('customer_text_ru', $aboutPage->customer_text_ru) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Текст удовлетворения</label>
                                                    <input type="text" class="form-control" name="satisfied_text_ru" 
                                                           value="{{ old('satisfied_text_ru', $aboutPage->satisfied_text_ru) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Текст транспорта</label>
                                                    <input type="text" class="form-control" name="transportation_text_ru" 
                                                           value="{{ old('transportation_text_ru', $aboutPage->transportation_text_ru) }}" required>
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
                                    <input type="number" class="form-control" name="services_number" 
                                           value="{{ old('services_number', $aboutPage->services_number) }}" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Müştəri sayı</label>
                                    <input type="number" class="form-control" name="customer_number" 
                                           value="{{ old('customer_number', $aboutPage->customer_number) }}" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Razı sayı</label>
                                    <input type="number" class="form-control" name="satisfied_number" 
                                           value="{{ old('satisfied_number', $aboutPage->satisfied_number) }}" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Daşınma sayı</label>
                                    <input type="number" class="form-control" name="transportations_number" 
                                           value="{{ old('transportations_number', $aboutPage->transportations_number) }}" required>
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