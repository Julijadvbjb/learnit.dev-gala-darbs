@foreach($activities as $activity)
    <p>Description: {{ $activity->description }}</p>
    <p>Causer: {{ optional($activity->causer)->name }}</p>
    <p>Course: {{ optional($activity->subject)->name }}</p>
@endforeach
