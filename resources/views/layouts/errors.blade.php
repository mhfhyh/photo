    @if(count($errors))
        <div class="form-group">
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <il > <strong>{{$error}}</strong></il>
                        @endforeach
                </ul>
            </div>
        </div>
    @endif