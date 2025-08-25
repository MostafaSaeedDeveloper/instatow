@extends('admin.master')

@section('content')

<div class="content">
          <!-- Overview -->
          <div class="d-flex justify-content-between align-items-center py-3">
            <h2 class="h3 fw-normal mb-0">Overview</h2>
            <div class="dropdown">
                <button type="button" class="btn btn-sm btn-alt-secondary px-3" id="dropdown-analytics-overview" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @switch($range)
                        @case('7days')
                            Last 7 days
                            @break
                        @case('month')
                            This Month
                            @break
                        @case('3months')
                            Last 3 Months
                            @break
                        @case('year')
                            Last Year
                            @break
                        @default
                            Last 7 days
                    @endswitch
                    <i class="fa fa-fw fa-angle-down"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end fs-sm" aria-labelledby="dropdown-analytics-overview">
                    <a class="dropdown-item" href="{{ route('dashboard', ['range' => '7days']) }}">Last 7 days</a>
                    <a class="dropdown-item" href="{{ route('dashboard', ['range' => 'month']) }}">This Month</a>
                    <a class="dropdown-item" href="{{ route('dashboard', ['range' => '3months']) }}">Last 3 Months</a>
                    <a class="dropdown-item" href="{{ route('dashboard', ['range' => 'year']) }}">Last Year</a>
                </div>
            </div>

          </div>

          <div class="row">
            <!-- Lines -->
            <div class="col-md-6 col-xl-4">
              <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                <div class="block-content block-content-full d-flex justify-content-between">
                  <div class="me-3">
                    <p class="fs-3 fw-medium mb-0">
                        ${{$totalQuoteTariff}}
                    </p>
                    <p class="text-muted mb-0">
                      Total Quotations Tariff
                    </p>
                  </div>
                  <div>
                    <i class="fa fa-2x fa-arrow-alt-circle-up text-primary-lighter"></i>
                  </div>
                </div>
                <div class="block-content block-content-full overflow-hidden">
                  <!-- Sparkline Container -->
                  <span class="js-sparkline" data-type="line"
                        data-points="{{ json_encode($quoteTariffPoints) }}"
                        data-width="100%"
                        data-height="120px"
                        data-fill-color="transparent"
                        data-spot-color="transparent"
                        data-min-spot-color="transparent"
                        data-max-spot-color="transparent"
                        data-tooltip-prefix="$"></span>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-xl-4">
              <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                <div class="block-content block-content-full d-flex justify-content-between">
                  <div class="me-3">
                    <p class="fs-3 fw-medium mb-0">
                        ${{$totalOrderTariff}}
                    </p>
                    <p class="text-muted mb-0">
                      Total Orders Tariff
                    </p>
                  </div>
                  <div>
                    <i class="fa fa-2x fa-arrow-alt-circle-up text-primary-lighter"></i>
                  </div>
                </div>
                <div class="block-content block-content-full overflow-hidden">
                  <!-- Sparkline Container -->
                  <span class="js-sparkline" data-type="line"
                        data-points="{{ json_encode($orderTariffPoints) }}"
                        data-width="100%"
                        data-height="120px"
                        data-fill-color="transparent"
                        data-spot-color="transparent"
                        data-min-spot-color="transparent"
                        data-max-spot-color="transparent"
                        data-tooltip-prefix="$"></span>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-xl-4">
              <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                <div class="block-content block-content-full d-flex justify-content-between">
                  <div class="me-3">
                    <p class="fs-3 fw-medium mb-0">
                        ${{$totalOrderDeposit}}
                    </p>
                    <p class="text-muted mb-0">
                      Total Profit
                    </p>
                  </div>
                  <div>
                    <i class="fa fa-2x fa-arrow-alt-circle-up text-primary-lighter"></i>
                  </div>
                </div>
                <div class="block-content block-content-full overflow-hidden">
                  <!-- Sparkline Container -->
                  <span class="js-sparkline" data-type="line"
                        data-points="{{ json_encode($orderDepositPoints) }}"
                        data-width="100%"
                        data-height="120px"
                        data-fill-color="transparent"
                        data-spot-color="transparent"
                        data-min-spot-color="transparent"
                        data-max-spot-color="transparent"
                        data-tooltip-prefix="$"></span>
                </div>
              </a>
            </div>
          </div>

          <div class="row items-push">
            <div class="col-sm-6 col-xl-3">
              <a class="block block-rounded block-fx-pop text-center h-100 mb-0" href="{{route('leads.index')}}">
                <div class="block-content block-content-full">
                  <div class="item item-circle bg-primary-lighter mx-auto my-3">
                    <i class="fa fa-file-import text-primary"></i>
                  </div>
                  <div class="display-4 fw-bold">{{$leadsCount}}</div>
                  <div class="text-muted mt-1">Leads</div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-xl-3">
              <a class="block block-rounded block-fx-pop text-center h-100 mb-0" href="{{route('quotes.index')}}">
                <div class="block-content block-content-full">
                  <div class="item item-circle bg-xinspire-lighter mx-auto my-3">
                    <i class="fa fa-question text-xinspire-dark"></i>
                  </div>
                  <div class="display-4 fw-bold">{{$quotesCount}}</div>
                  <div class="text-muted mt-1">Quotations</div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-xl-3">
              <a class="block block-rounded block-fx-pop text-center h-100 mb-0" href="javascript:void(0)">
                <div class="block-content block-content-full">
                  <div class="item item-circle bg-xsmooth-lighter mx-auto my-3">
                    <i class="fa fa-truck-fast text-xsmooth"></i>
                  </div>
                  <div class="display-4 fw-bold">{{$ordersCount}}</div>
                  <div class="text-muted mt-1">Orders</div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-xl-3">
              <a class="block block-rounded block-fx-pop text-center h-100 mb-0" href="javascript:void(0)">
                <div class="block-content block-content-full">
                  <div class="item item-circle bg-xplay-lighter mx-auto my-3">
                    <i class="fa fa-level-up-alt text-xplay"></i>
                  </div>
                  <div class="display-4 fw-bold">{{$usersCount}}</div>
                  <div class="text-muted mt-1">Users</div>
                </div>
              </a>
            </div>
          </div>
          <!-- END Overview -->
</div>
@endsection
