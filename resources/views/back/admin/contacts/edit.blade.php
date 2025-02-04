@extends('back.layouts.master')
@section('title', 'Contact Redaktə')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">Contact Məzmununu Redaktə Et</h4>
                            <a href="{{ route('back.pages.contacts.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Siyahıya Qayıt
                            </a>
                        </div>

                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>Xəta: Zəhmət olmasa bütün tələb olunan sahələri doldurun
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <form action="{{ route('back.pages.contacts.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <!-- Adres Bölümü -->
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>Ünvan Məlumatları</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">

                                                <label>Ünvan (AZ)</label>
                                                <input type="text" class="form-control" name="address_az" value="{{ $contact->address_az }}" required>
                                            </div>

                                            <div class="mb-3">
                                                <label>Ünvan (EN)</label>
                                                <input type="text" class="form-control" name="address_en" value="{{ $contact->address_en }}" required>
                                            </div>

                                            <div class="mb-3">
                                                <label>Ünvan (RU)</label>
                                                <input type="text" class="form-control" name="address_ru" value="{{ $contact->address_ru }}" required>
                                            </div>

                                            <div class="mb-3">
                                                <label>Ünvan Şəkli</label>
                                                <input type="file" class="form-control" name="address_image">
                                                @if($contact->address_image)

                                                    <img src="{{ asset('storage/'.$contact->address_image) }}" class="img-thumbnail mt-2"
                                                     style="width: 150px; height: 100px; object-fit: cover; border-radius: 10px;">
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Mail Bölümü -->
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header bg-info text-white">
                                            <h5>Mail Məlumatları</h5>
                                        </div>
                                        <div class="card-body">

                                            <div class="mb-3">
                                                <label>Mail Adresi</label>
                                                <input type="email" class="form-control" name="mail" value="{{ $contact->mail }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Mail Şəkli</label>
                                                <input type="file" class="form-control" name="mail_image">
                                                @if($contact->mail_image)
                                                    <img src="{{ asset('storage/'.$contact->mail_image) }}" class="img-thumbnail mt-2"
                                                    style="width: 150px; height: 100px; object-fit: cover; border-radius: 10px;">
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Nömrə Bölümü -->
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header bg-success text-white">
                                            <h5>Telefon Məlumatları</h5>
                                        </div>
                                        <div class="card-body">

                                            <div class="mb-3">
                                                <label>Telefon Nömrəsi</label>
                                                <input type="text" class="form-control" name="number" value="{{ $contact->number }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Nömrə Şəkli</label>
                                                <input type="file" class="form-control" name="number_image">
                                                @if($contact->number_image)
                                                    <img src="{{ asset('storage/'.$contact->number_image) }}" class="img-thumbnail mt-2"
                                                    style="width: 150px; height: 100px; object-fit: cover; border-radius: 10px;">
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Yadda Saxla</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 