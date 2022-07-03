<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Divar</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-50 w-full h-screen">
        <form
            class="flex items-center w-full bg-white border h-16"
            action="{{ url('/') }}"
            method="get"
        >
            @csrf
            <input
                class="ml-5 shadow p2 text-center h-8 rounded border"
                type="text"
                value="{{ $count }}"
                placeholder="count"
                name="count"
            />
            <input
                class="ml-5 shadow p2 text-center h-8 rounded border"
                type="text"
                name="sys"
                value="{{ $sys }}"
                placeholder="sys"
            />
            <input
                type="submit"
                value="search"
                class="w-32 h-8 ml-5 text-white bg-orange-700 flex items-center justify-center shadow rounded"
            />
        </form>
        <form
            class="flex items-center w-full bg-white border h-16"
            action="{{ url('/excel') }}"
            method="get"
        >
            @csrf
            <input
                class="ml-5 shadow p2 text-center h-8 rounded border"
                type="text"
                value="{{ $count }}"
                placeholder="count"
                name="count"
            />
            <input
                class="ml-5 shadow p2 text-center h-8 rounded border"
                type="text"
                name="sys"
                value="{{ $sys }}"
                placeholder="sys"
            />
            <input
                type="submit"
                value="اکسل"
                class="w-32 h-8 ml-5 text-white bg-green-700 flex items-center justify-center shadow rounded"
            />
        </form>
        <div class="flex flex-col items-center w-full bg-gray-100 h-auto">
            <div class="flex w-full bg-gray-100 border h-auto">
                <span class="w-1/6 h-16 flex items-center justify-center"
                    >system</span
                >
                <span class="w-1/6 h-16 flex items-center justify-center"
                    >page</span
                >
                <span class="w-1/6 h-16 flex items-center justify-center"
                    >index</span
                >
                <span class="w-1/6 h-16 flex items-center justify-center"
                    >msg</span
                >
                <span class="w-1/6 h-16 flex items-center justify-center"
                    >time</span
                >
            </div>
            @foreach ($reports as $report)
            <div class="flex w-full bg-gray-100 border h-auto">
                <span
                    class="w-1/6 h-16 flex items-center justify-center bg-white"
                    >{{ $report->system }}</span
                >
                <span
                    class="w-1/6 h-16 flex items-center justify-center bg-white"
                    >{{ $report->page }}</span
                >
                <span
                    class="w-1/6 h-16 flex items-center justify-center bg-white"
                    >{{ $report->index }}</span
                >
                <span
                    class="w-2/6 h-16 flex items-center justify-center bg-white"
                    >{{ $report->msg }}</span
                >
                <span
                    class="w-1/6 h-16 flex items-center justify-center bg-white"
                    >{{ $report->time }}</span
                >
            </div>
            @endforeach
        </div>
        <div class="flex flex-col items-center w-full bg-gray-100 h-auto">
            <div class="flex w-full bg-gray-100 border h-auto">
                <span class="w-1/12 h-16 flex items-center justify-center"
                    >page</span
                >
                <span class="w-1/12 h-16 flex items-center justify-center"
                    >index</span
                >
                <span class="w-1/12 h-16 flex items-center justify-center"
                    >system</span
                >
                <span class="w-1/12 h-16 flex items-center justify-center"
                    >title</span
                >
                <span class="w-1/12 h-16 flex items-center justify-center"
                    >phone</span
                >
                <span class="w-1/12 h-16 flex items-center justify-center"
                    >did</span
                >
                <span class="w-1/12 h-16 flex items-center justify-center"
                    >from</span
                >
                <span class="w-1/12 h-16 flex items-center justify-center"
                    >req</span
                >
                <!-- <span class="w-1/12 h-16 flex items-center justify-center"
                    >jwt</span
                > -->
                <span class="w-1/12 h-16 flex items-center justify-center"
                    >last</span
                >
                <span class="w-1/12 h-16 flex items-center justify-center"
                    >data</span
                >
                <span class="w-1/12 h-16 flex items-center justify-center"
                    >city</span
                >
                <span class="w-1/12 h-16 flex items-center justify-center"
                    >category</span
                >
            </div>
            @foreach ($phones as $phone)
            <div
                class="flex w-full bg-white border h-auto hover:bg-gray-100 hover:cursor-pointer"
            >
                <span
                    class="w-1/12 h-auto min-h-16 flex flex-wrap break-all text-xs p-2 items-center justify-center"
                    >{{$phone->page}}</span
                >
                <span
                    class="w-1/12 h-auto min-h-16 flex flex-wrap break-all text-xs p-2 items-center justify-center"
                    >{{$phone->index}}</span
                >
                <span
                    class="w-1/12 h-auto min-h-16 flex flex-wrap break-all text-xs p-2 items-center justify-center"
                    >{{$phone->system}}</span
                >
                <span
                    class="w-1/12 h-auto min-h-16 flex flex-wrap break-all text-xs p-2 items-center justify-center truncate"
                    >{{$phone->title}}</span
                >
                <span
                    class="w-1/12 h-auto min-h-16 flex flex-wrap break-all text-xs p-2 items-center justify-center"
                    >{{$phone->phone}}</span
                >
                <span
                    class="w-1/12 h-auto min-h-16 flex flex-wrap break-all text-xs p-2 items-center justify-center"
                    >{{$phone->did}}</span
                >

                <span
                    class="w-1/12 h-auto min-h-16 flex flex-wrap break-all text-xs p-2 items-center justify-center"
                    >{{$phone->from}}</span
                >
                <span
                    class="w-1/12 h-auto min-h-16 flex flex-wrap break-all text-xs p-2 items-center justify-center"
                    >{{$phone->req}}</span
                >
                <!-- <span
                    class="w-1/12 h-auto min-h-16 flex flex-wrap break-all text-xs  p-2 items-center justify-center"
                    >{{$phone->jwt}}</span
                > -->
                <span
                    class="w-1/12 h-auto min-h-16 flex flex-wrap break-all text-xs p-2 items-center justify-center"
                    >{{$phone->last}}</span
                >
                <span
                    class="w-1/12 h-auto min-h-16 flex flex-wrap break-all text-xs p-2 items-center justify-center"
                    >{{$phone->created_at}}</span
                >
                <span
                    class="w-1/12 h-auto min-h-16 flex flex-wrap break-all text-xs p-2 items-center justify-center"
                    >{{$phone->city}}</span
                >
                <span
                    class="w-1/12 h-auto min-h-16 flex flex-wrap break-all text-xs p-2 items-center justify-center"
                    >{{$phone->category}}</span
                >
            </div>
            @endforeach
        </div>
    </body>
</html>
