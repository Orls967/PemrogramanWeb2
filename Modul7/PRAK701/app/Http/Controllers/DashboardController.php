<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Loan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalMembers = Member::count();
        $totalLoans = Loan::count();

        $recentLoans = Loan::with(['member', 'book'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalBooks',
            'totalMembers',
            'totalLoans',
            'recentLoans'
        ));
    }
}