<?php
    echo print_r($users);
?>

<hr>

@foreach($users as $user)
    <p>{{ $user['name'] }}</p>
    <p>{{ $user['age'] }}</p>

    @if($user['age'] < 18)
        <p>{{ $user['name'] }} can't drive.</p>
    @endif
    <hr>
@endforeach

@copyright {{ date('Y') }}
