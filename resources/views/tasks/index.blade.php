<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Tasks List
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl py-10 mx-auto sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('tasks.create') }}" class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">Add Task</a>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="w-full min-w-full divide-y divide-gray-200">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                        Description
                                    </th>
                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                            {{ $task->id }}
                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                            {{ $task->description }}
                                        </td>

                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                            <a href="{{ route('tasks.show', $task->id) }}" class="mb-2 mr-2 text-blue-600 hover:text-blue-900">View</a>
                                            <a href="{{ route('tasks.edit', $task->id) }}" class="mb-2 mr-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <form class="inline-block" action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="mb-2 mr-2 text-red-600 hover:text-red-900" value="Delete">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>