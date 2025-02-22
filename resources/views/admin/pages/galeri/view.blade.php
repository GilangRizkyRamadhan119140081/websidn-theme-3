@extends('admin.layouts.base')
@section('title', 'ImageCreate')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('galeri') }}">Daftar Galeri</a></li>
            <li class="breadcrumb-item active" aria-current="page">Preview Galeri</li>
        </ol>
    </nav>
    <div class="container">
        <h1>View Galeri</h1>
        <div class="form-group">
            <label for="path">Image</label>
            <img src="{{ Storage::disk('s3')->url($galeri->images->path) }}" width="100">
            <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#previewModal"><i
                    class="fas fa-fw fa-eye"></i> lihat
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="previewModalLabel">Preview Gambar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ Storage::disk('s3')->url($galeri->images->path) }}" class="img-fluid"
                            alt="Preview Gambar">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="id_text">Text</label>
            <input type="text" name="id_text" class="form-control" value="{{ $galeri->texts->paragraph }}" disabled>
        </div>
    </div>
@endsection
