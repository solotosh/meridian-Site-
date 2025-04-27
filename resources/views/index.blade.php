@extends('dashboard')

@section('main')
@php
use App\Models\Quote;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

// Generate the past 6 months
$monthsList = collect(range(5, 0))->map(fn($i) => Carbon::now()->subMonths($i)->format('M')); // ['Nov', 'Dec',...]
$monthKeys = collect(range(5, 0))->map(fn($i) => Carbon::now()->subMonths($i)->format('Y-m')); // ['2024-11', '2024-12',...]

// Fetch unique clients per month
$rawQuotes = Quote::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(DISTINCT phone) as total')
    ->groupBy('month')
    ->pluck('total', 'month');

$totals = $monthKeys->map(fn($m) => $rawQuotes[$m] ?? 0);
$months = $monthsList->toArray();

$totalClients = Quote::distinct('phone')->count('phone');

$blogCategories = Blog::selectRaw("category, COUNT(*) as total")
    ->groupBy('category')
    ->pluck('total', 'category');
@endphp

<!-- Load ApexCharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.42.0/dist/apexcharts.min.js"></script>

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">

    <!-- Total Unique Clients Card -->
    <div class="col-md-4 mb-4">
      <div class="card text-center">
        <div class="card-body">
          <h6 class="card-subtitle text-muted">Total Unique Clients</h6>
          <h3 class="card-title mt-2">{{ number_format($totalClients) }}</h3>
        </div>
      </div>
    </div>

    <!-- Monthly Unique Clients Bar Chart -->
    <div class="col-md-8 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Monthly Unique Clients</h5>
          <div id="clientsBarChart" style="height: 350px;"></div>
        </div>
      </div>
    </div>

    <!-- Blog Category Pie Chart -->
    <div class="col-md-12 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Blog Category Distribution</h5>
          <div id="blogPieChart" style="height: 350px;"></div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Chart Rendering Scripts -->
<script>
document.addEventListener("DOMContentLoaded", function () {
  // Bar Chart
  new ApexCharts(document.querySelector("#clientsBarChart"), {
    chart: { type: 'bar', height: 350 },
    series: [{ name: 'Unique Clients', data: @json($totals) }],
    xaxis: { categories: @json($months), title: { text: 'Month' }},
    yaxis: { title: { text: 'Clients' }},
    colors: ['#00b894']
  }).render();

  // Pie Chart
  new ApexCharts(document.querySelector("#blogPieChart"), {
    chart: { type: 'pie', height: 350 },
    series: @json($blogCategories->values()),
    labels: @json($blogCategories->keys()),
    colors: ['#1abc9c', '#3498db', '#9b59b6', '#f39c12', '#e74c3c']
  }).render();
});
</script>
@endsection
