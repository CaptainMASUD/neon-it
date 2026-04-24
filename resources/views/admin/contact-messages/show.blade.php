@extends('layouts.app')

@section('content')
<style>
    .message-card {
        background: #ffffff;
        border: 1px solid #e7edf6;
        border-radius: 28px;
        padding: 34px;
        box-shadow: 0 20px 50px rgba(15, 23, 42, 0.08);
    }

    .message-header {
        display: flex;
        justify-content: space-between;
        gap: 18px;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 28px;
    }

    .message-header h1 {
        margin: 0;
        font-size: 34px;
        color: #0f172a;
    }

    .message-header p {
        margin: 8px 0 0;
        color: #64748b;
        font-size: 15px;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 12px 18px;
        border-radius: 12px;
        background: #2563eb;
        color: #fff;
        font-weight: 800;
        text-decoration: none;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
        margin-bottom: 24px;
    }

    .detail-item {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        padding: 18px;
    }

    .detail-item span {
        display: block;
        font-size: 13px;
        font-weight: 800;
        color: #64748b;
        margin-bottom: 8px;
    }

    .detail-item strong {
        display: block;
        color: #0f172a;
        font-size: 16px;
        line-height: 1.6;
        word-break: break-word;
    }

    .detail-item a {
        color: #2563eb;
        text-decoration: none;
    }

    .message-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        padding: 22px;
    }

    .message-box span {
        display: block;
        font-size: 13px;
        font-weight: 800;
        color: #64748b;
        margin-bottom: 10px;
    }

    .message-box p {
        margin: 0;
        color: #334155;
        font-size: 16px;
        line-height: 1.8;
        white-space: pre-line;
    }

    .action-bottom {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 24px;
    }

    .reply-btn {
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

    .delete-btn {
        padding: 12px 18px;
        border-radius: 12px;
        background: #ef4444;
        color: #fff;
        border: 0;
        font-weight: 800;
        cursor: pointer;
    }

    @media(max-width: 768px) {
        .detail-grid {
            grid-template-columns: 1fr;
        }

        .message-card {
            padding: 24px 16px;
        }

        .message-header h1 {
            font-size: 28px;
        }
    }
</style>

<div class="admin-layout">
    @include('admin.partials.sidebar')

    <main class="admin-main">
        <div class="message-card">

            <div class="message-header">
                <div>
                    <h1>Message Details</h1>
                    <p>Full information submitted from the contact page.</p>
                </div>

                <a href="{{ route('admin.contact-messages.index') }}" class="back-btn">
                    Back to Messages
                </a>
            </div>

            <div class="detail-grid">
                <div class="detail-item">
                    <span>Name</span>
                    <strong>{{ $contactMessage->name }}</strong>
                </div>

                <div class="detail-item">
                    <span>Email</span>
                    <strong>
                        <a href="mailto:{{ $contactMessage->email }}">
                            {{ $contactMessage->email }}
                        </a>
                    </strong>
                </div>

                <div class="detail-item">
                    <span>Phone</span>
                    <strong>
                        @if($contactMessage->phone)
                            <a href="tel:{{ $contactMessage->phone }}">
                                {{ $contactMessage->phone }}
                            </a>
                        @else
                            N/A
                        @endif
                    </strong>
                </div>

                <div class="detail-item">
                    <span>Service Needed</span>
                    <strong>{{ $contactMessage->service ?? 'N/A' }}</strong>
                </div>

                <div class="detail-item">
                    <span>Subject</span>
                    <strong>{{ $contactMessage->subject ?? 'N/A' }}</strong>
                </div>

                <div class="detail-item">
                    <span>Submitted At</span>
                    <strong>{{ $contactMessage->created_at->format('d M Y, h:i A') }}</strong>
                </div>

                <div class="detail-item">
                    <span>Status</span>
                    <strong>{{ $contactMessage->is_read ? 'Read' : 'New' }}</strong>
                </div>

                <div class="detail-item">
                    <span>Last Updated</span>
                    <strong>{{ $contactMessage->updated_at->format('d M Y, h:i A') }}</strong>
                </div>
            </div>

            <div class="message-box">
                <span>Project Details</span>
                <p>{{ $contactMessage->message }}</p>
            </div>

            <div class="action-bottom">
                <a href="mailto:{{ $contactMessage->email }}?subject=Re: {{ $contactMessage->subject }}" class="reply-btn">
                    Reply by Email
                </a>

                <form action="{{ route('admin.contact-messages.destroy', $contactMessage->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="delete-btn">
                        Delete Message
                    </button>
                </form>
            </div>

        </div>
    </main>
</div>
@endsection