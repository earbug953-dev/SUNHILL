<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Packages - SUNHILL Admin</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: #000;
      color: #e0e0e0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      min-height: 100vh;
    }

    /* Sidebar - same as other pages */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      width: 260px;
      background: #0f0f0f;
      border-right: 1px solid #222;
      padding: 1.5rem 1rem;
      overflow-y: auto;
      z-index: 1000;
    }

    .sidebar-brand {
      font-size: 1.9rem;
      font-weight: 700;
      color: #fff;
      text-decoration: none;
      display: block;
      padding: 1rem 0 2rem;
      text-align: center;
      border-bottom: 1px solid #333;
    }

    .sidebar-brand span {
      color: #ef4444;
    }

    .nav-link {
      color: #ccc;
      padding: 0.75rem 1.25rem;
      border-radius: 8px;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 0.25rem 0;
    }

    .nav-link:hover,
    .nav-link.active {
      background: #1a1a1a;
      color: #fff;
    }

    .main-content {
      margin-left: 260px;
      padding: 2rem;
    }

    @media (max-width: 992px) {
      .sidebar { width: 220px; }
      .main-content { margin-left: 220px; }
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        border-right: none;
        border-bottom: 1px solid #222;
      }
      .main-content {
        margin-left: 0;
        padding-top: 1rem;
      }
    }

    .card-dark {
      background: #111;
      border: 1px solid #333;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.5);
      transition: transform 0.25s;
    }

    .card-dark:hover {
      transform: translateY(-6px);
    }

    .stat-icon {
      font-size: 2.8rem;
      opacity: 0.85;
    }

    .table-dark thead th {
      background: #1a1a1a;
      color: #ccc;
      border-bottom: 1px solid #444;
    }

    .table-dark td {
      border-color: #333;
      vertical-align: middle;
    }

    .badge {
      font-size: 0.9rem;
      padding: 0.5em 1em;
    }

    .badge-active   { background: #22c55e; color: white; }
    .badge-inactive { background: #6b7280; color: white; }

    .search-input {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #fff;
    }

    .search-input:focus {
      border-color: #f59e0b;
      box-shadow: 0 0 0 0.25rem rgba(245,158,11,0.25);
    }

    .btn-add-plan {
      background: #f59e0b;
      border: none;
      color: #000;
    }

    .btn-add-plan:hover {
      background: #d97706;
    }

    .pagination-compact {
        font-size: 0.875rem; /* small size */
    }

    /* Base page items */
    .pagination-compact .page-item .page-link {
        min-width: 32px;
        height: 32px;
        padding: 0.25rem 0.5rem;
        background: #1a1a1a;
        border: 1px solid #444;
        color: #bbb;
        border-radius: 6px !important;
        margin: 0 3px;
    }

    /* Active page */
    .pagination-compact .page-item.active .page-link {
        background: #f59e0b;
        border-color: #f59e0b;
        color: #000;
        font-weight: 600;
    }

    /* Hover effect */
    .pagination-compact .page-link:hover {
        background: #222;
        color: white;
    }

    /* Disabled state */
    .pagination-compact .page-item.disabled .page-link {
        opacity: 0.45;
        cursor: not-allowed;
    }

    /* Force black arrows only (previous/next icons) */
    .pagination-compact .page-link span,
    .pagination-compact .page-link i,
    .pagination-compact .page-link svg {
        color: #000 !important; /* black arrows */
    }

    /* Ensure disabled arrows stay grayish but still black-ish */
    .pagination-compact .page-item.disabled .page-link span,
    .pagination-compact .page-item.disabled .page-link i {
        color: #555 !important;
    }

  </style>
</head>
<body>

    @if (session("success"))
    <script>
        alert("{{ session('success') }}")
    </script>
    @endif

<!-- Sidebar Navigation -->
<aside class="sidebar">
  <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">SUNHILL <span>Admin</span></a>
  <nav class="mt-4">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
          <i class="bi bi-speedometer2"></i> Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.users') }}" class="nav-link">
          <i class="bi bi-people-fill"></i> Users
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.deposits') }}" class="nav-link">
          <i class="bi bi-currency-dollar"></i> Deposits
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.withdrawals') }}" class="nav-link">
          <i class="bi bi-cash-stack"></i> Withdrawals
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.packages') }}" class="nav-link active">
          <i class="bi bi-bag-check"></i> Plans / Packages
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.transactions') }}" class="nav-link">
          <i class="bi bi-receipt"></i> Transactions
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.reports') }}" class="nav-link">
          <i class="bi bi-graph-up"></i> Reports
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.settings') }}" class="nav-link">
          <i class="bi bi-gear-fill"></i> Settings
        </a>
      </li>
    </ul>

    <hr class="text-secondary my-4">

    <div class="nav-link text-danger cursor-pointer">
      <i class="bi bi-box-arrow-right"></i> Logout
    </div>
  </nav>
</aside>

<!-- Main Content -->
<main class="main-content">
  <div class="container-fluid px-0">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
      <h1 class="display-5 fw-bold mb-0">Manage Investment Plans</h1>
      <span class="text-secondary">February 24, 2026</span>
    </div>

    <!-- Quick Stats -->
    <div class="row g-4 mb-5">
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Total Plans</h5>
            <i class="bi bi-bag-check stat-icon text-warning"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">12</h2>
          <p class="text-warning small mb-0">Active packages</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Active Plans</h5>
            <i class="bi bi-rocket-takeoff-fill stat-icon text-success"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-success">8</h2>
          <p class="text-success small mb-0">Currently running</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Total Investments</h5>
            <i class="bi bi-currency-dollar stat-icon text-info"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">$8,942,670</h2>
          <p class="text-info small mb-0">Across all plans</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Avg. Return</h5>
            <i class="bi bi-graph-up-arrow stat-icon text-primary"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">248%</h2>
          <p class="text-primary small mb-0">Average total return</p>
        </div>
      </div>
    </div>

    <!-- Search & Add New Plan Button -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
      <div class="input-group input-group-lg" style="max-width: 500px;">
        <span class="input-group-text bg-dark border-secondary"><i class="bi bi-search"></i></span>
        <input type="text" class="form-control search-input" placeholder="Search by plan name...">
      </div>
      <button class="btn btn-add-plan btn-lg px-5 fw-bold" data-bs-toggle="modal" data-bs-target="#addPlanModal">
        <i class="bi bi-plus-circle me-2"></i> Add New Plan
      </button>
    </div>

    <!-- Packages Table -->
    <!-- Packages Table -->
    <div class="card card-dark shadow-lg overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
        <table class="table table-dark table-hover table-borderless mb-0">
            <thead>
            <tr>
                <th scope="col">Plan Name</th>
                <th scope="col">Min - Max Investment</th>
                <th scope="col">Daily Return</th>
                <th scope="col">Duration</th>
                <th scope="col">Total Return</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($packages as $package)
                <tr>
                <td>{{ $package->name }}</td>
                <td>${{ number_format($package->min_investment) }}
                    - ${{ $package->max_investment ? number_format($package->max_investment) : 'Unlimited' }}</td>
                <td>{{ $package->daily_return }}%</td>
                <td>{{ $package->duration_days }} days</td>
                <td>{{ $package->total_return }}%</td>
                <td>
                    <span class="badge badge-{{ $package->active ? 'active' : 'inactive' }}">
                    {{ $package->active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td>
                    <div class="btn-group btn-group-sm">
                    <!-- View button triggers modal -->
                    <button class="btn btn-outline-light"
                            data-bs-toggle="modal"
                            data-bs-target="#viewPlanModal{{ $package->id }}">
                        <i class="bi bi-eye"></i> View
                    </button>
                    <button class="btn btn-outline-warning" data-bs-toggle="modal"
                            data-bs-target="#editPlanModal{{ $package->id }}"><i class="bi bi-pencil"></i> Edit</button>
                    <button class="btn btn-outline-danger btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteConfirmModal"
                            data-plan-name="{{ addslashes($package->name) }}"
                            data-delete-url="{{ route('admin.packages.destroy', $package->id) }}">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                    </div>
                </td>
                </tr>
            @empty
                <tr>
                <td colspan="7" class="text-center text-muted py-5">
                    No packages available.
                </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-end mt-4">
    <div class="pagination-compact">
        {{ $packages->links('pagination::bootstrap-5') }}
    </div>
</div>
        </div>
    </div>
    </div>

    <!-- View Plan Modals (one per package - placed OUTSIDE the table!) -->
    @forelse ($packages as $package)
    <div class="modal fade" id="viewPlanModal{{ $package->id }}" tabindex="-1" aria-labelledby="viewPlanModalLabel{{ $package->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content card-dark border-0 shadow-lg">
            <div class="modal-header border-bottom border-secondary">
            <h5 class="modal-title fw-bold fs-4" id="viewPlanModalLabel{{ $package->id }}">
                {{ $package->name }}
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
            <div class="text-center">
                <h2 class="mb-4">{{ $package->name }}</h2>
                <div class="mb-4">
                <p class="fs-5 mb-2"><strong>Investment Range:</strong></p>
                <p>${{ number_format($package->min_investment) }} -
                    ${{ $package->max_investment ? number_format($package->max_investment) : 'Unlimited' }}</p>
                </div>
                <div class="mb-4">
                <p class="fs-5 mb-2"><strong>Daily Return:</strong></p>
                <p>{{ $package->daily_return }}% daily</p>
                </div>
                <div class="mb-4">
                <p class="fs-5 mb-2"><strong>Duration:</strong></p>
                <p>{{ $package->duration_days }} days</p>
                </div>
                <div class="mb-4">
                <p class="fs-5 mb-2"><strong>Total Return:</strong></p>
                <p class="fw-bold fs-4">{{ $package->total_return }}%</p>
                </div>
                @if($package->description)
                <div class="mb-4">
                    <p class="fs-5 mb-2"><strong>Description:</strong></p>
                    <p class="text-secondary">{{ $package->description }}</p>
                </div>
                @endif
                <p class="fs-5">
                <strong>Status:</strong>
                <span class="badge badge-{{ $package->active ? 'active' : 'inactive' }} ms-2">
                    {{ $package->active ? 'Active' : 'Inactive' }}
                </span>
                </p>
            </div>
            </div>
            <div class="modal-footer border-top border-secondary">
            <button type="button" class="btn btn-outline-light px-4" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>

    <!-- Add New Plan Modal -->
    <div class="modal fade" id="editPlanModal{{ $package->id }}" tabindex="-1" aria-labelledby="editPlanModalLabel{{ $package->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content card-dark border-0 shadow-lg">
        <div class="modal-header border-bottom border-secondary">
            <h5 class="modal-title fw-bold fs-4" id="editPlanModalLabel{{ $package->id }}">Edit Investment Plan</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
            <form action="{{ route('admin.packages.update', $package->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-4">
                <div class="col-md-12">
                <label class="form-label fw-semibold">Plan Name</label>
                <input type="text" name="name" value="{{ $package->name }}" class="form-control form-control-lg form-control-dark" placeholder="e.g., VIP AI Plan" required>
                </div>

                <div class="col-md-6">
                <label class="form-label fw-semibold">Minimum Investment</label>
                <div class="input-group input-group-lg">
                    <span class="input-group-text bg-dark border-secondary text-white">$</span>
                    <input type="number" name="min_investment" value="{{ $package->min_investment }}" class="form-control form-control-dark" min="100" placeholder="100.00" required>
                </div>
                </div>

                <div class="col-md-6">
                <label class="form-label fw-semibold">Maximum Investment</label>
                <div class="input-group input-group-lg">
                    <span class="input-group-text bg-dark border-secondary text-white">$</span>
                    <input type="number" name="max_investment" value="{{ $package->max_investment }}" class="form-control form-control-dark" placeholder="Unlimited" required>
                </div>
                </div>

                <div class="col-md-6">
                <label class="form-label fw-semibold">Daily Return (%)</label>
                <input type="number" name="daily_return" step="0.01" value="{{ $package->daily_return }}" class="form-control form-control-lg form-control-dark" placeholder="e.g., 15" required>
                </div>

                <div class="col-md-6">
                <label class="form-label fw-semibold">Duration (days)</label>
                <input type="number" name="duration_days" value="{{ $package->duration_days }}" class="form-control form-control-lg form-control-dark" placeholder="e.g., 25" required>
                </div>

                <div class="col-md-12">
                <label class="form-label fw-semibold">Total Return (%)</label>
                <input type="number" name="total_return" step="0.01" value="{{ $package->total_return }}" class="form-control form-control-lg form-control-dark" placeholder="e.g., 475" required>
                </div>

                <div class="col-md-12">
                <label class="form-label fw-semibold">Short Description</label>
                <textarea name="description" class="form-control form-control-lg form-control-dark" rows="3" placeholder="Brief description of the plan benefits...">{{ $package->description }}</textarea>
                </div>

                <div class="col-md-12 form-check form-switch mt-3">
                <input class="form-check-input" type="checkbox" name="active" id="planActive" value="1" {{ $package->active ? 'checked' : '' }}>
                <label class="form-check-label fs-5" for="planActive">Activate this plan immediately</label>
                </div>
            </div>

            <div class="modal-footer border-top border-secondary mt-4">
                <button type="button" class="btn btn-outline-light px-5 py-3" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-add-plan px-5 py-3 fw-bold">Update Plan</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark border border-danger">
        <div class="modal-header border-bottom border-danger">
            <h5 class="modal-title text-danger fw-bold" id="deleteConfirmModalLabel">Confirm Deletion</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center py-4">
            <p class="fs-5 mb-3">Are you sure you want to delete:</p>
            <h4 class="fw-bold mb-4 text-white" id="deletePlanName"></h4>
            <p class="text-danger small mb-0">This action cannot be undone.</p>
        </div>
        <div class="modal-footer border-top border-secondary">
            <button type="button" class="btn btn-outline-light px-4" data-bs-dismiss="modal">Cancel</button>
            <form id="deleteForm" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger px-4 fw-bold">Delete</button>
            </form>
        </div>
        </div>
    </div>
    </div>
    @empty
    <!-- No modal needed if empty -->
    @endforelse

  </div>
</main>

<!-- Add New Plan Modal -->
<div class="modal fade" id="addPlanModal" tabindex="-1" aria-labelledby="addPlanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content card-dark border-0 shadow-lg">
      <div class="modal-header border-bottom border-secondary">
        <h5 class="modal-title fw-bold fs-4" id="addPlanModalLabel">Add New Investment Plan</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <form action="{{ route('admin.packages.store') }}" method="POST">
          @csrf
          <div class="row g-4">
            <div class="col-md-12">
              <label class="form-label fw-semibold">Plan Name</label>
              <input type="text" name="name" class="form-control form-control-lg form-control-dark" placeholder="e.g., VIP AI Plan" required>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Minimum Investment</label>
              <div class="input-group input-group-lg">
                <span class="input-group-text bg-dark border-secondary text-white">$</span>
                <input type="number" name="min_investment" class="form-control form-control-dark" min="100" placeholder="100.00" required>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Maximum Investment</label>
              <div class="input-group input-group-lg">
                <span class="input-group-text bg-dark border-secondary text-white">$</span>
                <input type="number" name="max_investment" class="form-control form-control-dark" placeholder="Unlimited" required>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Daily Return (%)</label>
              <input type="number" name="daily_return" step="0.01" class="form-control form-control-lg form-control-dark" placeholder="e.g., 15" required>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Duration (days)</label>
              <input type="number" name="duration_days" class="form-control form-control-lg form-control-dark" placeholder="e.g., 25" required>
            </div>

            <div class="col-md-12">
              <label class="form-label fw-semibold">Total Return (%)</label>
              <input type="number" name="total_return" step="0.01" class="form-control form-control-lg form-control-dark" placeholder="e.g., 475" required>
            </div>

            <div class="col-md-12">
              <label class="form-label fw-semibold">Short Description</label>
              <textarea name="description" class="form-control form-control-lg form-control-dark" rows="3" placeholder="Brief description of the plan benefits..."></textarea>
            </div>

            <div class="col-md-12 form-check form-switch mt-3">
              <input class="form-check-input" type="checkbox" name="active" id="planActive" value="1" checked>
              <label class="form-check-label fs-5" for="planActive">Activate this plan immediately</label>
            </div>
          </div>

          <div class="modal-footer border-top border-secondary mt-4">
            <button type="button" class="btn btn-outline-light px-5 py-3" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-add-plan px-5 py-3 fw-bold">Create Plan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- view plans --}}
<script>
    const deleteModal = document.getElementById('deleteConfirmModal');

    deleteModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget;
        const planName = button.getAttribute('data-plan-name');
        const deleteUrl = button.getAttribute('data-delete-url');

        document.getElementById('deletePlanName').textContent = `"${planName}"`;
        document.getElementById('deleteForm').action = deleteUrl;
    });
</script>


<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
