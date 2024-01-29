<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Media;
use App\Models\Reaction;
use Exception;

class PostController extends Controller
{
    //
    
    public function index()
    {
        $posts = Post::all();
    
        // Collecte les détails de chaque post
        $postsDetails = $posts->map(function ($post) {
            return $post->getPostDetails();
        });
    
        return response()->json(['posts' => $postsDetails], 200);
    }
    

    public function show($keyword)
    {
        $posts = Post::where('post_content', 'like', '%' . $keyword . '%')->get();

        if ($posts->isEmpty()) {
            return response()->json(['message' => 'Aucun post trouvé'], 200);
        }

        return response()->json($posts, 200);
    }

    public function store(Request $request, $user_id)
    {
        $validatedData = $request->validate([
            'post_content' => 'required|string',
            'media.*' => 'image|mimes:jpeg,png,gif,svg|max:8048',
        ]);

        $post_id_uniq = uniqid();

        $post = new Post([
            'user_id' => $user_id,
            'post_id' => $post_id_uniq,
            'post_content' => $validatedData['post_content'],
            'post_date' => now(),
        ]);

        $post->save();

        if ($request->hasFile('media')) {

            $file = $request->file('media');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('media', $filename, 'public');
            $fileMimeType = $file->getClientMimeType();
            // Utiliser save pour créer un nouvel objet Media
            $media = new Media();
            $media->media_name= $filename;
            $media->media_url = Storage::url("media/{$filename}");
            $media->media_id = uniqid();
            $media->media_type = $fileMimeType;
            $media->id_post_media = $post_id_uniq;
            $media->save();
            return response()->json(['message' => 'Post créé avec succès avec des médias'], 200);
        } else {
            // Aucun média, sauvegarder le post
            return response()->json(['message' => 'Post créé avec succès sans médias'], 200);
        }
    }



    public function update(Request $request, $id)
    {
        try {
            $post = Post::FindOrFail($id);
            $post->post_content = $request->post_content;
            $post->save();
            return response()->json($post, 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'Post non trouvé'], 404);
        }
    }


    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post non trouvé'], 404);
        }

        $post->delete();

        return response()->json(['message' => 'Post supprimé avec succès'], 200);
    }
}
