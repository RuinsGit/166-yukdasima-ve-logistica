@extends('back.layouts.master')

@section('title', 'Qitələr')

@section('content')
    <div class="row" style="margin-top: 100px">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Qitələr</h4>
                        <a href="{{ route('back.pages.continents.create') }}" class="btn btn-primary btn-round ml-auto">
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
                                    <th>Ad (AZ)</th>
                                    <th>Ad (EN)</th>
                                    <th>Ad (RU)</th>
                                    <th>Status</th>
                                    <th style="width: 10%">Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($continents as $continent)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $continent->name_az }}</td>
                                        <td>{{ $continent->name_en }}</td>
                                        <td>{{ $continent->name_ru }}</td>
                                        <td>
                                            <button class="btn btn-sm {{ $continent->status ? 'btn-success' : 'btn-danger' }}"
                                                onclick="window.location='{{ route('back.pages.continents.toggle-status', $continent->id) }}'">
                                                {{ $continent->status ? 'Aktiv' : 'Deaktiv' }}
                                            </button>
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('back.pages.continents.edit', $continent->id) }}" 
                                               class="btn btn-warning btn-sm mr-1">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('back.pages.continents.destroy', $continent->id) }}" 
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