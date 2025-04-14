<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Matricula</label>
    <select id="enrollment" wire:model="enrollment_id" wire:change="enrollmentChange" 
        class="block w-full px-4 py-2 text-sm border border-gray-300 dark:border-zinc-600 rounded-lg bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
        <option value="">Seleccionar matricula</option>
        @forelse ($enrollments as $enrollment)
            <option value="{{ $enrollment->id }}">
                {{ $enrollment->student->first_name }}
                {{ $enrollment->student->last_name }}
                {{ $enrollment->enrollment_number }}
            </option>
        @empty
        @endforelse
    </select>
    @error('enrollment_id')
        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Curso</label>
    <select id="course" wire:model="course_id"
        class="block w-full px-4 py-2 text-sm border border-gray-300 dark:border-zinc-600 rounded-lg bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
        <option value="">Seleccionar Curso</option>
        @forelse ($courses as $course)
            <option value="{{ $course->id }}">
                {{ $course->name }}
            </option>
        @empty
        @endforelse
    </select>
    @error('course_id')
        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Metodo de pago</label>
    <select id="course" wire:model="method"
        class="block w-full px-4 py-2 text-sm border border-gray-300 dark:border-zinc-600 rounded-lg bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
        <option value="">Seleccionar Metodo</option>
        <option value="cash">Efectivo</option>
        <option value="bank_transfer">Transferencia Bancaria</option>
    </select>
    @error('method')
        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>

{{--Monto --}}
<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Monto</label>
    <input type="text" wire:model="amount"
        class="w-full px-4 py-2 text-sm border border-gray-300 dark:border-zinc-600 rounded-lg bg-white dark:bg-zinc-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" />
    @error('amount')
        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
    @enderror
</div>
