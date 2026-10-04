@php
    $t = $l['tinggi'];
    $status = '';
    $kelas = '';
@endphp

@if ($t < 30)
    @php $status = 'Waspada'; $kelas = 'waspada'; @endphp
@elseif ($t <= 70)
    @php $status = 'Siaga'; $kelas = 'siaga'; @endphp
@else
    @php $status = 'Awas'; $kelas = 'awas'; @endphp
@endif

<div class="card {{ $kelas }}-b">
    <h3>{{ $l['lokasi'] }}</h3>
    <p>Pelapor: <b>{{ $l['nama'] }}</b></p>
    <p>Tinggi genangan: <b>{{ $l['tinggi'] }} cm</b></p>
    <p>Waktu: {{ $l['waktu'] }}</p>
    <span class="badge {{ $kelas }}">{{ $status }}</span>
</div>
