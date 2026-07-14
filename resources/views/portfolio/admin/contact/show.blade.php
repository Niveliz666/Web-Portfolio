@extends('layouts.admin')
@section('title','Message') @section('page-title','Message Detail')
@section('content')
<div class="admin-card">
    <div class="card-header">
        <h2>From: {{ $contact->name }}</h2>
        <a href="{{ route('admin.contacts.index') }}" class="btn-admin-secondary">← Back</a>
    </div>
    <div class="message-detail">
        <div class="msg-meta">
            <div class="msg-meta-item"><span class="msg-label">From</span><span>{{ $contact->name }}</span></div>
            <div class="msg-meta-item"><span class="msg-label">Email</span><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></div>
            <div class="msg-meta-item"><span class="msg-label">Received</span><span>{{ $contact->created_at->format('d M Y, H:i') }}</span></div>
        </div>
        <div class="msg-body"><p>{{ $contact->message }}</p></div>
        <div class="msg-actions">
            <form method="POST" action="{{ route('admin.contacts.destroy',$contact) }}" onsubmit="return confirm('Delete?')" style="display:inline">
                @csrf @method('DELETE')
                <button type="submit" class="btn-admin-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection