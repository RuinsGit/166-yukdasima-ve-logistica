@extends('back.layouts.master')
@section('title', 'Contact Sorğuları')
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <!-- <th>Status</th> -->
                                    <th>Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($requests as $request)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $request->email }}</td>
                                    <td>{{ $request->website ?? '-' }}</td>
                                    <!-- <td>
                                        <form action="{{ route('back.pages.contact-requests.toggle-status', $request->id) }}" 
                                              method="POST" id="status-form-{{ $request->id }}">
                                            @csrf
                                            <button type="button" onclick="toggleStatus({{ $request->id }})" 
                                                    class="btn btn-sm btn-{{ $request->status ? 'success' : 'danger' }}">
                                                {{ $request->status ? 'Oxunmayan' : 'Oxundu' }}
                                            </button>
                                        </form>
                                    </td> -->
                                    <td>
                                        <a href="{{ route('back.pages.contact-requests.show', $request->id) }}" 
                                           class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <form action="{{ route('back.pages.contact-requests.destroy', $request->id) }}" 
                                              method="POST" class="d-inline" id="delete-form-{{ $request->id }}">
                                            @csrf @method('DELETE')
                                            <button type="button" onclick="deleteData({{ $request->id }})" 
                                                    class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                      
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $requests->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function deleteData(id) {
    Swal.fire({
        title: 'Silmək istədiyinizdən əminsiniz?',
        text: "Bu əməliyyat geri alına bilməz!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Bəli, sil!',
        cancelButtonText: 'Ləğv et'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}

function toggleStatus(id) {
    Swal.fire({
        title: 'Statusu dəyişdirmək istədiyinizdən əminsiniz?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Bəli, dəyişdir!',
        cancelButtonText: 'Ləğv et'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('status-form-' + id).submit();
        }
    });
}
</script>
@endsection 