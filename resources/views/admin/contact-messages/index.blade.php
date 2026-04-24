@extends('layouts.app')

@section('content')
<style>
    .admin-contact-page {
        background: #f5f7fb;
        min-height: 100vh;
        padding: 50px 0;
    }

    .admin-contact-card {
        background: #ffffff;
        border: 1px solid #e7edf6;
        border-radius: 28px;
        padding: 32px;
        box-shadow: 0 20px 50px rgba(15, 23, 42, 0.08);
    }

    .admin-contact-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 18px;
        flex-wrap: wrap;
        margin-bottom: 26px;
    }

    .admin-contact-header h1 {
        margin: 0;
        font-size: 34px;
        color: #0f172a;
    }

    .admin-contact-header p {
        margin: 8px 0 0;
        color: #64748b;
        font-size: 15px;
    }

    .back-dashboard {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 12px 18px;
        border-radius: 12px;
        background: #0f172a;
        color: #fff;
        font-weight: 800;
        text-decoration: none;
    }

    .success-alert {
        padding: 14px 16px;
        background: #dcfce7;
        color: #166534;
        border-radius: 14px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .messages-table-wrap {
        width: 100%;
        overflow-x: auto;
    }

    .messages-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px;
    }

    .messages-table th,
    .messages-table td {
        padding: 15px;
        border-bottom: 1px solid #e2e8f0;
        text-align: left;
        vertical-align: top;
        font-size: 14px;
    }

    .messages-table th {
        color: #334155;
        background: #f8fafc;
        font-weight: 800;
    }

    .messages-table td {
        color: #475569;
    }

    .message-subject {
        color: #0f172a;
        font-weight: 800;
    }

    .message-email {
        color: #2563eb;
        font-weight: 700;
    }

    .badge {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 800;
    }

    .badge-new {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .badge-read {
        background: #f1f5f9;
        color: #64748b;
    }

    .action-wrap {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 9px 14px;
        border-radius: 10px;
        border: 0;
        font-size: 13px;
        font-weight: 800;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-view {
        background: #2563eb;
        color: #fff;
    }

    .btn-delete {
        background: #ef4444;
        color: #fff;
    }

    .empty-message {
        text-align: center;
        padding: 50px 20px;
        color: #64748b;
        font-weight: 800;
        background: #f8fafc;
        border-radius: 18px;
        border: 1px solid #e2e8f0;
    }

    .pagination-wrap {
        margin-top: 24px;
    }

    @media(max-width: 768px) {
        .admin-contact-card {
            padding: 24px 16px;
        }

        .admin-contact-header h1 {
            font-size: 28px;
        }
    }
</style>

<div class="admin-contact-page">
    <div class="container">
        <div class="admin-contact-card">

            <div class="admin-contact-header">
                <div>
                    <h1>Contact Messages</h1>
                    <p>View and manage messages submitted from the contact page.</p>
                </div>

                <a href="{{ route('dashboard') }}" class="back-dashboard">
                    Dashboard
                </a>
            </div>

            @if(session('success'))
                <div class="success-alert">
                    {{ session('success') }}
                </div>
            @endif

            @if($messages->count())
                <div class="messages-table-wrap">
                    <table class="messages-table">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Service</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td>
                                        @if($message->is_read)
                                            <span class="badge badge-read">Read</span>
                                        @else
                                            <span class="badge badge-new">New</span>
                                        @endif
                                    </td>

                                    <td>{{ $message->name }}</td>

                                    <td>
                                        <a href="mailto:{{ $message->email }}" class="message-email">
                                            {{ $message->email }}
                                        </a>
                                    </td>

                                    <td>{{ $message->phone ?? 'N/A' }}</td>

                                    <td>{{ $message->service ?? 'N/A' }}</td>

                                    <td>
                                        <span class="message-subject">
                                            {{ $message->subject ?? 'N/A' }}
                                        </span>
                                    </td>

                                    <td>{{ $message->created_at->format('d M Y, h:i A') }}</td>

                                    <td>
                                        <div class="action-wrap">
                                            <a href="{{ route('admin.contact-messages.show', $message->id) }}" class="btn-action btn-view">
                                                View
                                            </a>

                                            <form action="{{ route('admin.contact-messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn-action btn-delete">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pagination-wrap">
                    {{ $messages->links() }}
                </div>
            @else
                <div class="empty-message">
                    No contact messages found.
                </div>
            @endif

        </div>
    </div>
</div>
@endsection