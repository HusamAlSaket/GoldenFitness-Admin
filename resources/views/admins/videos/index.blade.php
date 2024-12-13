@extends('components.layout2')

<!-- Main Content -->
<main class="main-content" id="mainContent">
    <!-- Videos Stats Grid -->
    <div class="video-stats-grid mb-4">
        <div class="stat-card">
            <i class="bi bi-film"></i>
            <div>
                <h5 class="mb-0">{{ $videos->count() }}</h5>
                <small class="text-muted">Videos</small>
            </div>
        </div>
    </div>

    <!-- Videos Table Container -->
    <div class="videos-table-container">
        <div class="videos-header d-flex justify-content-between align-items-center mb-4">
            <h4 class="text-danger">Video List</h4>
            <div class="d-flex align-items-center">
                <input type="text" class="form-control me-2" placeholder="Search videos..." style="width: 200px;">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addVideoModal">
                    <i class="bi bi-plus me-1"></i>Add Video
                </button>
            </div>
        </div>
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Video</th>
                    <th>Benefits</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($videos as $video)
                    <tr id="video-{{ $video->id }}">
                        <td>{{ $video->title }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($video->description, 50) }}</td>
                        <td>
                            <div class="text-center">
                                <button class="btn btn-danger btn-s btn-custom w-100 p-1 me-5" data-bs-toggle="modal"
                                    data-bs-target="#videoModal-{{ $video->id }}">
                                    Watch
                                </button>
                            </div>
                        </td>
                        <td>
                            @if($video->benefits->isNotEmpty())
                                {{ $video->benefits->first()->benefit }}
                            @else
                                N/A
                            @endif
                        </td>
                        
                        <td class="action-buttons">
                            <button class="btn btn-sm btn-danger" style="background-color:#00bcd4;" data-bs-toggle="modal"
                                data-bs-target="#editVideoModal-{{ $video->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <form action="{{ route('videos.destroy', $video->id) }}" method="POST"
                                style="display: inline;" id="delete-form-{{ $video->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger"
                                    onclick="confirmDelete({{ $video->id }})">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Video Modal (Watch) -->
                    <div class="modal fade" id="videoModal-{{ $video->id }}" tabindex="-1"
                        aria-labelledby="videoModalLabel-{{ $video->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="videoModalLabel-{{ $video->id }}">
                                        {{ $video->title }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe src="{{ str_replace('watch?v=', 'embed/', $video->video_url) }}"
                                            class="embed-responsive-item" width="100%" height="400" frameborder="0"
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<!-- Edit Video Modal -->
<div class="modal fade" id="editVideoModal-{{ $video->id }}" tabindex="-1"
    aria-labelledby="editVideoModalLabel-{{ $video->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editVideoModalLabel-{{ $video->id }}">Edit Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('videos.update', $video->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title-{{ $video->id }}" class="form-label">Title</label>
                        <input type="text" name="title" id="title-{{ $video->id }}" class="form-control"
                            value="{{ old('title', $video->title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description-{{ $video->id }}" class="form-label">Description</label>
                        <textarea name="description" id="description-{{ $video->id }}" class="form-control"
                            rows="3">{{ old('description', $video->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="video_url-{{ $video->id }}" class="form-label">Video URL</label>
                        <input type="url" name="video_url" id="video_url-{{ $video->id }}" class="form-control"
                            value="{{ old('video_url', $video->video_url) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="benefit" class="form-label">Benefit</label>
                        <select name="benefit" id="benefit" class="form-control" required>
                            <option value="" disabled selected>{{ isset($video) ? ucfirst($video->benefit) : 'Select Benefit' }}</option>
                            <option value="free" {{ isset($video) && $video->benefit == 'free' ? 'selected' : '' }}>Free</option>
                            <option value="premium" {{ isset($video) && $video->benefit == 'premium' ? 'selected' : '' }}>Premium</option>
                        </select>
                    </div>
                    

                    <button type="submit" class="btn btn-danger">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


                @endforeach
            </tbody>
        </table>
    </div>
</main>
<!-- Add Video Modal -->
<div class="modal fade" id="addVideoModal" tabindex="-1" aria-labelledby="addVideoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addVideoModalLabel">Add New Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('videos.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="video_url" class="form-label">Video URL</label>
                        <input type="url" name="video_url" id="video_url" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="benefit" class="form-label">Benefit</label>
                        <select name="benefit" id="benefit" class="form-control" required>
                            <option value="free" {{ old('benefit', $video->benefit ?? '') == 'free' ? 'selected' : '' }}>Free</option>
                            <option value="premium" {{ old('benefit', $video->benefit ?? '') == 'premium' ? 'selected' : '' }}>Premium</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-danger">Save Video</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>


@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 700
        });
    </script>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmDelete(videoId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Video has been deleted successfully!',
                    showConfirmButton: false,
                    timer: 700
                }).then(() => {
                    document.getElementById('delete-form-' + videoId).submit();
                });
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[placeholder="Search videos..."]');
        searchInput.addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    });
</script>
