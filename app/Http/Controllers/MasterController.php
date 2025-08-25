<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MasterController extends Controller
{
    public function showMasterDashboard() {
        $adminCount = User::where('role', 'admin')->count();
        $postCount = Post::whereHas("user", function($query) {
            $query->where('role', ['admin', 'master']);
        })->count();
        $categoryCount = Category::whereHas('posts')->count();

        return view("master.masterDashboard", compact(['adminCount', 'postCount', 'categoryCount']));
    }

    public function showAdmin(Request $request) {
        $query = User::query()->where('role', 'admin');
        $date = $request->dateFilter;

        $alphabetical = $request->alphabeticalFilter;

        switch ($date) {
            case "today":
                $query->whereDate('created_at', Carbon::now());
                break;
            case 'yesterday':
                $query->whereDate('created_at', Carbon::yesterday());
                break;
            case 'this_week':
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
        }

        if($request->filled('alphabeticalFilter') && $alphabetical == 'asc') {
            $query->orderBy('username', 'asc');
        } elseif($request->filled('alphabeticalFilter') && $alphabetical == 'desc') {
            $query->orderBy('username', 'desc');
        } else {
            $query->orderBy('id', 'asc');
        }

        $users = $query->paginate(10);

        return view("master.showAdmin", compact('users'));
    }

    public function regAdminForm() {
        return view("master.regAdminForm");
    }
    
    public function regAdmin(Request $request) {
        $validated = $request->validate([
            'username' => 'required|string|unique:users|min:5|max:100',
            'email' => 'required|email|unique:users',
            'password'=> 'required|string|confirmed|min:5'
        ]);

        $user = User::create([
            'username'=> $validated['username'],
            'email'=> $validated['email'],
            'password'=> bcrypt($validated['password']), 
            'role' => 'admin'
        ]);

        return redirect()->route('show.admin');
    }

    public function destroy(User $user) {
        $user->delete();

        return redirect()->route('show.masterDashboard');
    }
}
