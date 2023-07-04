@extends('layouts.app')

@section('title', 'Index')

@section('content')
<div class="flex justify-center  ml-64">
    <div class=" w-[80%] overflow-x-auto shadow-md sm:rounded-lg mt-48">
        <div class="flex justify-end">
            <a href=""><button type="button"
                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">Add
                    a article</button></a>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 h-12 mt-8">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nom
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Terminer
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created_up
                    </th>
                    <th scope="col" class="px-6 py-3">
                        updated_up
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 ">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $task->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $task->nom}}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Str::limit($task->description , 10) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $task->terminer}}
                        </td>
                        
                        <td class="px-6 py-4">
                            {{ $task->created_at->diffforhumans() }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $task->updated_at->diffforhumans() }}
                        </td>
                        <td class="flex justify-center items-center py-8 space-x-8">
                            <a href="{{ route('task.edit', $task->id) }} " class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <a href="{{ route('task.show', $task->id) }} " class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>

                            <a href="#" onclick="toggleModal('modal-id{{ $task->id }}')"
                                class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delet</a>
                            <div x-data="{ showModal: false }">
                                <!-- Button to open the modal -->
                                <!-- Modal overlay -->
                                <form action="{{ route('task.destroy', $task->id) }}" method="POST" class="d-inline ">
                                    @csrf
                                    @method('DELETE')

                                    <div class=" overflow-y-auto overflow-x-hidden fixed flex z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full"
                                        id="modal-id{{ $task->id }}">
                                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                            <!--content-->
                                            <div
                                                class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                                <!--header-->
                                                <div
                                                    class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                                                    <button type="button"
                                                        class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-toggle="deleteModal"
                                                        onclick="toggleModal('modal-id{{ $task->id }}')">
                                                        <svg class="w-5 h-5" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                                        aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>

                                                </div>
                                                <!--body-->
                                                <div class="relative p-3 flex-auto">
                                                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you
                                                        want to delete this item?</p>
                                                </div>
                                                <!--footer-->

                                                <div class="flex justify-center items-center space-x-4">
                                                    <button data-modal-toggle="deleteModal" type="button"
                                                        class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                                        onclick="toggleModal('modal-id{{ $task->id }}')">
                                                        No, cancel
                                                    </button>
                                                    <button type="submit"
                                                        class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900"
                                                        onclick="toggleModal('modal-id{{ $task->id }}')">
                                                        Yes, I'm sure
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop">
                                    </div>
                                    <!-- Main modal -->
                                    <script type="text/javascript">
                                        function toggleModal(modalID) {
                                            document.getElementById(modalID).classList.toggle("hidden");
                                            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
                                            document.getElementById(modalID).classList.toggle("flex");
                                            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
                                        }
                                    </script>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection