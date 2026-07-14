@extends('layouts.admin')
@section('title', 'Edit Project')
@section('page-title', 'Edit: ' . $project->title)

@section('content')
<div class="admin-card">
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="admin-form">
        @csrf
        @method('PUT')
        <div class="form-grid">
            <div class="form-group">
                <label>Title *</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" required>
                @error('title') <span class="field-error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Category *</label>
                <select name="category" required>
                    <option value="Website" {{ $project->category == 'Website' ? 'selected' : '' }}>Website</option>
                    <option value="Web Application" {{ $project->category == 'Web Application' ? 'selected' : '' }}>Web Application</option>
                    <option value="Mobile App" {{ $project->category == 'Mobile App' ? 'selected' : '' }}>Mobile App</option>
                    <option value="Other" {{ $project->category == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label>Live Demo URL</label>
                <input type="url" name="live_url" value="{{ old('live_url', $project->live_url) }}">
            </div>
            <div class="form-group">
                <label>Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order) }}">
            </div>
            <div class="form-group">
                <label>Featured</label>
                <div class="form-checkbox">
                    <input type="checkbox" name="featured" id="featured" {{ $project->featured ? 'checked' : '' }}>
                    <label for="featured">Mark as featured</label>
                </div>
            </div>
            <div class="form-group form-span-2">
                <label>Description *</label>
                <textarea name="description" rows="3" required>{{ old('description', $project->description) }}</textarea>
            </div>
            <div class="form-group form-span-2">
                <label>Long Description</label>
                <textarea name="long_description" rows="5">{{ old('long_description', $project->long_description) }}</textarea>
            </div>
            <div class="form-group">
                <label>Image</label>
                @if($project->image)
                <div class="current-image">
                    <img src="{{ asset('storage/'.$project->image) }}" alt="">
                    <span>Current image</span>
                </div>
                @endif
                <input type="file" name="image" accept="image/*">
            </div>
            <div class="form-group">
                <label>Technologies (comma separated)</label>
                <input type="text" name="technologies" value="{{ old('technologies', implode(', ', $project->technologies ?? [])) }}">
            </div>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn-admin-primary">Update Project</button>
            <a href="{{ route('admin.projects.index') }}" class="btn-admin-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection