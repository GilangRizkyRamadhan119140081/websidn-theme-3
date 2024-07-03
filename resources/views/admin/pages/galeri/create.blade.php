@extends('admin.layouts.base')
@section('title', 'ImageCreate')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('galeri') }}">Daftar galeri</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Galeri</li>
        </ol>
    </nav>
    <div class="container">
        <h1>Add Galeri</h1>
        <form action="{{ route('galeri.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_image">Image</label>
                <select name="id_image" id="id_image" class="form-control" required>
                    <option value="" disabled selected>Pilih Gambar</option>
                    @foreach ($images as $image)
                        <option value="{{ $image->id }}" data-path="{{ Storage::disk('s3')->url($image->path) }}">
                            {{ $image->path }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image_preview">Image Preview</label>
                <br>
                <img id="image_preview" src="" alt="No Image Selected"
                    style="max-width: 300px; max-height: 300px; display: none;">
            </div>
            <div class="form-group">
                <label for="id_text">Text</label>
                <select name="id_text" class="form-control">
                    @foreach ($texts as $text)
                        <option value="{{ $text->id }}">{{ $text->paragraph }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectElement = document.getElementById('id_image');
            const imagePreview = document.getElementById('image_preview');

            selectElement.addEventListener('change', function() {
                const selectedOption = selectElement.options[selectElement.selectedIndex];
                const imagePath = selectedOption.getAttribute('data-path');

                if (imagePath) {
                    imagePreview.src = imagePath;
                    imagePreview.style.display = 'block';
                } else {
                    imagePreview.style.display = 'none';
                }
            });
        });
    </script>
@endsection
