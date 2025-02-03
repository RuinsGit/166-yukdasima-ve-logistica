@extends('back.layouts.master')
@section('title', 'Yeni Kart Əlavə Et')

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

                        <form action="{{ route('back.pages.home-cart-twos.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <div class="tab-pane fade show active" id="azTab">
                                        <div class="mb-3">
                                            <label>Mətn (AZ)</label>
                                            <textarea class="form-control" name="text_az" rows="4" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>ALT Mətni (AZ)</label>
                                            <input type="text" class="form-control" name="alt_az" required>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="enTab">
                                        <div class="mb-3">
                                            <label>Text (EN)</label>
                                            <textarea class="form-control" name="text_en" rows="4" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>ALT Text (EN)</label>
                                            <input type="text" class="form-control" name="alt_en" required>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="ruTab">
                                        <div class="mb-3">
                                            <label>Текст (RU)</label>
                                            <textarea class="form-control" name="text_ru" rows="4" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>ALT Текст (RU)</label>
                                            <input type="text" class="form-control" name="alt_ru" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Şəkil Seçin</label>
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