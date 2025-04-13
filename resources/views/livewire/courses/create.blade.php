<div
    class="max-w-3xl mx-auto px-6 py-10 bg-white dark:bg-zinc-900 shadow rounded-2xl border border-gray-200 dark:border-zinc-700">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">🎓 Crear nuevo curso</h1>

    @if (session()->has('success'))
        <div class="mb-6 text-green-700 bg-green-100 dark:text-green-200 dark:bg-green-800 px-4 py-3 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-6">
        @include('livewire.courses.course_fields')

        {{-- Botón --}}
        <div class="pt-4">
            <button type="submit"
                class="inline-flex items-center px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Guardar curso
            </button>
        </div>
    </form>
</div>
