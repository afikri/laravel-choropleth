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
<div class="row row-cards row-deck">
  <div class="col-12">
    <div class="card">
      <div class="table-responsive">
        <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
          <thead>
            <tr>
              <th>
                Name
              @if( request()->input('sort') == "name" )
                <a href=""><i class="fa fa-sort-alpha-asc"></i></a>
              @elseif( request()->input('sort') == "-name" )
                <a href=""><i class="fa fa-sort-alpha-desc"></i></a>
              @endif
              </th>
              <th>Date</th>
              <th>State</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            @forelse($donations as $donation)
            <tr>
              <td>
                <div>{{ $donation->name }}</div>
                <div class="small text-muted">
                  {{ $donation->email }}
                </div>
              </td>
              <td>
                <div>{{ $donation->created_at->toFormattedDateString() }}</div>
                <div class="small text-muted">
                  {{ $donation->created_at->format('g:i:s A') }}
                </div>
              </td>
              <td>
              @if($donation->state)
                <div><a href="{{ route('states.show', $donation->state) }}">{{ $donation->state->name }}</a></div>
                <div class="small text-muted">
                  {{ $donation->city }} {{ $donation->zip }}
                </div>
              @else
                <div class="small text-muted">
                  No data.
                </div>
              @endif
              </td>
              <td>
                <div>${{ $donation->amount }}</div>
                <div class="small text-muted">
                  {{ $donation->source }}
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td class="text-center" colspan="4">
                <div>No donations</div>
                <div class="small text-muted">
                  Get workin' on it!
                </div>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="card-footer text-right">
        <div class="d-flex">
          {{ $donations->appends(request()->query())->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
