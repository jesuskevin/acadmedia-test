{{-- Modal de confirmación --}}
@if ($confirmingDelete)
    <div class="fixed inset-0 backdrop-blur-sm flex items-center justify-center z-50">
        <div
            class="bg-white dark:bg-zinc-800 rounded-xl p-6 max-w-sm w-full shadow-lg border border-gray-200 dark:border-zinc-700">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">¿Eliminar recurso?</h2>
            <p class="text-sm text-gray-700 dark:text-gray-300 mb-6">Esta acción no se puede deshacer.</p>

            <div class="flex justify-end space-x-3">
                <button wire:click="$set('confirmingDelete', false)"
                    class="px-4 py-2 bg-gray-100 dark:bg-zinc-700 text-gray-800 dark:text-white rounded-lg text-sm hover:bg-gray-200 dark:hover:bg-zinc-600">
                    Cancelar
                </button>
                <button wire:click="delete" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-sm">
                    Eliminar
                </button>
            </div>
        </div>
    </div>
@endif
