<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-wrap">

        @foreach($reservations as $reservation)
            <div class="w-1/5 mx-auto sm:px-6 lg:px-8 my-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <ul>
                            <li>From: {{ date('Y-m-d', strtotime($reservation->from)) }}</li>
                            <li>To: {{ date('Y-m-d', strtotime($reservation->to)) }}</li>
                            <li>Title: {{ $reservation->books->title }}</li>
                            <li>Description: {{ $reservation->books->description }}</li>
                        </ul>
                    </div>
                    <div class="flex flex-col mt-6">
                        @foreach($reservation->possibleTransactions as $possibleTransaction)
                            <a href="{{ route('changeStatus', ['reservation' => $reservation->id, 'transaction' => $possibleTransaction['key']]) }}" class="bg-indigo-500 rounded text-white px-2 py-1 my-2" >{{ $possibleTransaction['text'] }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</x-app-layout>
