@extends('layouts.admin')
@section('title','Messages') @section('page-title','Messages')
@section('content')
<div class="admin-card">
    <div class="card-header">
        <h2>Inbox</h2>
        <span class="badge-count">{{ $contacts->total() }} total</span>
    </div>
    <div class="table-wrap">
        <table class="admin-table">
            <thead><tr><th>From</th><th>Email</th><th>Preview</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($contacts as $contact)
                <tr class="{{ !$contact->is_read?'unread-row':'' }}">
                    <td><strong>{{ $contact->name }}</strong></td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ Str::limit($contact->message,60) }}</td>
                    <td>{{ $contact->created_at->format('d M Y') }}</td>
                    <td>@if(!$contact->is_read)<span class="badge-new">New</span>@else<span class="badge-read">Read</span>@endif</td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('admin.contacts.show',$contact) }}" class="btn-edit">View</a>
                            <form method="POST" action="{{ route('admin.contacts.destroy',$contact) }}" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-delete">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="empty-row">No messages yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="pagination-wrap">{{ $contacts->links() }}</div>
</div>
@endsection