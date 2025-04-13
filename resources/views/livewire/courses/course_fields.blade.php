{{-- Nombre --}}
<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nombre del curso</label>
    <input type="text" wire:model="name"
        class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 transition" />
    @error('name')
        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- Descripción --}}
<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Descripción</label>
    <textarea wire:model="description" rows="4"
        class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 transition resize-none"></textarea>
    @error('description')
        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- Precio y duración en grid --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Precio (USD)</label>
        <input type="number" step="0.01" wire:model="price"
            class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 transition" />
        @error('price')
            <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Duración (ej: 3h
            30m)</label>
        <input type="text" wire:model="duration"
            class="w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 transition" />
        @error('duration')
            <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
