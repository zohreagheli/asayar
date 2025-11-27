<div>
    @foreach($projects as $project)
    <div class="mb-4 p-4 border rounded-lg">
        <h3 class="font-bold">{{ $project->name }}</h3>
        <p>تعداد وظایف: {{ $project->tasks_count }}</p>
        <a href="{{ route('projects.show', $project) }}" class="text-blue-500">مشاهده</a>
    </div>
@endforeach

</div>
