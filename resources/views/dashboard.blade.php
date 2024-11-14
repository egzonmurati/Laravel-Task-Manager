<x-app-layout>
    <style>
        
/* Custom CSS for Priority Badges */
.custom-high-priority {
    background-color: #f44336; /* Red */
    color: white;
}

.custom-medium-priority {
    background-color: #ffeb3b; /* Yellow */
    color: black;
}

.custom-low-priority {
    background-color: #4caf50; /* Green */
    color: white;
}

/* Custom CSS for Status Badges */
.custom-completed-status {
    background-color: #2196f3; /* Blue */
    color: white;
}

.custom-in-progress-status {
    background-color: #ff9800; /* Orange */
    color: white;
}
</style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between mb-6">
                <form method="GET" action="{{ route('tasks.index') }}" class="flex items-center space-x-4">
                    <!-- Status Filter -->
                    <div> <label for="status" class="text-sm text-gray-600">Status:</label> <select name="status"
                            id="status" class="ml-2 px-3 py-1 border border-gray-300 rounded-md">
                            <option value="">All</option>
                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Completed</option>
                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>In Progress</option>
                        </select> </div> <!-- Priority Filter -->
                    <div> <label for="priority" class="text-sm text-gray-600 ml-3">Priority:</label> <select
                            name="priority" id="priority" class="ml-2 px-3 py-1 border border-gray-300 rounded-md">
                            <option value="">All</option>
                            <option value="1" {{ request('priority') == '1' ? 'selected' : '' }}>High</option>
                            <option value="2" {{ request('priority') == '2' ? 'selected' : '' }}>Medium</option>
                            <option value="3" {{ request('priority') == '3' ? 'selected' : '' }}>Low</option>
                        </select> </div> <!-- Search Button --> <button type="submit"
                        class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 ml-3"> Search </button>
                </form> <!-- Create Task Button on the right --> <a href="{{ route('tasks.create') }}"
                    class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-md hover:bg-indigo-700"> Create Task
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Container for task list -->
                @if (isset($tasks) && $tasks->count() > 0)
                    @foreach ($tasks as $task)
                        <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col space-y-4">
                            <!-- Title -->
                            <div>
                                <h3 class="text-2xl font-semibold text-gray-800">{{ $task->title }}</h3>
                                <span class="text-sm text-gray-500">{{ $task->created_at->format('F j, Y') }}</span>
                            </div>

                            <!-- Description -->
                            <p class="text-gray-700">{{ Str::limit($task->description, 100) }}</p>

                           <!-- Priority -->
                           <div class="flex items-center space-x-3 mb-4">
                            <span class="font-medium text-sm text-gray-600">Priority:</span>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full
                                @if($task->priority == 1)
                                    custom-high-priority
                                @elseif($task->priority == 2)
                                    custom-medium-priority
                                @else
                                    custom-low-priority
                                @endif">
                                {{ $task->priority == 1 ? 'High' : ($task->priority == 2 ? 'Medium' : 'Low') }}
                            </span>
                        </div>

                        <!-- Status -->
                        <div class="flex items-center space-x-2">
                            <span class="font-medium text-sm text-gray-600">Status:</span>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full
                                @if($task->status)
                                    custom-completed-status
                                @else
                                    custom-in-progress-status
                                @endif">
                                {{ $task->status ? 'Completed' : 'In Progress' }}
                            </span>
                        </div>

                            <!-- Actions (Edit & Delete) -->
                            <div class="flex justify-between items-center mt-4">
                                <div class="flex space-x-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('tasks.edit', $task) }}"
                                        class="text-yellow-500 hover:text-yellow-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 3.538a2 2 0 00-2.828 0l-9.953 9.952a2 2 0 00-.528.97l-1.138 4.557a2 2 0 002.527 2.528l4.557-1.138a2 2 0 00.97-.528l9.952-9.953a2 2 0 000-2.828l-2.828-2.828a2 2 0 00-2.828 0z" />
                                        </svg>
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Error message with text-red, displayed only for the task that was clicked -->
                            @if (session('error_task_id') == $task->id && session('error'))
                                <div class="text-red-500 text-sm mt-4">
                                    <p>{{ session('error') }}</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @else
                   <!-- No tasks available message with design -->
                    <div class="flex justify-center items-center bg-gray-50 p-6 rounded-lg shadow-lg">
                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-12 h-12 mx-auto text-gray-400 mb-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 9l10 10m0-10l-10 10" />
                            </svg>
                            <p class="text-xl font-semibold text-gray-600">No Tasks Available</p>
                            <p class="text-sm text-gray-500 mt-2">It seems like you don't have any tasks yet. You can create one by clicking the button below.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
