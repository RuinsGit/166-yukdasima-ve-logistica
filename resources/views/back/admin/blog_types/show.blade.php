@extends('back.layouts.master')
@section('title', $type->name_az.' - Blog Yazıları')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">{{ $type->name_az }} kateqoriyasına aid bloglar</h4>
                    <a href="{{ route('back.pages.blog-types.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Geri
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @include('back.admin.blog_types.partials.blog-list', ['blogs' => $blogs])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 