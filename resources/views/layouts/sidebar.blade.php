<div id="sidebar">
    <ol>
        @foreach($archive as $item)
                <li>
                    <a href="/?month={{$item['month']}}&year={{$item['year']}}">
                        {{$item['year'].' '.$item['month']}}</a>
                </li>
        @endforeach
    </ol>
</div>