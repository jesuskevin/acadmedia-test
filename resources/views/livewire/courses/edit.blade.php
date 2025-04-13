<div
    class="max-w-3xl mx-auto px-6 py-10 bg-white dark:bg-zinc-900 shadow rounded-2xl border border-gray-200 dark:border-zinc-700">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">✏️ Editar curso</h1>

        <div class="flex space-x-3">
            <a href="{{ route('courses.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-zinc-800 text-gray-800 dark:text-white rounded-lg text-sm hover:bg-gray-200 dark:hover:bg-zinc-700 transition">
                ← Volver
            </a>

            <button wire:click="confirmDelete" type="button"
                class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg transition">
                🗑️ Eliminar
            </button>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="mb-6 text-green-700 bg-green-100 dark:text-green-200 dark:bg-green-800 px-4 py-3 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="update" class="space-y-6">
        {{-- Campos: name, description, price, duration (idénticos al formulario de creación) --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nombre del curso</label>
            <input type="text" wire:model="name"
                class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 transition" />
            @error('name')
                <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Descripción</label>
            <textarea wire:model="description" rows="4"
                class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 transition resize-none"></textarea>
            @error('description')
                <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Precio</label>
                <input type="number" step="0.01" wire:model="price"
                    class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 transition" />
                @error('price')
                    <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Duración</label>
                <input type="text" wire:model="duration"
                    class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 transition" />
                @error('duration')
                    <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="pt-4">
            <button type="submit"
                class="inline-flex items-center px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                💾 Actualizar curso
            </button>
        </div>
    </form>

    {{-- Modal de confirmación --}}
    @if ($confirmingDelete)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div
                class="bg-white dark:bg-zinc-800 rounded-xl p-6 max-w-sm w-full shadow-lg border border-gray-200 dark:border-zinc-700">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">¿Eliminar curso?</h2>
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
