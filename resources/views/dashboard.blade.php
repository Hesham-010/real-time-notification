<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
    }
    
    .notifications {
      margin-top: 20px;
      padding: 10px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    
    .notification-item {
      margin-bottom: 10px;
      padding: 5px;
      background-color: #e8f7ff;
      border: 1px solid #b3e0ff;
      border-radius: 3px;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('21aca170711d87c9bcad', {
        cluster: 'mt1'
        });

        var channel = pusher.subscribe('register');
        channel.bind('register-event', function(data) {
            alert(JSON.stringify(data));
        });
    </script>
</head>
<body>
  <h1>This is the Admin Dashboard</h1>
  
  <div class="notifications">
    <h2>Notifications</h2>
    @foreach(Auth::user()->notifications as $notification)
      <div class="notification-item">
        {{ $notification->data['message'] }}
      </div>
    @endforeach
  </div>
</body>
</html>
