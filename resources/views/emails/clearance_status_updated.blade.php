<!-- resources/views/emails/clearance_status_updated.blade.php -->
<p>Dear {{ $clearance->name }},</p>

<p>Your clearance request has been updated to: <strong>{{ ucfirst($clearance->status) }}</strong>.</p>

@if($clearance->status === 'released')
    <p>Your clearance has been released on {{ $clearance->release_date->format('d M, Y') }}.</p>
@endif

<p>Thank you.</p>
