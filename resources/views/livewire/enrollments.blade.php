<div class="max-w-5xl mx-auto px-6 py-10">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Matriculas</h1>

        <a href="{{ route('enrollments.create') }}"
            class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-xl transition">
            Registar matricula
        </a>
    </div>

    @if (session()->has('success'))
        <div class="mb-6 text-green-700 bg-green-100 dark:text-green-200 dark:bg-green-800 px-4 py-3 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    @forelse ($enrollments as $enrollment)
        <div
            class="p-5 mb-4 bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-700 rounded-2xl shadow-sm flex items-start justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Estudiante:
                    {{ $enrollment->student->first_name }} {{ $enrollment->student->last_name }}</h2>
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Numero de matricula:
                    {{ $enrollment->enrollment_number }}</h2>
                <div class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                    <div class="font-medium">
                        Cursos
                        <ul class="list-disc ms-6">
                            @forelse ($enrollment->courses as $course)
                                <li class="font-medium">{{ $course->name }}</li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <button wire:click="confirmDelete({{ $enrollment->id }})" type="button"
                class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg transition">
                🗑️ Eliminar
            </button>
        </div>
    @empty
        <p class="text-gray-600 dark:text-gray-300 text-sm">No hay matriculas registradas aún.</p>
    @endforelse
    <div class="mt-6">
        {{ $enrollments->links('pagination::tailwind') }}
    </div>

    {{-- Modal de confirmación --}}
    @if ($confirmingDelete)
        <div class="fixed inset-0 backdrop-blur-sm flex items-center justify-center z-50">
            <div
                class="bg-white dark:bg-zinc-800 rounded-xl p-6 max-w-sm w-full shadow-lg border border-gray-200 dark:border-zinc-700">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">¿Eliminar matricula?</h2>
                <p class="text-sm text-gray-700 dark:text-gray-300 mb-6">Esta acción no se puede deshacer.</p>

                <div class="flex justify-end space-x-3">
                    <button wire:click="$set('confirmingDelete', false)"
                        class="px-4 py-2 bg-gray-100 dark:bg-zinc-700 text-gray-800 dark:text-white rounded-lg text-sm hover:bg-gray-200 dark:hover:bg-zinc-600">
                        Cancelar
                    </button>
                    <button wire:click="delete"
                        class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-sm">
                        Eliminar
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
