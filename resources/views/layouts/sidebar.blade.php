<div id="sidebar">
@if(auth()->check())
    <ol>
        @foreach($archive as $item)
                <li>
                    <a href="/?month={{$item['month']}}&year={{$item['year']}}">
                        {{$item['year'].' '.$item['month']}}</a>
                </li>
        @endforeach
@endif
    </ol>
</div>