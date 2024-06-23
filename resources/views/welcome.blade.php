<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Livewire Basic</title>
</head>
<body>



 @foreach (App\Models\User::find(1)->roles as $role)
                                                    <span class="badge badge-pill bg-danger">{{ $role->name }}</span>
                                                @endforeach
</body>
</html>
