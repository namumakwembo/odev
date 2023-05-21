<div>
  {{-- Because she competes with no one, no one can compete with her. --}}



  <div class="flex items-center justify-center p-12">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="mx-auto w-full max-w-2xl">
      <form wire:submit.prevent="submit" method="POST">
        

        <h1 class="text-4xl font-bold pb-5">Rezervasyon Yapin</h1>



        <div class="mb-5">
          <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">
            Gezilecek Yerleri
          </label>
          <div class="flex gap-px lg:rounded-lg overflow-hidden flex-wrap bg-white"><a target="_blank" href="/blog/inkumu"
              class="bg-black relative w-full md:w-auto md:flex-1 flex items-center justify-center h-36  font-heading text-white uppercase tracking-widest hover:opacity-75">
              <div class="relative z-10">Inkumu</div><img
                src="https://images.unsplash.com/photo-1528855275993-0f4a23fedd62?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80"
                class="absolute inset-0 w-full h-full object-cover opacity-50">
            </a><a target="_blank" href="/blog/bartin"
              class="bg-black relative w-full md:w-auto md:flex-1 flex items-center justify-center h-36  font-heading text-white uppercase tracking-widest hover:opacity-75">
              <div class="relative z-10">Bartin</div><img
                src="https://images.unsplash.com/photo-1449495169669-7b118f960251?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1951&amp;q=80"
                class="absolute inset-0 w-full h-full object-cover opacity-50">
            </a><a target="_blank" href="/blog/amasra"
              class="bg-black relative w-full md:w-auto md:flex-1 flex items-center justify-center h-36  font-heading text-white uppercase tracking-widest hover:opacity-75">
              <div class="relative z-10">Amasra</div><img
                src="https://storage.kucukoteller.com.tr/2018/12/10/1544445786453954.jpg"
                class="absolute inset-0 w-full h-full object-cover opacity-50">
            </a>
          </div>
        </div>


          {{-- dates --}}
        <section class="mb-5">

          <h4   class="mb-3 block text-base font-medium text-[#07074D]">
            Tarihi Sec
          </h4>
          <div class="grid lg:grid-cols-2 gap-2">

            <button type="button" wire:click="$set('dateType',1)" class="border p-2 px-3 rounded-lg flex justify-center gap-1 hover:ring-1 {{$dateType==1?'ring-1 ring-[#6A64F1]  text-[#6A64F1]':''}} hover:ring-[#6A64F1] transition-colors ">
              {{__($start1->format('d M Y'))}} - {{$end1->format('d M Y')}}
            </button>

            <button type="button" wire:click="$set('dateType',2)" class="border p-2 px-3 rounded-lg flex justify-center gap-1 hover:ring-1 {{$dateType==2?'ring-1 ring-[#6A64F1]  text-[#6A64F1]':''}} hover:ring-[#6A64F1] transition-colors ">
              {{$start2->format('d M Y')}} - {{$end2->format('d M Y')}}
            </button>


            <button type="button" wire:click="$set('dateType',3)" class="border p-2 px-3 rounded-lg flex justify-center gap-1 hover:ring-1 {{$dateType==3?'ring-1 ring-[#6A64F1]  text-[#6A64F1]':''}} hover:ring-[#6A64F1] transition-colors ">
              {{$start3->format('d M Y')}} - {{$end3->format('d M Y')}}
            </button>


          </div>

          @error('dateType')
          <p class="text-red-500 py-2"> {{$message}} </p>
          @enderror
        </section>

        {{-- Kac Kisi --}}
        <div class=" flex flex-wrap">

            <div class="mb-5">
              <label for="number" class="mb-3 block text-base font-medium text-[#07074D]">
                Kac Kisi Gelecek
              </label>
              <input type="number" name="number" wire:model="attendee_count"  placeholder="Sayi girin"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
         
              @error('attendee_count')
              <p class="text-red-500 py-2"> {{$message}} </p>
              @enderror
              </div>

        </div>

          {{-- request--}}
          <div class=" flex flex-wrap">

            <div class="mb-5 w-full">
              <label for="request" class="mb-3 block text-base font-medium text-[#07074D]">
                Ozel Istekleri
              </label>
              <textarea rows="5" type="text" name="request" wire:model="request"  placeholder="Ozel Istekleriniz" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" ></textarea>
              @error('request')
              <p class="text-red-500 py-2"> {{$message}} </p>
              @enderror
              </div>

        </div>

        {{-- <div class="mb-5">
          <label class="mb-3 block text-base font-medium text-[#07074D]">
            Are you coming to the event?
          </label>
          <div class="flex items-center space-x-6">
            <div class="flex items-center">
              <input type="radio" name="radio1" id="radioButton1" class="h-5 w-5" />
              <label for="radioButton1" class="pl-3 text-base font-medium text-[#07074D]">
                Yes
              </label>
            </div>
            <div class="flex items-center">
              <input type="radio" name="radio1" id="radioButton2" class="h-5 w-5" />
              <label for="radioButton2" class="pl-3 text-base font-medium text-[#07074D]">
                No
              </label>
            </div>
          </div>
        </div> --}}

        <div>
          <button
            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
            Gonder
          </button>
        </div>
      </form>
    </div>
  </div>
</div>