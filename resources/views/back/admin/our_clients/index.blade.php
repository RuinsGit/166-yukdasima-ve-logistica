@extends('back.layouts.master')
@section('title', 'Müştərilərimiz')

@section('content')
<style>
    .swal2-popup {
        border-radius: 50px;
    }
    .sortable-placeholder {
        height: 100px;
        background-color: #f9f9f9;
        border: 1px dashed #ccc;
        margin-bottom: 10px;
    }
    .sortable-item {
        cursor: move;
    }
    .ui-sortable-helper {
        display: table;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
</style>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Müştərilərimiz</h4>
                    <div class="page-title-right">
                        <a href="{{ route('back.pages.our-clients.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Yeni Müştəri
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> Sıralamayı deyisdirmey ucun suruklemek lazimdir.
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
                        <table id="sortable-table" class="table table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th width="10">#</th>
                                    <th>Əsas Şəkil</th>
                                    <th>Alt Şəkillər</th>
                                    <th>Başlıq</th>
                                    <th>Status</th>
                                    <th>Əməliyyatlar</th>
                                </tr>
                            </thead>
                            <tbody id="sortable">
                                @foreach($clients as $client)
                                <tr class="sortable-item" data-id="{{ $client->id }}" data-order="{{ $client->order }}">
                                    <td><i class="fas fa-arrows-alt"></i></td>
                                    <td>
                                        <img src="{{ asset('storage/'.$client->main_image_path) }}" 
                                        class="img-thumbnail" 
                                        style="width: 150px; height: 100px; object-fit: contain;">
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <img src="{{ asset('storage/'.$client->bottom_image1_path) }}" 
                                            class="img-thumbnail" 
                                            style="width: 150px; height: 100px; object-fit: contain;">
                                            <img src="{{ asset('storage/'.$client->bottom_image2_path) }}" 
                                            class="img-thumbnail" 
                                            style="width: 150px; height: 100px; object-fit: contain;">

                                        </div>
                                    </td>
                                    <td style="display: flex; flex-direction: column;  align-items: start; gap: 15px;">
                                        
                                        <div><strong>AZ:</strong> {{ $client->text_az }}</div>
                                        <div><strong>EN:</strong> {{ $client->text_en }}</div>
                                        <div><strong>RU:</strong> {{ $client->text_ru }}</div>
                                    </td>
                                    <td>
                                        <form action="{{ route('back.pages.our-clients.toggle-status', $client->id) }}" method="POST">
                                            @csrf

                                            <button type="submit" class="btn btn-sm btn-{{ $client->status ? 'success' : 'danger' }}">
                                                {{ $client->status ? 'Aktiv' : 'Deaktiv' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('back.pages.our-clients.edit', $client->id) }}" 
                                           class="btn btn-warning btn-sm" style="background-color: #5bf91b; border-color: green; color: white">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-danger btn-sm" 
                                                onclick="deleteData({{ $client->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{ $client->id }}" 
                                              action="{{ route('back.pages.our-clients.destroy', $client->id) }}" 
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
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

// Sayfa yüklendiğinde bu kod çalışsın
document.addEventListener('DOMContentLoaded', function() {
    console.log('Sayfa yüklendi, jQuery kontrol ediliyor...');
    
    if (typeof jQuery != 'undefined') {
        console.log('jQuery yüklendi, jQuery sürümü:', $.fn.jquery);
        console.log('jQuery UI yüklendi mi:', typeof $.ui != 'undefined');
        
        if (typeof $.ui != 'undefined') {
            console.log('Sortable başlatılıyor...');
            try {
                $("#sortable").sortable({
                    placeholder: "sortable-placeholder",
                    handle: "td:first-child",
                    update: function(event, ui) {
                        console.log('Sıralama güncelleniyor...');
                        let items = [];
                        $('#sortable tr').each(function(index) {
                            items.push({
                                id: $(this).data('id'),
                                order: index
                            });
                        });
                        
                        console.log('Gönderilecek veriler:', items);

                        $.ajax({
                            url: "{{ route('back.pages.our-clients.update-order') }}",
                            method: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                items: items
                            },
                            success: function(response) {
                                console.log('Sunucu yanıtı:', response);
                                if (response.success) {
                                    Swal.fire({
                                        position: "center",
                                        icon: "success",
                                        title: "Sıralama Uğurla Yeniləndi",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                } else {
                                    Swal.fire({
                                        position: "center",
                                        icon: "error",
                                        title: "Bir Xəta Baş Verdi",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('Ajax hatası:', error);
                                Swal.fire({
                                    position: "center",
                                    icon: "error",
                                    title: "Bir Xəta Baş Verdi: " + error,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        });
                    }
                });
                $("#sortable").disableSelection();
                console.log('Sortable başarıyla başlatıldı');
            } catch(e) {
                console.error('Sortable başlatılırken hata oluştu:', e);
            }
        } else {
            console.error('jQuery UI yüklenmemiş!');
        }
    } else {
        console.error('jQuery yüklenmemiş!');
    }
});
</script>
@endpush 