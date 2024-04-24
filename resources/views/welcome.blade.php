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
            @if (session('owner_deleted'))
                <div class="bg-red-100 border-l-4 border-red-500 text-white-700 p-4 rounded-lg mb-4 w-5/6">
                    <p>"{{ session('owner_deleted') }}" successfully removed (along with owned cars).</p>
                </div>
            @endif
            <table class="table-auto border-collapse border border-slate-500 shadow-lg w-5/6">
                <thead>
                    <tr>
                        <th class="bg-blue-100 border text-left px-8 py-4">Forename</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Surname</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Email</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Phone</th>
                        <th class="bg-blue-100 border text-left px-8 py-4"></th>
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
                            <td class="border px-8 py-4">
                                <form action="{{ route('owner.destroy', $owner->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <label>
                                        <input class="hidden" type="submit" />
                                        <svg class="hover:scale-125 cursor-pointer" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 48 48">
                                            <linearGradient id="SVGID_1__VjYhRgCvzsVg_gr1" x1="37.433" x2="10.455" y1="11.416" y2="38.393" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#60affe"></stop><stop offset=".033" stop-color="#6ab4fe"></stop><stop offset=".197" stop-color="#97cbfe"></stop><stop offset=".362" stop-color="#bddeff"></stop><stop offset=".525" stop-color="#daecff"></stop><stop offset=".687" stop-color="#eef7ff"></stop><stop offset=".846" stop-color="#fbfdff"></stop><stop offset="1" stop-color="#fff"></stop></linearGradient><path fill="url(#SVGID_1__VjYhRgCvzsVg_gr1)" d="M38,13.5l-2.812-4.219C34.446,8.168,33.197,7.5,31.86,7.5H16.141c-1.338,0-2.587,0.668-3.328,1.781L10,13.5	H9.555l2.804,26.17c0.109,1.016,0.967,1.787,1.989,1.787h19.079c1.022,0,1.879-0.771,1.988-1.787L38.22,13.5H38z"></path><path fill="none" stroke="#2e9bfe" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" d="M36.249,29.839L38,13.5"></path><path fill="none" stroke="#2e9bfe" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" d="M10.608,19.171l2.009,18.755c0.218,2.033,1.933,3.574,3.977,3.574h14.811c2.044,0,3.759-1.541,3.977-3.574	l0.373-3.48"></path><line x1="7.5" x2="40.5" y1="13.5" y2="13.5" fill="none" stroke="#2e9bfe" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3"></line><line x1="20.5" x2="27.5" y1="5.5" y2="5.5" fill="none" stroke="#2e9bfe" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3"></line><path fill="none" stroke="#2e9bfe" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" d="M10,13.5l2.813-4.219c0.741-1.113,1.99-1.781,3.328-1.781H31.86c1.337,0,2.586,0.668,3.328,1.781L38,13.5"></path>
                                        </svg>
                                    </label>
                                </form>
                            </td>
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
