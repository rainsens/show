<!DOCTYPE html>
<html>
<body>
<h1>{{ $subject }}</h1>
<p>
    {{ $content }}
</p>
<p>
    Project: <a href="https://www.uq.edu.au">{{ $project->title }}</a>
    <br>
    Project Team: {{ $project->team_name }}
</p>
</body>
</html>
