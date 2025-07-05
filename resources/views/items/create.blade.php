<!-- resources/views/items/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Tambah Barang</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Kode Barang -->
        <div class="mb-3">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" required value="{{ old('kode_barang', $item->kode_barang ?? '') }}">
        </div>

        <!-- Nama Barang -->
        <div class="mb-3">
            <label for="name" class="form-label">Nama Barang</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Stok -->
        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" required>
            @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Harga -->
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" required>
            @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Upload Gambar -->
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Barang</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" accept="image/*" onchange="previewImage(event)">
            @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Preview Gambar -->
        <div class="mb-3">
            <img id="preview" src="#" alt="Preview Gambar" style="display: none; max-height: 150px; border-radius: 8px; margin-top: 10px;">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

@endsection

<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('preview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
