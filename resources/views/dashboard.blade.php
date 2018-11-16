@extends('layouts.app')

@section('content')
<div class="row row-cards">
  <div class="col-sm-6 col-lg-3">
    <div class="card p-3">
      <div class="d-flex align-items-center">
        <span class="stamp stamp-md bg-blue mr-3">
          <i class="fe fe-hash"></i>
        </span>
        <div>
          <h4 class="m-0">{{ $donation_count }}</h4>
          <small class="text-muted">Total Donations</small>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card p-3">
      <div class="d-flex align-items-center">
        <span class="stamp stamp-md bg-blue mr-3">
          <i class="fe fe-dollar-sign"></i>
        </span>
        <div>
          <h4 class="m-0">${{ number_format($donation_amount, 2) }}</h4>
          <small class="text-muted">Total Donated</small>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card p-3">
      <div class="d-flex align-items-center">
        <span class="stamp stamp-md bg-blue mr-3">
          <i class="fe fe-dollar-sign"></i>
        </span>
        <div>
          <h4 class="m-0">${{ number_format($donation_average, 2) }}</h4>
          <small class="text-muted">Average Donation</small>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card p-3">
      <div class="d-flex align-items-center">
        <span class="stamp stamp-md bg-blue mr-3">
          <i class="fe fe-clock"></i>
        </span>
        <div>
          <h4 class="m-0">{{ $last_donation ? $last_donation->diffForHumans() : 'Never' }}</h4>
          <small class="text-muted">Last Donation</small>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
