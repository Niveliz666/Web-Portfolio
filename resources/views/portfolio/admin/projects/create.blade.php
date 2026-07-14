@extends('layouts.admin')
@section('title', 'Add Project')
@section('page-title', 'Add New Project')

@section('content')
<div class="admin-card">
    <form method="POST" action="{{ route('admin.projects.store') }}" class="admin-form">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label>Title *</label>
                <input type="text" name="title" value="{{ old('title') }}" required>
                @error('title') <span class="field-error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Category *</label>
                <select name="category" required>
                    <option value="">Select...</option>
                    <option value="Website" {{ old('category') == 'Website' ? 'selected' : '' }}>Website</option>
                    <option value="Web Application" {{ old('category') == 'Web Application' ? 'selected' : '' }}>Web Application</option>
                    <option value="Mobile App" {{ old('category') == 'Mobile App' ? 'selected' : '' }}>Mobile App</option>
                    <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('category') <span class="field-error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Live Demo URL</label>
                <input type="url" name="live_url" value="{{ old('live_url') }}" placeholder="https://example.com/demo">
            </div>
            <div class="form-group">
                <label>Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}">
            </div>
            <div class="form-group">
                <label>Featured</label>
                <div class="form-checkbox">
                    <input type="checkbox" name="featured" id="featured" {{ old('featured') ? 'checked' : '' }}>
                    <label for="featured">Mark as featured</label>
                </div>
            </div>
            <div class="form-group form-span-2">
                <label>Description *</label>
                <textarea name="description" rows="3" required>{{ old('description') }}</textarea>
                @error('description') <span class="field-error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group form-span-2">
                <label>Long Description</label>
                <textarea name="long_description" rows="5">{{ old('long_description') }}</textarea>
            </div>
            <div class="form-group">
                <label>Image URL</label>
                <input type="url" name="image" value="{{ old('image') }}" placeholder="https://example.com/image.jpg">
            </div>
            <div class="form-group">
                <label>Technologies (comma separated)</label>
                <input type="text" name="technologies" value="{{ old('technologies') }}" placeholder="Laravel, React, MySQL">
            </div>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn-admin-primary">Save Project</button>
            <a href="{{ route('admin.projects.index') }}" class="btn-admin-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection