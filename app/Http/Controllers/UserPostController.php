<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
  // grab auth user and show their posts
  public function index(User $user)
  {
    $posts = $user->posts()->with(['user', 'likes'])->paginate(10);

    return view('users.posts.index', [
      'user' => $user,
      'posts' => $posts
    ]);
  }
}
