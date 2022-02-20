<x-app-layout>
    <div class="py-12">
        <form action="/admin" method="POST">
            @csrf
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kategori
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Part
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Harga
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tbody" class="bg-white divide-y divide-gray-200">
                            @foreach($parts as $d)
                                <tr id="tr-{{ $d->id }}">
                                    <td class="px-6 whitespace-nowrap text-sm text-gray-500">
                                        <input type="text" name="kategori-{{ $d->id }}" id="kategori-{{ $d->id }}" value="{{ $d->kategori }}" required class="mt-1 py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                    </td>
                                    <td class="px-6 whitespace-nowrap">
                                        <input type="text" name="part-{{ $d->id }}" id="part-{{ $d->id }}" value="{{ $d->nama }}" required class="mt-1 py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-500">
                                        <input type="number" name="harga-{{ $d->id }}" id="harga-{{ $d->id }}" value="{{ $d->harga }}" min="0" max="999999999" required class="mt-1 py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500">
                                        <button type="button" id="{{ $d->id }}" class="inline-flex justify-center py-2 px-4 border border-transparent text-xs font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 button-delete">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <input type="number" name="counter" id="counter" value="{{ $counter }}" hidden>
            <div class="px-4 py-3 mr-6 text-right sm:px-6">
                <button type="button" class="inline-flex justify-center mr-2 py-2 px-4 border border-transparent text-sm font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 button-add">
                    Add
                </button>
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    Save
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var id = '{{ $counter }}';

        $(document).on('click', '.button-delete', function() {
            var button_id = $(this).attr('id');
            $('#tr-' + button_id).remove();
        });

        $(document).on('click', '.button-add', function() {
            $('#tbody').append(`                        <tr id="tr-` + id + `">
                            <td class="px-6 whitespace-nowrap text-sm text-gray-500">
                                <input type="text" name="kategori-` + id + `" id="kategori-` + id + `" required class="mt-1 py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                            </td>
                            <td class="px-6 whitespace-nowrap">
                                <input type="text" name="part-` + id + `" id="part-` + id + `" required class="mt-1 py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-500">
                                <input type="number" name="harga-` + id + `" id="harga-` + id + `" min="0" max="999999999" required class="mt-1 py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500">
                                <button type="button" id="` + id + `" class="inline-flex justify-center py-2 px-4 border border-transparent text-xs font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 button-delete">
                                    Delete
                                </button>
                            </td>
                        </tr>`);

            id = id + 1;
            $("#counter").val(id);
        });
    });
</script>
