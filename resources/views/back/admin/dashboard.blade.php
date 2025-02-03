@extends('back.layouts.master')



@section('content')


<div class="page-content">



    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>
                </div>
            </div>
        </div>

        <!-- Blog Statistik Kartları -->
        <div class="row">
            <!-- Blog Növləri -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-medium text-muted mb-0">Blog Növləri</p>
                                <h2 class="mt-4 ff-secondary fw-semibold">
                                    {{ $statistics['total_blog_types'] }}
                                </h2>
                                <p class="mb-0 text-muted">
                                    <span class="badge bg-success">
                                        {{ $statistics['active_blog_types'] }} Aktiv
                                    </span>
                                </p>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                    <i class="ri-folder-line"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ümumi Bloglar -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-medium text-muted mb-0">Ümumi Bloglar</p>
                                <h2 class="mt-4 ff-secondary fw-semibold">
                                    {{ $statistics['total_blogs'] }}
                                </h2>
                                <p class="mb-0 text-muted">
                                    <span class="badge bg-success">
                                        {{ $statistics['active_blogs'] }} Aktiv
                                    </span>
                                </p>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-primary rounded-circle fs-2">
                                    <i class="ri-article-line"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ümumi Xidmətlər -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-medium text-muted mb-0">Ümumi Xidmətlər</p>
                                <h2 class="mt-4 ff-secondary fw-semibold">
                                    {{ $statistics['total_services'] }}
                                </h2>
                                <p class="mb-0 text-muted">
                                    <span class="badge bg-success">
                                        {{ $statistics['active_services'] }} Aktiv
                                    </span>
                                </p>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-warning rounded-circle fs-2">
                                    <i class="ri-service-line"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Son Əlavələr -->
        <div class="row mt-4">
            <!-- Son Blog Növləri -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Son Blog Növləri</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Ad</th>
                                        <th>Blog Sayı</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($statistics['latest_blog_types'] as $type)
                                    <tr>
                                        <td>{{ $type->name_az }}</td>
                                        <td>{{ $type->blogs_count }}</td>
                                        <td>
                                            <span class="badge bg-{{ $type->status ? 'success' : 'danger' }}">
                                                {{ $type->status ? 'Aktiv' : 'Deaktiv' }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Son Bloglar -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Son Bloglar</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Başlıq</th>
                                        <th>Kateqoriya</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($statistics['latest_blogs'] as $blog)
                                    <tr>
                                        <td>{{ $blog->name_az }}</td>
                                        <td>{{ $blog->type->name_az }}</td>
                                        <td>
                                            <span class="badge bg-{{ $blog->status ? 'success' : 'danger' }}">
                                                {{ $blog->status ? 'Aktiv' : 'Deaktiv' }}
                                            </span>
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

        <!-- Son Eklenenler Bölümüne Eklenecek Kısım -->
        <div class="row mt-4">
            <div class="col-xl-6">
                <!-- Son Servisler Tablosu -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Son Xidmətlər</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Ad</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($statistics['latest_services'] as $service)
                                    <tr>
                                        <td>{{ $service->name_az }}</td>
                                        <td>
                                            <span class="badge bg-{{ $service->status ? 'success' : 'danger' }}">
                                                {{ $service->status ? 'Aktiv' : 'Deaktiv' }}
                                            </span>
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
    </div>
</div>
@endsection
    