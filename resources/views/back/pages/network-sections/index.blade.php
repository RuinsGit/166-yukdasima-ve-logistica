@extends('back.layouts.master')

@section('title', 'Şəbəkə Bölmələri')

@section('content')
    <div class="row" style="margin-top: 100px">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Şəbəkə Bölmələri</h4>
                        <a href="{{ route('back.pages.network-sections.create') }}" class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i> Əlavə Et
                        </a>
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
                                    <th>Qitə</th>
                                    <th>Ölkə adı (AZ)</th>
                                    <th>Ölkə adı (EN)</th>
                                    <th>Ölkə adı (RU)</th>
                                    <th>Status</th>
                                    <th style="width: 10%">Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($networkSections as $networkSection)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $networkSection->continent ? $networkSection->continent->name_az : 'Qitə təyin edilməyib' }}
                                        </td>
                                        <td>{{ $networkSection->ulke_adi_az }}</td>
                                        <td>{{ $networkSection->ulke_adi_en }}</td>
                                        <td>{{ $networkSection->ulke_adi_ru }}</td>
                                        <td>
                                            <button class="btn btn-sm {{ $networkSection->status ? 'btn-success' : 'btn-danger' }}"
                                                onclick="window.location='{{ route('back.pages.network-sections.toggle-status', $networkSection->id) }}'">
                                                {{ $networkSection->status ? 'Aktiv' : 'Deaktiv' }}
                                            </button>
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('back.pages.network-sections.edit', $networkSection->id) }}" 
                                               class="btn btn-warning btn-sm mr-1">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('back.pages.network-sections.destroy', $networkSection->id) }}" 
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