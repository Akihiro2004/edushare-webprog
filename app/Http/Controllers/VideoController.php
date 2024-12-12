<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;
use App\Models\Video;

class VideoController extends Controller
{
    public function store(VideoRequest $request) {
        try {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $originalName = $request->file('thumbnail')->getClientOriginalName();
                $uniqueName = time() . '_' . $originalName;  // Adding a timestamp to make the name unique
                $photoPath = $request->file('thumbnail')->storeAs('Videos/Thumbnail', $uniqueName, 'public');
            }

            $video = Video::create([
                'title' => $validated['title'],
                'category_id' => $validated['category_id'],
                'thumbnail' => $photoPath ?? null,
                'creator' => $validated['creator'],
                'publish_date' => $validated['publish_date'],
                'description' => $validated['description'],
                'url' => $validated['url']
            ]);

            return redirect()->route('videos')->with('success', 'Video added successfully!');

        } catch (\Exception $e) {
            \Log::error('Failed to create video: ' . $e->getMessage());

            return redirect()->route('videos')->with('error', 'Failed to add the video. Please try again.');
        }
    }

    public function update(VideoRequest $request, Video $video) {
        try {
            $validated = $request->validated();

            $updateData = [
                'title' => $validated['title'],
                'category_id' => $validated['category_id'],
                'creator' => $validated['creator'],
                'publish_date' => $validated['publish_date'],
                'description' => $validated['description'],
                'url' => $validated['url']
            ];

            if ($request->hasFile('thumbnail')) {
                if ($video->thumbnail && file_exists(storage_path('app/public/'.$video->thumbnail))) {
                    unlink(storage_path('app/public/'.$video->thumbnail));
                }

                $originalName = $request->file('thumbnail')->getClientOriginalName();
                $uniqueName = time() . '_' . $originalName;
                $thumbnailPath = $request->file('thumbnail')->storeAs('Videos/Thumbnails', $uniqueName, 'public');
                $updateData['thumbnail'] = $thumbnailPath;
            }

            $video->update($updateData);

            return redirect()->route('videos')->with('success', 'Video updated successfully!');

        } catch (\Exception $e) {
            \Log::error('Failed to update video: ' . $e->getMessage());
            return redirect()->route('videos')->with('error', 'Failed to update the video. Please try again.');
        }
    }

    public function destroy(Video $video) {
        try {
            $video->delete();

            if(file_exists(public_path('storage/'.$video->thumbnail))) {
                unlink(public_path('storage/'.$video->thumbnail));
            }

            return redirect()->route('videos')->with('success', 'Videos deleted successfully!');

        } catch (\Exception $e) {
            \Log::error('Failed to delete video: ' . $e->getMessage());
            return redirect()->route('videos')->with('error', 'Failed to delete the video. Please try again.');
        }
    }
}
