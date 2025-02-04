@extends('back.layouts.master')
@section('title', 'Sorğu Detayı')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <a href="{{ route('back.pages.contact-requests.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Siyahıya Qayıt
                            </a>
                        </div>


                        <div class="card">
                            <div class="card-header  text-white" style="background-color: #5bf91b; border-color: green; color: white">
                                <h6>Sorğu Detalları</h6>
                            </div>
                            <div class="card-body">
                                <p><strong>Email:</strong> {{ $contactRequest->email }}</p>
                                <p><strong>Website:</strong> {{ $contactRequest->website ?? '-' }}</p>
                                <p><strong>Şərh:</strong></p>
                                <div class="border p-3 rounded">
                                    {{ $contactRequest->comment }}
                                </div>
                                <p class="mt-3"><strong>Tarix:</strong> {{ $contactRequest->created_at->format('d.m.Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 