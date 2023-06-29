<x-layout> 
	<div class="mx-4">
	 <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
  	</a>
	    <!-- Page heading -->
	    <header class="bg-gray-50 py-8">
	      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 xl:flex xl:items-center xl:justify-between">
	        <div class="min-w-0 flex-1">
	          <nav class="flex" aria-label="Breadcrumb">
	            <ol role="list" class="flex items-center space-x-2">
	              <li>
	                <div>
	                  <a href="/" class="text-sm font-medium text-gray-500 hover:text-gray-700">Home</a>
	                </div>
	              </li>	              
	              <li>
	                <div class="flex items-center">
	                	<svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
			              <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
			            </svg>
	                  <a href="#" class="text-sm font-medium text-gray-500 hover:text-gray-700">{{ $postcard->title }}</a>
	                </div>
	              </li>
	            </ol>
	          </nav>
	          <h1 class="mt-2 text-xl font-bold leading-7 text-gray-900 sm:truncate sm:text-2xl sm:tracking-tight">Postcard Details</h1>
	        </div>

	      </div>
	    </header>
		<x-card class="p-10">
		<div class="flex">
			<img class="hidden w-48 mr-6 md:block rounded-l-lg"
			src="{{$postcard->photo ? asset('storage/' . $postcard->photo) : 'https://picsum.photos/400/200?random=' . $postcard->id }}" alt="" />
			<div>
				<h1 class="text-2xl font-bold text-gray-900">{{ $postcard->title }}</h1>
				<p class="text-sm font-medium text-gray-500">Available on <time datetime="{{ $postcard->online_at }}">{{ $postcard->online_at }}</time> to <time datetime="{{ $postcard->offline_at }}">{{ $postcard->offline_at }}</time></p>			
				<p>Author: {{ $postcard->user->name }}</p>				
				<div class="font-bold mb-4"><p>Price: R{{ $postcard->price }} </p></div> 
			</div>
		</div>
	</x-card>
</div>
<div class="mx-4">
    <x-card class="p-10">
      <div class="flex flex-col items-center justify-center text-center">     
        
        <div>
          <h3 class="text-3xl font-bold mb-4">Postcard Description</h3>
          <div class="text-lg space-y-6">
           

            <a href="mailto:info@ringier.ch"
              class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                class="fa-solid fa-envelope"></i>
              Contact Agent</a>

            <a href="https://www.ringier.com" target="_blank"
              class="block bg-black text-white py-2 rounded-xl hover:opacity-80"><i class="fa-solid fa-globe"></i>
              Visit Website</a>
          </div>
        </div>
      </div>
    </x-card>    
  </div>
  {{-- Output the schema as a JSON-LD script --}}
  {!! $schema !!} 
  
  </x-layout>
