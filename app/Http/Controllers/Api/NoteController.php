<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FailedResource;
use App\Http\Resources\SuccessResource;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::all();
        $return = [
            'api_code' => 200,
            'api_status' => true,
            'api_message' => 'Sukses',
            'api_results' => $notes
        ];
        return SuccessResource::make($return);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->title && $request->content) {
            $note = Note::create([
                'title' => $request->title,
                'content' => $request->content
            ]);
            $return = [
                'api_code' => 200,
                'api_status' => true,
                'api_message' => 'Sukses',
                'api_results' => $note
            ];
            return SuccessResource::make($return);
        } else {
            $return = [
                'api_code' => Response::HTTP_BAD_REQUEST,
                'api_status' => false,
                'api_message' => 'Pastikan field Title & Content terisi!'
            ];
            return FailedResource::make($return);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $note->update([
            'title' => $request->title ?? $note->title,
            'content' => $request->content ?? $note->content,
        ]);
        $return = [
            'api_code' => 200,
            'api_status' => true,
            'api_message' => 'Sukses',
            'api_results' => $note
        ];
        return SuccessResource::make($return);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $return = [
            'api_code' => 200,
            'api_status' => true,
            'api_message' => 'Sukses Terhapus.',
            'api_results' => $note
        ];
        $note->delete();
        return SuccessResource::make($return);
    }
}
