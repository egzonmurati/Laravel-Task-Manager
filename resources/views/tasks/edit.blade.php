<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('tasks.update', $task) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- To specify that it's an update request -->

                        <!-- Title Field -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm">
                            @error('title')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description Field -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description" name="description" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm">{{ old('description', $task->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status Field -->
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select id="status" name="status" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm">
                                <option value="0" {{ old('status', $task->status) == '0' ? 'selected' : '' }}>In Progress</option>
                                <option value="1" {{ old('status', $task->status) == '1' ? 'selected' : '' }}>Completed</option>
                            </select>
                            @error('status')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Priority Field -->
                        <div class="mb-4">
                            <label for="priority" class="block text-sm font-medium text-gray-700">Priority</label>
                            <select id="priority" name="priority" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm">
                                <option value="1" {{ old('priority', $task->priority) == '1' ? 'selected' : '' }}>High</option>
                                <option value="2" {{ old('priority', $task->priority) == '2' ? 'selected' : '' }}>Medium</option>
                                <option value="3" {{ old('priority', $task->priority) == '3' ? 'selected' : '' }}>Low</option>
                            </select>
                            @error('priority')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                                Update Task
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
