@extends('back.layouts.master')

@section('title', 'Əlaqə Şəkilləri')

@section('content')
    <div class="row" style="margin-top: 100px">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Əlaqə Şəkilləri</h4>
                        @if($canCreate)
                            <a href="{{ route('back.pages.contact-photos.create') }}" class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-plus"></i> Əlavə Et
                            </a>
                        @else
                            <button class="btn btn-secondary btn-round ml-auto" disabled title="Maksimum 1 şəkil əlavə edilə bilər">
                                <i class="fa fa-plus"></i> Əlavə Et
                            </button>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Şəkil</th>
                                    <th>Başlıq (AZ)</th>
                                    <th>Başlıq (EN)</th>
                                    <th>Başlıq (RU)</th>
                                    <th>Alt Text</th>
                                    <th>Status</th>
                                    <th style="width: 10%">Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contactPhotos as $photo)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($photo->image_path)
                                                <img src="{{ asset('storage/' . $photo->image_path) }}" 
                                                     alt="{{ $photo->image_alt }}"
                                                     style="max-width: 100px;">
                                            @endif
                                        </td>
                                        <td>{{ $photo->title_az }}</td>
                                        <td>{{ $photo->title_en }}</td>
                                        <td>{{ $photo->title_ru }}</td>
                                        <td>{{ $photo->image_alt }}</td>
                                        <td>
                                            <button class="btn btn-sm {{ $photo->status ? 'btn-success' : 'btn-danger' }}"
                                                onclick="window.location='{{ route('back.pages.contact-photos.toggle-status', $photo->id) }}'">
                                                {{ $photo->status ? 'Aktiv' : 'Deaktiv' }}
                                            </button>
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('back.pages.contact-photos.edit', $photo->id) }}" 
                                               class="btn btn-warning btn-sm mr-1">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('back.pages.contact-photos.destroy', $photo->id) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('Silmək istədiyinizə əminsiniz?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 