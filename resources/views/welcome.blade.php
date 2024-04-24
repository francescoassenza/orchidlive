@extends('master')

@section('content')
    <div class="flex flex-col space-y-4">
        <div class="basis-full">
            <div class="flex flex-row">
                <div>
                    <h1 class="mb-2 text-2xl font-bold">Car Owners</h1>
                </div>
                <div class="pl-2">
                    <button onclick="location.href='{{ route('owner.create') }}'">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 40 40">
                            <path fill="#98ccfd" d="M20,38.5C9.799,38.5,1.5,30.201,1.5,20S9.799,1.5,20,1.5S38.5,9.799,38.5,20S30.201,38.5,20,38.5z"></path><path fill="#4788c7" d="M20,2c9.925,0,18,8.075,18,18s-8.075,18-18,18S2,29.925,2,20S10.075,2,20,2 M20,1 C9.507,1,1,9.507,1,20s8.507,19,19,19s19-8.507,19-19S30.493,1,20,1L20,1z"></path><g><path fill="#fff" d="M30 18L22 18 22 10 18 10 18 18 10 18 10 22 18 22 18 30 22 30 22 22 30 22z"></path></g>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="basis-full">
            <table class="table-auto border-collapse border border-slate-500 shadow-lg">
                <thead>
                    <tr>
                        <th class="bg-blue-100 border text-left px-8 py-4">Forename</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Surname</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Email</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Phone</th>
                        <th class="bg-blue-100 border text-left px-8 py-4"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($owners as $owner)
                        <tr>
                            <td class="border px-8 py-4">{{ $owner->forename }}</td>
                            <td class="border px-8 py-4">{{ $owner->surname }}</td>
                            <td class="border px-8 py-4">{{ $owner->email }}</td>
                            <td class="border px-8 py-4">{{ $owner->phone }}</td>
                            <td class="border px-8 py-4"><a class="text-blue-600 hover:underline" href="{{ route('owner.show', $owner->id) }}">Show</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex flex-row">
        <div class="mt-5">
            <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>

    </div>

@endsection
