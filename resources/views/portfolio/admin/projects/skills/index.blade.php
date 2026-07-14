@extends('layouts.admin')
@section('title','Skills') @section('page-title','Skills')
@section('content')
<div class="admin-card">
    <div class="card-header">
        <h2>All Skills</h2>
        <a href="{{ route('admin.skills.create') }}" class="btn-admin-primary">+ Add Skill</a>
    </div>
    <div class="table-wrap">
        <table class="admin-table">
            <thead><tr><th>Skill</th><th>Category</th><th>Level</th><th>Order</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($skills as $skill)
                <tr>
                    <td><div class="flex-name">@if($skill->icon)<span class="skill-emoji">{{ $skill->icon }}</span>@endif <strong>{{ $skill->name }}</strong></div></td>
                    <td><span class="badge-cat">{{ $skill->category }}</span></td>
                    <td>
                        <div class="mini-bar"><div class="mini-bar-fill" style="width:{{ $skill->level }}%"></div></div>
                        <small>{{ $skill->level }}%</small>
                    </td>
                    <td>{{ $skill->sort_order }}</td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('admin.skills.edit',$skill) }}" class="btn-edit">Edit</a>
                            <form method="POST" action="{{ route('admin.skills.destroy',$skill) }}" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-delete">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="empty-row">No skills yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection