<x-app-layout>
    <div class="py-12">
        @if(isset($total))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Total Harga: {{ $total }}
                </div>
            </div>
            <form action="/simulasi">
                <div class="px-4 py-3 mr-6 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Reset
                    </button>
                </div>
            </form>
        </div>
        @else
        <form action="/simulasi" method="POST">
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
                            <tr id="tr-0">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <select id="0" name="kategori-0" class="text-sm text-gray-500 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-1 select-kategori">
                                        <option value="0" selected>-</option>
                                        @foreach($kategoris as $k => $v)
                                            <option value="{{ $loop->index + 1 }}">{{ $k }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td id="part-0" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <select id="0" name="part-0" class="text-sm text-gray-500 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-1 select-part" disabled>
                                        <option value="0" selected>-</option>
                                    </select>
                                </td>
                                <td id="harga-0" name="harga-0" class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-500">
                                    0
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500">
                                    <button type="button" id="0" class="inline-flex justify-center py-2 px-4 border border-transparent text-xs font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 button-delete">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <input type="number" name="counter" id="counter" value="1" hidden>
            <div class="px-4 py-3 mr-6 text-right sm:px-6">
                <button type="button" class="inline-flex justify-center mr-2 py-2 px-4 border border-transparent text-sm font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 button-add">
                    Add
                </button>
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    Save
                </button>
            </div>
        </form>
        @endif
    </div>
</x-app-layout>

@if(!isset($total))
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var id = 1;

        var kategori = {};
        @foreach($kategoris as $k => $v)
        kategori['{{ $k }}'] = [
            @foreach($v as $d)
            { 'nama' : '{{ $d->nama }}', 'harga': '{{ $d->harga }}' },
            @endforeach
        ];
        @endforeach

        $(document).on('click', '.button-delete', function() {
            var button_id = $(this).attr('id');
            $('#tr-' + button_id).remove();
        });

        $(document).on('click', '.button-add', function() {
            var select_kategori = '';
            Object.entries(kategori).forEach(([key, value], index) => {
                select_kategori = select_kategori + '<option value="' + (index + 1) + '">' + key + '</option>';
            });

            $('#tbody').append(`                        <tr id="tr-` + id + `">
                            <td class="px-6 whitespace-nowrap text-sm text-gray-500">
                                <select id="` + id + `" name="kategori-` + id + `" class="text-sm text-gray-500 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-1 select-kategori">
                                    <option value="0" selected>-</option>` + select_kategori + `
                                </select>
                            </td>
                            <td id="part-` + id + `" class="px-6 whitespace-nowrap">
                                <select id="` + id + `" name="part-` + id + `" class="text-sm text-gray-500 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mt-1 select-part" disabled>
                                    <option value="0" selected>-</option>
                                </select>
                            </td>
                            <td id="harga-` + id + `" name="harga-` + id + `" class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-500">
                                0
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

        $(document).on('change', '.select-kategori', function() {
            var select_id = $(this).attr('id');
            var kategori_id = $(this).val();
            var select = $('#part-' + select_id).children('select');
            select.prop('disabled', kategori_id == 0);
            select.empty().append('<option value="0" selected>-</option>');
            if (kategori_id != 0) {
                kategori[$(this).find('option:selected').text()].forEach((part, index) => {
                    select.append('<option value="' + part['harga'] + '">' + part['nama'] + '</option>');
                });
            }
            $('#harga-' + select_id).html('0');
        });

        $(document).on('change', '.select-part', function() {
            var select_id = $(this).attr('id');
            $('#harga-' + select_id).html($(this).val());
        });
    });
</script>
@endif
