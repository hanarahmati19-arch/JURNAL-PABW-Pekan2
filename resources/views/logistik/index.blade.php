@extends('layouts.app')

@section('title', 'Kalkulator Logistik')

@section('content')
<div class="panel">
    <h2>Kalkulator Kebutuhan Logistik Pengungsi</h2>
    <p>Masukkan jumlah pengungsi dan lama pengungsian untuk memperkirakan kebutuhan logistik.</p>

    <form action="{{ route('logistik.hitung') }}" method="POST">
        @csrf
        <label for="pengungsi">Jumlah Pengungsi (orang)</label>
        <input type="number" id="pengungsi" name="pengungsi" min="1" value="{{ old('pengungsi', $input['pengungsi'] ?? '') }}">
        @error('pengungsi') <div class="error">{{ $message }}</div> @enderror

        <label for="hari">Lama Pengungsian (hari)</label>
        <input type="number" id="hari" name="hari" min="1" value="{{ old('hari', $input['hari'] ?? '') }}">
        @error('hari') <div class="error">{{ $message }}</div> @enderror

        <div class="hint" id="live"></div>
        <button class="btn" type="submit">Hitung</button>
    </form>

    @if ($hasil)
        <h2 style="margin-top:28px">Hasil Perhitungan</h2>
        <table>
            <thead><tr><th>Barang</th><th>Total Kebutuhan</th></tr></thead>
            <tbody>
            @foreach ($hasil as $h)
                <tr><td>{{ $h['item'] }}</td><td>{{ number_format($h['total'], 1, ',', '.') }} {{ $h['satuan'] }}</td></tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

@section('scripts')
<script>
    var p = document.getElementById('pengungsi'), h = document.getElementById('hari'), l = document.getElementById('live');
    function u(){ var a = +p.value, b = +h.value;
        l.textContent = (a > 0 && b > 0) ? 'Total orang-hari: ' + (a*b).toLocaleString('id-ID') : ''; }
    p.addEventListener('input', u); h.addEventListener('input', u); u();
</script>
@endsection
