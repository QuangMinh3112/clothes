@props(['headers', 'col'])
<div class="relative overflow-x-auto ">
    <table class="w-full text-sm text-left border dark:text-gray-400 border-slate-100">
        <thead class="text-xs text-center border border-b-slate-100">
            <tr>
                @foreach ($headers as $data)
                    <th scope="col" class="px-6 py-3">
                        {{ $data['label'] }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th colspan="{{ $col }}"
                    class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                    Không có dữ liệu
                </th>
            </tr>
        </tbody>
    </table>
</div>
