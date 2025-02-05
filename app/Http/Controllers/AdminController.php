<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create_artikel()
    {
        return view('admin.artikel.create_artikel');
    }

    public function add_post(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil data pengguna yang sedang login
        $user = Auth()->user();

        // Buat instance Post baru
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'active';
        $post->user_id = $user->id;
        $post->name = $user->name;
        $post->usertype = $user->usertype;

        // Proses upload gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('postimage'), $imagename);
            $post->image = $imagename;
        }

        // Simpan post ke database
        $post->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('message', 'Post Added Successfully');
    }

    public function show_post()
    {
        $posts = Post::paginate(3);
        return view('admin.artikel.show_artikel', compact('posts'));
    }



    public function delete_post($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->back()->with('message', 'Post Deleted Successfully');
    }


    public function edit_post($id)
    {
        $post = Post::find($id);

        return view('admin.artikel.edit_artikel', compact('post'));
    }


    public function update_post(Request $request, $id)
    {
        $data = Post::find($id);

        $data->title = $request->title;
        $data->description = $request->description;
        // image
        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);

            $data->image = $imagename;
        }
        $data->save();

        return redirect()->back()->with('message', 'Post Updated Successfully');
    }
}
