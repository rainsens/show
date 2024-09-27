<!DOCTYPE html>
<html>
<body>
<h1>{{ $subject }}</h1>
<p>
    {{ $content }}
</p>
<p>
    Project: {{ $project->title }}
    <br>
    Project Team: {{ $project->team_name }}
</p>
</body>
</html>
