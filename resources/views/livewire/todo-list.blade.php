<div class="max-w-3xl mx-auto p-6">
    <!-- فیلترها -->
    <div class="flex space-x-4 mb-6">
        <select wire:model="filter" wire:change="loadTasks" class="border rounded p-2">
            <option value="all">همه کارها</option>
            <option value="pending">در حال انجام</option>
            <option value="completed">انجام شده</option>
            <option value="high">فوری</option>
        </select>
    </div>

    <!-- فرم پیشرفته -->
    <form wire:submit.prevent="addTask" class="mb-8 bg-white p-4 rounded-lg shadow">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <input
                type="text"
                wire:model="newTask"
                placeholder="عنوان کار..."
                class="col-span-2 p-2 border rounded focus:ring-2 focus:ring-blue-500"
            >

            <input
                type="date"
                wire:model="dueDate"
                min="{{ now()->format('Y-m-d') }}"
                class="p-2 border rounded"
            >

            <select wire:model="priority" class="p-2 border rounded">
                <option value="low">کم اهمیت</option>
                <option value="medium">متوسط</option>
                <option value="high">مهم</option>
            </select>
        </div>

        <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            افزودن کار جدید
        </button>
    </form>

    <!-- لیست پیشرفته -->
    <ul class="space-y-3">
        @foreach($tasks as $task)
            <li wire:key="{{ $task->id }}"
                class="border rounded p-4 hover:shadow-md transition-shadow
                {{ $task->is_completed ? 'bg-gray-50' : '' }}
                @if($task->priority == 'high') border-red-200 bg-red-50 @endif
                @if($task->priority == 'medium') border-yellow-200 bg-yellow-50 @endif">

                <div class="flex items-start justify-between">
                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            wire:change="toggleComplete({{ $task->id }})"
                            {{ $task->is_completed ? 'checked' : '' }}
                            class="h-5 w-5 text-blue-600 rounded focus:ring-blue-500 mr-3"
                        >

                        <div>
                            <p class="{{ $task->is_completed ? 'line-through text-gray-500' : 'font-medium' }}">
                                {{ $task->title }}
                            </p>

                            @if($task->due_date)
                                <p class="text-sm text-gray-500 mt-1">
                                    مهلت: {{ jdate($task->due_date)->format('Y/m/d') }}
                                    @if($task->due_date < now() && !$task->is_completed)
                                        <span class="text-red-500">(گذشته!)</span>
                                    @endif
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="flex space-x-2">
                        <button
                            wire:click="startEdit({{ $task->id }})"
                            class="text-blue-600 hover:text-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </button>

                        <button
                            wire:click="deleteTask({{ $task->id }})"
                            wire:confirm="آیا از حذف این کار مطمئن هستید؟"
                            class="text-red-600 hover:text-red-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- حالت ویرایش -->
                @if($editingTaskId == $task->id)
                <div class="mt-4 p-3 bg-gray-100 rounded">
                    <input
                        type="text"
                        wire:model="editedTaskTitle"
                        class="w-full p-2 border rounded mb-2"
                    >
                    <button
                        wire:click="updateTask"
                        class="bg-green-600 text-white px-3 py-1 rounded mr-2">
                        ذخیره
                    </button>
                    <button
                        wire:click="cancelEdit"
                        class="bg-gray-500 text-white px-3 py-1 rounded">
                        انصراف
                    </button>
                </div>
            </div>
                @endif
            </li>
        @endforeach
    </ul>
</div>
