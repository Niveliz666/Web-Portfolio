@extends('layouts.admin')
@section('title', 'Projects')
@section('page-title', 'Projects')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h2>All Projects</h2>
        <a href="{{ route('admin.projects.create') }}" class="btn-admin-primary">Add Project</a>
    </div>
    <div class="table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Category</th>
                    <th>Featured</th>
                    <th>Order</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                <tr>
                    <td>
                        <div class="table-project">
                            <div class="table-thumb">
                                @if($project->image)
                                <img src="{{ asset('storage/'.$project->image) }}" alt="">
                                @else
                                {{ strtoupper(substr($project->title, 0, 2)) }}
                                @endif
                            </div>
                            <div>
                                <strong>{{ $project->title }}</strong>
                                <small>{{ Str::limit($project->description, 40) }}</small>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge-cat">{{ $project->category }}</span></td>
                    <td>@if($project->featured)<span class="badge-yes">★ Yes</span>@else<span class="badge-no">—</span>@endif</td>
                    <td class="badge-count">{{ $project->sort_order }}</td>
                    <td class="table-actions">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Delete this project?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="empty-row">No projects yet. <a href="{{ route('admin.projects.create') }}">Add one →</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($projects->hasPages())
    <div class="pagination-wrap">{{ $projects->links() }}</div>
    @endif
</div>
@endsection