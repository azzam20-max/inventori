@extends('layouts.app')

@section('content')
    <h1>Edit Barang</h1>

    <form action="{{ route('items.update', $item) }}" method="POST">
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

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
