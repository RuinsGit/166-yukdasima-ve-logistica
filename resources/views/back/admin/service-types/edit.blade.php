@extends('back.layouts.master')
@section('title', 'Xidmət Növünü Redaktə Et')

@section('content')
<style>
        .swal2-popup {
            border-radius: 50px;
        }
    </style>
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

                        <form action="{{ route('back.pages.services-types.update', $type->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

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
                                            <input type="text" class="form-control" name="name_az" value="{{ $type->name_az }}" required>
                                        </div>
                                    </div>

                                    <!-- EN Tab -->
                                    <div class="tab-pane fade" id="enTab">
                                        <div class="mb-3">
                                            <label>Name (EN)</label>
                                            <input type="text" class="form-control" name="name_en" value="{{ $type->name_en }}" required>
                                        </div>
                                    </div>

                                    <!-- RU Tab -->
                                    <div class="tab-pane fade" id="ruTab">
                                        <div class="mb-3">
                                            <label>Название (RU)</label>
                                            <input type="text" class="form-control" name="name_ru" value="{{ $type->name_ru }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Şəkil</label>
                                        @if($type->image)
                                            <img src="{{ asset('storage/'.$type->image) }}" class="d-block mb-2 img-thumbnail" 
                                            
                                            
                                                 style="width: 150px; height: 100px; object-fit: cover; border-radius: 10px;"
                                            >
                                        @endif
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Sıra Nömrəsi</label>
                                        <input type="number" class="form-control" name="number" value="{{ $type->number }}" required>
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