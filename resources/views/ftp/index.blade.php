<x-guest-layout>

    {{-- <div class="grid lg:grid-cols-4">
        <div class="p-5 bg-red-500">Hallo</div>
        <div>Hallo</div>
        <div>Hallo</div>
        <div>Hallo</div>
    </div>   --}}

{{-- <x-pages.page-grid :cols="4">
    <div class="p-5 bg-red-500">Hallo</div>
    <div>Hallo</div>
    <div>Hallo</div>
    <div>Hallo</div>
</x-pages.page-grid> --}} 

@foreach ( $page as $i => $pageItem )
    {{-- <x-pages.page- :cols="{{$pageItem->colnum}}"> --}}
    @if ($pageItem->type=="grid")   
        @php
            $cols = $pageItem->colnum;
        @endphp
    <x-pages.page-grid :cols="$cols">    
        {!! $pageItem->content !!}
    </x-pages.page-grid>   
    @endif

@endforeach



<script>
    function selectItem(el){
        $('.page-item').each(function(){
                $(this).css('border','none');    
            });
        el.css('border', '1px solid green');
        showConfigurationMenu(el);
    }

    function showConfigurationMenu(el){
        $('#configurationMenu').hide();
        $('#configurationMenu').css('top', el.offset().top);
        $('#configurationMenu').css('left', el.offset().left);
        $('#configurationMenu').show();
    };    

    $(function(){
        $('.page-item').bind('contextmenu', function(e){
            e.preventDefault(); 
            selectItem($(this));
        });
        
    });
</script>    

</x-guest-layout>
