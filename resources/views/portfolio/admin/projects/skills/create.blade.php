@extends('layouts.admin')
@section('title', 'Add Skill')
@section('page-title', 'Add New Skill')

@section('content')
<div class="admin-card">
    <form action="{{ route('admin.skills.store') }}" method="POST" class="admin-form">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label>Name *</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
                @error('name') <span class="field-error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Category *</label>
                <select name="category" required>
                    <option value="">Select...</option>
                    <option value="frontend" {{ old('category') == 'frontend' ? 'selected' : '' }}>Frontend</option>
                    <option value="backend" {{ old('category') == 'backend' ? 'selected' : '' }}>Backend</option>
                    <option value="database" {{ old('category') == 'database' ? 'selected' : '' }}>Database</option>
                    <option value="tools" {{ old('category') == 'tools' ? 'selected' : '' }}>Tools</option>
                </select>
            </div>
            <div class="form-group">
                <label>Icon (emoji)</label>
                <input type="text" name="icon" value="{{ old('icon') }}" placeholder="e.g. ⚡">
            </div>
            <div class="form-group">
                <label>Level (0-100)</label>
                <input type="number" name="level" value="{{ old('level', 80) }}" min="0" max="100">
            </div>
            <div class="form-group">
                <label>Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}">
            </div>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn-admin-primary">Save Skill</button>
            <a href="{{ route('admin.skills.index') }}" class="btn-admin-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection