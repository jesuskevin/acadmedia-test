<div class="max-w-5xl mx-auto px-6 py-10">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">💲 Pagos</h1>
        @role('admin')
            <a href="{{ route('payments.create') }}"
                class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-xl transition">
                Registrar pago
            </a>
    @endrole
    </div>

    @if (session()->has('success'))
        <div class="mb-6 text-green-700 bg-green-100 dark:text-green-200 dark:bg-green-800 px-4 py-3 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    @forelse ($payments as $payment)
        <div
            class="p-5 mb-4 bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-700 rounded-2xl shadow-sm flex items-start justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Matricula: {{ $payment->enrollment->enrollment_number }}</h2>
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Estudiante: {{ $payment->enrollment->student->first_name }} {{ $payment->enrollment->student->last_name }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Curso: {{ $payment->course->name }}</p>
                <div class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                    Monto: <span class="font-medium">${{ number_format($payment->amount, 2) }}</span><br>
                    Metodo: <span class="font-medium">{{ $payment->method === 'bank_transfer' ? 'Transferencia bancaria' : 'Efectivo' }}</span>
                </div>
            </div>

            <div class="ml-6">
                @role('admin')
                    <button wire:click="confirmDelete({{ $payment->id }})" type="button"
                        class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg transition">
                        🗑️ Eliminar
                    </button>
                @endrole
            </div>
        </div>
    @empty
        <p class="text-gray-600 dark:text-gray-300 text-sm">No hay pagos registrados aún.</p>
    @endforelse
    <div class="mt-6">
        {{ $payments->links('pagination::tailwind') }}
    </div>

    @include('livewire.includes.delete_modal')
</div>
