@extends('components.layout2')


    <div class="container mt-4">
        <h2>Video Details</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $video->title }}</h5>
                <p class="card-text"><strong>Description:</strong> {{ $video->description }}</p>
                <p class="card-text"><strong>Video URL:</strong> 
                    <a href="{{ $video->video_url }}" target="_blank">{{ $video->video_url }}</a>
                </p>
                @if ($video->coach)
                    <p class="card-text"><strong>Uploaded by:</strong> {{ $video->coach->name }}</p>
                @else
                    <p class="card-text"><strong>Uploaded by:</strong> Unknown</p>
                @endif
                <a href="{{ route('videos.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
