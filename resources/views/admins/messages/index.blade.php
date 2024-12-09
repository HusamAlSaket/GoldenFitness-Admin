@extends('components.layout2')

<!-- Main Content -->
<main class="main-content" id="mainContent">
    <!-- message Stats Grid -->
    <div class="row message-stats mb-4">
        <div class="col-4">
            <div class="stat-card">
                <i class="bi bi-people"></i>
                <div>
                    <h5 class="mb-0">{{ $messages->count() }}</h5>
                    <small class="text-muted">Total messages</small>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="stat-card">
                <i class="bi bi-calendar"></i>
                <div>
                    <h5 class="mb-0">{{ $repliedCount }}</h5>
                    <small class="text-muted">Messages Replied To</small>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="stat-card">
                <i class="bi bi-clock"></i>
                <div>
                    <h5 class="mb-0">{{ $unrepliedCount }}</h5>
                    <small class="text-muted">Pending Messages</small>
                </div>
            </div>
        </div>
    </div>

    <!-- messages Table Container -->
    <div class="messages-table-container">
        <div class="messages-header d-flex justify-content-between align-items-center mb-4">
            <h4 class="text-danger">Message List</h4>
            <div class="d-flex ms-auto">
                <form method="GET" action="{{ route('messages.index') }}" class="search-form">
                    <input type="text" name="search" placeholder="Search products..." value="{{ request()->get('search') }}">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>

        <!-- List messages -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Message</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                    <th>Reply</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $message)
                    <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->user_id }}</td>
                        <td>{{ $message->message }}</td>
                        <td>{{ $message->created_at }}</td>
                        <td>{{ $message->updated_at }}</td>
                        <td>
                            <form id="delete-form-{{$message->id}}" action="{{ route('messages.destroy', $message->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $message->id }})">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" onclick="openReplyModal({{ $message->id }})">
                                <i class="bi bi-reply"></i> Reply
                            </button>

                            <!-- Reply Modal -->
                            <div class="modal fade" id="replyModal-{{ $message->id }}" tabindex="-1" aria-labelledby="replyModalLabel-{{ $message->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="replyModalLabel-{{ $message->id }}">Reply to Message</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('messages.reply', $message->id) }}" method="POST" id="replyForm-{{ $message->id }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="reply" class="form-label">Reply</label>
                                                    <textarea class="form-control" name="reply" id="reply-{{ $message->id }}" rows="3"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-danger">Send Reply</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

<script>
// Function to confirm delete with SweetAlert
function confirmDelete(messageId) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'This action cannot be undone!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + messageId).submit();
        }
    });
}

// Display success message on success
@if (session('success'))
Swal.fire({
    icon: 'success',
    title: 'Success!',
    text: '{{ session('success') }}',
    showConfirmButton: false,
    timer: 4000
});
@endif

// Open the Reply Modal manually using JavaScript (avoiding any unwanted refresh issues)
function openReplyModal(messageId) {
    const modal = new bootstrap.Modal(document.getElementById('replyModal-' + messageId));
    modal.show();
}

// Search functionality for messages
const searchInput = document.querySelector('input[placeholder="Search products..."]');
searchInput.addEventListener('keyup', function() {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');

    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});
</script>
