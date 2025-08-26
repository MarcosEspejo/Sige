<li class="mb-2">
    <a href="{{ $href }}" 
       target="{{ $target }}"
       @class([
           'flex items-center px-4 py-3 rounded-lg transition-all duration-300',
           'hover:bg-libertadores-green hover:text-white hover:shadow-md',
           'group relative',
           'bg-libertadores-green text-white' => request()->url() == $href,
           'text-gray-700' => request()->url() != $href
       ])>
        <div class="flex items-center w-full">
            <i class="fas fa-{{ $icon }} w-5 h-5 mr-3 transition-transform duration-300 group-hover:scale-110"></i>
            <span class="flex-1 font-medium">{{ $slot }}</span>
            @if($badge)
                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-500 rounded-full ml-2 min-w-[20px]">
                    {{ $badge }}
                </span>
            @endif
        </div>
        
        {{-- Tooltip para enlaces con título --}}
        @if(isset($title))
        <div class="absolute left-full ml-2 px-2 py-1 bg-gray-800 text-white text-sm rounded opacity-0 invisible
                    group-hover:opacity-100 group-hover:visible transition-opacity duration-300 whitespace-nowrap">
            {{ $title }}
        </div>
        @endif
    </a>
</li>