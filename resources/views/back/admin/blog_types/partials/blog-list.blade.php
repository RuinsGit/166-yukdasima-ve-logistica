<div class="table-responsive">
    <table class="table table-bordered dt-responsive nowrap">
        <thead>
            <tr>
                <th>Şəkil</th>
                <th>Başlıq</th>
                <th>Yaranma tarixi</th>
                <th>Status</th>
                <th>Əməliyyatlar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>
                    <img src="{{ asset('storage/'.$blog->image_path) }}" 
                         class="img-thumbnail" style="width: 100px">
                </td>
                <td>{{ $blog->name_az }}</td>
                <td>{{ $blog->created_at->format('d.m.Y') }}</td>
                <td>
                    <span class="badge bg-{{ $blog->status ? 'success' : 'danger' }}">
                        {{ $blog->status ? 'Aktiv' : 'Deaktiv' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('back.pages.blogs.edit', $blog->id) }}" 
                       class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="d-flex justify-content-center">
        {{ $blogs->links() }}
    </div>
</div> 