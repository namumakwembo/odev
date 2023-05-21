<x-app-layout class="">
   
    <div class="py-12 px-5 ">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Rezerversonlarim') }}
            </h2>


            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg my-5">
               

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Tur Tarihi
                </th>
                <th scope="col" class="px-6 py-3">
                    Kisi Sayisi
                </th>
                <th scope="col" class="px-6 py-3">
                    Ozel Istekleri
                </th>
                <th scope="col" class="px-6 py-3">
                    Tarihi
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($reservations as $reservation )
                
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$reservation->id}}
                </th>
                <td class="px-6 py-4">
                    {{$reservation->date}}
                </td>
                <td class="px-6 py-4">
                    {{$reservation->attendee_count}}
                </td>
                <td class="px-6 py-4 max-w-sm">
                    {{$reservation->request}}
                </td>
                <td class="px-6 py-4">
                    {{$reservation->created_at->format('D m Y')}}
                </td>
            </tr>
            @endforeach

         
        </tbody>
    </table>
</div>

            </div>
        </div>




    </div>
</x-app-layout>
