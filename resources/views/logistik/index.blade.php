@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-3xl px-4 py-10 sm:px-6 lg:px-8">
    <section class="rounded-lg bg-white p-6 shadow-sm dark:bg-gray-800 sm:p-8">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Kalkulator Kebutuhan Logistik Pengungsi</h1>
        <p class="mt-2 text-gray-600 dark:text-gray-300">Masukkan jumlah pengungsi dan lama pengungsian untuk memperkirakan kebutuhan logistik.</p>

        <form action="{{ route('logistik.hitung') }}" method="POST" class="mt-6 space-y-5">
            @csrf
            <div>
                <label for="pengungsi" class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-200">Jumlah pengungsi (orang)</label>
                <input type="number" id="pengungsi" name="pengungsi" min="1" max="100000" value="{{ old('pengungsi', $input['pengungsi'] ?? '') }}" required
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100">
                @error('pengungsi')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="hari" class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-200">Lama pengungsian (hari)</label>
                <input type="number" id="hari" name="hari" min="1" max="365" value="{{ old('hari', $input['hari'] ?? '') }}" required
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100">
                @error('hari')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <p class="text-sm text-gray-600 dark:text-gray-300" id="live" aria-live="polite"></p>
            <button class="rounded-md bg-indigo-600 px-5 py-3 font-semibold text-white hover:bg-indigo-700" type="submit">Hitung kebutuhan</button>
        </form>

        @if ($hasil)
            <h2 class="mt-8 text-xl font-semibold text-gray-900 dark:text-gray-100">Hasil perhitungan</h2>
            <div class="mt-3 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-left text-sm dark:divide-gray-700">
                    <thead class="bg-gray-50 text-gray-700 dark:bg-gray-900 dark:text-gray-200">
                        <tr>
                            <th class="px-4 py-3 font-medium">Barang</th>
                            <th class="px-4 py-3 font-medium">Total kebutuhan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-gray-800 dark:divide-gray-700 dark:text-gray-100">
                        @foreach ($hasil as $item)
                            <tr>
                                <td class="px-4 py-3">{{ $item['item'] }}</td>
                                <td class="px-4 py-3">{{ number_format($item['total'], 1, ',', '.') }} {{ $item['satuan'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
</div>
@endsection

@section('scripts')
<script>
    const refugeesInput = document.getElementById('pengungsi');
    const daysInput = document.getElementById('hari');
    const totalPeopleDays = document.getElementById('live');

    function updatePeopleDays() {
        const refugees = Number(refugeesInput.value);
        const days = Number(daysInput.value);
        totalPeopleDays.textContent = refugees > 0 && days > 0
            ? `Total orang-hari: ${(refugees * days).toLocaleString('id-ID')}`
            : '';
    }

    refugeesInput.addEventListener('input', updatePeopleDays);
    daysInput.addEventListener('input', updatePeopleDays);
    updatePeopleDays();
</script>
@endsection
