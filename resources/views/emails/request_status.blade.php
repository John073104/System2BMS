<!-- resources/views/emails/request_status.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Request Status Update</title>
</head>
<body>
    <h1>Your Request Status</h1>
    <p>Dear User,</p>
    <p>Your request for <strong>{{ $request->medicine->name }}</strong> has been {{ $request->status }}.</p>
    @if($request->status === 'approved')
        <p>Release Date: {{ $request->release_date->format('Y-m-d H:i:s') }}</p>
    @endif
    <p>Thank you!</p>
</body>
</html>