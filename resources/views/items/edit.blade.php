@extends('layouts.app')

@section('content')
    <h1>Edit Barang</h1>

    <form action="{{ route('items.update', $item) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" required value="{{ old('kode_barang', $item->kode_barang ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="name" value="{{ $item->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stock" value="{{ $item->stock }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" value="{{ $item->price }}" class="form-control" required>
        </div>

        {{-- Gambar Lama --}}
        <div class="mb-3">
            <label class="form-label">Gambar Saat Ini</label><br>
            @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="Gambar" width="150" style="border-radius: 8px;">
            @else
                <p class="text-muted">Tidak ada gambar.</p>
            @endif
        </div>

        {{-- Upload Gambar Baru --}}
        <div class="mb-3">
            <label for="image" class="form-label">Ganti Gambar</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)">
        </div>

        {{-- Preview Gambar Baru --}}
        <div class="mb-3">
            <img id="preview" src="#" alt="Preview Gambar Baru" style="display: none; max-height: 150px; border-radius: 8px; margin-top: 10px;">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">Batal</a>
    </form>

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
@endsection
