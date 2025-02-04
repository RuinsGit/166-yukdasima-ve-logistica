@extends('back.layouts.master')
@section('title', 'Contact Ayarları')

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
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Contact Tənzimləməsi</h4>
                    <div class="page-title-right">
                        @if($contacts->isEmpty())

                            <a href="{{ route('back.pages.contacts.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Yeni Contact Əlavə Et
                            </a>
                        @else

                            <button class="btn btn-secondary" disabled>
                                <i class="fas fa-ban"></i> Maksimum sayda contact var
                            </button>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "{{ session('success') }}",
                        showConfirmButton: true,
                        confirmButtonText: 'Tamam',
                        timer: 1500
                    });
                });
            </script>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Ünvan (AZ)</th>
                                    <th>Mail</th>
                                    <th>Telefon</th>
                                    <th>Status</th>
                                    <th>Əməliyyatlar</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr>
                                <td>
                                        <img src="{{ asset('storage/'.$contact->address_image) }}" 
                                             class="img-thumbnail" 
                                             style="width: 150px; height: 100px; object-fit: cover; border-radius: 10px;">
                                             {{ $contact->address_az }}

                                    </td>
                                    
                                    <td>

                                        <img src="{{ asset('storage/'.$contact->mail_image) }}" 
                                             class="img-thumbnail" 
                                             style="width: 150px; height: 100px; object-fit: cover; border-radius: 10px;">
                                             {{ $contact->mail }}
                                    </td>
                                    
                                    <td>
                                        <img src="{{ asset('storage/'.$contact->number_image) }}" 
                                             class="img-thumbnail" 
                                             style="width: 150px; height: 100px; object-fit: cover; border-radius: 10px;">
                                             {{ $contact->number }}
                                    </td>
                                    <td>


                                        <form action="{{ route('back.pages.contacts.toggle-status', $contact->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-{{ $contact->status ? 'success' : 'danger' }}">
                                                {{ $contact->status ? 'Aktiv' : 'Deaktiv' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('back.pages.contacts.edit', $contact->id) }}" 
                                           class="btn btn-warning btn-sm" style="background-color: #5bf91b; border-color: green; color: white;">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" 


                                                class="btn btn-danger btn-sm" 
                                                onclick="deleteData({{ $contact->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{ $contact->id }}" 
                                              action="{{ route('back.pages.contacts.destroy', $contact->id) }}" 
                                              method="POST" 
                                              class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center mt-4">
                            {{ $contacts->links('pagination::bootstrap-5') }}
                        </div>
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
</script>
@endsection 