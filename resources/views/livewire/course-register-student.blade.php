<div>
    @if ($show)
        <div class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm">
            <div class="bg-white dark:bg-zinc-900 p-6 rounded-xl w-full max-w-md shadow-xl">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                    Registrar estudiante en: {{ $course->name }}
                </h2>

                <div class="mb-4">
                    @include('livewire.students.student_fields')
                </div>

                <div class="flex justify-end gap-2">
                    <button wire:click="$set('show', false)"
                        class="px-4 py-2 bg-gray-300 dark:bg-zinc-700 text-gray-800 dark:text-white rounded-lg text-sm">
                        Cancelar
                    </button>
                    <button wire:click="register"
                        class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm">
                        Registrar
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
