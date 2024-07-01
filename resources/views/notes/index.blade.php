<x-app-layout>

    <button type="button"
        class="mt-6 ml-6  text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <a href="{{ route('notes.create') }}">Create a note</a> </button>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-6 mt-6">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        content
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Edit
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notes as $note)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('notes.show', $note->id) }}">{{ $note->title }}</a>
                        </th>
                        <td class="px-6 py-4">
                            {{ $note->content }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('notes.edit', $note->id) }}">Edit</a>
                            <form method="POST" action="{{ route('notes.destroy', $note->id) }}"
                                style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="hs-dropdown-toggle ti-btn ti-btn-sm ti-btn-danger !rounded-full"
                                    type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
