<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\State;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $donation_count = Donation::count();
    $donation_amount = Donation::sum('amount');
    $donation_average = Donation::avg('amount');
    $last_donation = optional(Donation::latest()->first())->created_at;

    return view('dashboard', compact('donation_count', 'donation_amount', 'donation_average', 'last_donation'));
  }
}
