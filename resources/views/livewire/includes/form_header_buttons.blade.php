<div class="flex space-x-3">
    <a href="{{ url()->previous() }}"
        class="inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-zinc-800 text-gray-800 dark:text-white rounded-lg text-sm hover:bg-gray-200 dark:hover:bg-zinc-700 transition">
        ← Volver
    </a>

    <button wire:click="confirmDelete" type="button"
        class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg transition">
        🗑️ Eliminar
    </button>
</div>
