{{-- resources/views/tabulation-form.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SSCF - Tabulation Form</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('images/Logo.png') }}" />

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous"
  />
  <!-- Fonts/Icons -->
  <link
    href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap"
    rel="stylesheet"
  />
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css"
    rel="stylesheet"
  />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
  />

  <style>
    /* 
      --- COLOR PALETTE ---
      #01210F (Dark green)
      #14591D (Medium green)
      #E1E289 (Light greenish) - use sparingly
      #FCE7D9 (Pale peach) - use sparingly
    */

    /* Page background and overall font styling */
    body {
      font-family: 'Arial', sans-serif;
      background-color: #FFFFFF; /* Keep main background clean/white */
      color: #01210F;
      margin: 0;
      padding: 0;
    }

    h1, h3, h4, h5, h6 {
      font-family: 'Yeseva One', cursive;
    }

    /* Override some Bootstrap classes with our custom colors */
    .bg-primary {
      background-color: #14591D !important; /* Medium green */
      border-color: #14591D !important;
    }
    .text-primary {
      color: #14591D !important;
    }
    .btn-dark {
      background-color: #01210F !important; /* Dark green */
      border-color: #01210F !important;
    }
    .btn-dark:hover {
      background-color: #14591D !important; /* Medium green on hover */
      border-color: #14591D !important;
    }
    .btn-success {
      background-color: #14591D !important; /* Medium green */
      border-color: #01210F !important;
    }
    .btn-success:hover {
      background-color: #01210F !important; /* Dark green */
      border-color: #01210F !important;
    }

    /* Card border, box shadow, header styling */
    .card {
      border: 1px solid #14591D;
      border-radius: 0.5rem;
    }
    .card-header {
      border-bottom: 1px solid #14591D !important;
    }

    /* Table styling */
    .table thead th {
      background-color: #01210F; /* Dark green */
      color: #E1E289; /* Light greenish text */
      border-color: #14591D;
    }
    .table tbody tr:hover {
      background-color: #FCE7D9 !important; /* Pale peach hover */
    }
    .table-bordered > :not(caption) > * > * {
      border-color: #14591D !important;
    }

    /* Alerts styling (optional - keep it subtle) */
    .alert-info {
      background-color: #FCE7D9;
      color: #01210F;
      border-left: 5px solid #14591D;
    }
    .alert-success {
      background-color: #E1E289;
      color: #01210F;
      border-left: 5px solid #14591D;
    }
    .alert-danger {
      border-left: 5px solid #dc3545 !important;
    }

    /* Dropdown items */
    .dropdown-item {
      font-size: 0.95rem;
      padding: 0.5rem 1rem;
    }
    .dropdown-item:hover {
      background-color: #E1E289;
      color: #01210F;
    }

    /* Modal header text color override */
    .modal-header h5.modal-title {
      color: #14591D;
    }

    /* Score input field focus effect */
    .score-input:focus {
      outline: 2px solid #14591D;
      box-shadow: 0 0 5px #14591D;
    }

    /* Judge Name & Icon */
    .judge-icon {
      margin-right: 8px; /* space between icon and name */
    }
  </style>
</head>

<body>
@php
    // The logged-in judge's info
    $judge     = $judge ?? null;
    $judgeName = $judge ? $judge->name : 'Unknown';
@endphp

<div class="container mt-5">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Tabulation Form</h1>
        <div class="dropdown">
            <button
                class="btn btn-dark dropdown-toggle px-4 py-2"
                type="button"
                id="dropdownMenuButton"
                data-bs-toggle="dropdown"
                aria-expanded="false"
            >
                <i class="fas fa-user judge-icon"></i> {{ $judgeName }}
            </button>
            <ul
                class="dropdown-menu dropdown-menu-end shadow"
                aria-labelledby="dropdownMenuButton"
            >
                <li>
                    <form
                        action="{{ route('judgelogout') }}"
                        method="POST"
                        class="d-inline"
                    >
                        @csrf
                        <button
                            type="submit"
                            class="dropdown-item text-danger d-flex align-items-center"
                        >
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <!-- Welcome Message -->
    <div class="alert alert-info">
        <strong>Welcome, {{ $judgeName }}</strong>. Use the form below to submit scores for your assigned pageants.
    </div>

    <!-- Display Success and Error Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
        </div>
    @endif

    <!-- Assigned Pageants and Participants -->
    <div class="card mt-5 shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Assigned Pageants</h4>
        </div>
        <div class="card-body">
            @if($pageants->count() > 0)
                @foreach($pageants as $pageant)
                    <div class="mb-4">
                        <h3 class="text-success">{{ $pageant->name }}</h3>
                        <p>
                            <strong>Description:</strong>
                            {{ $pageant->description ?? 'No description available' }}
                        </p>
                        <p>
                            <strong>Date:</strong>
                            {{ \Carbon\Carbon::parse($pageant->date)->format('F d, Y') }}
                        </p>

                        <h5>Categories and Scores</h5>
                        @if($pageant->categories->count() > 0)
                            @foreach($pageant->categories as $category)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h6 class="text-secondary mb-3">
                                            <strong>Category:</strong> {{ $category->name }}
                                        </h6>

                                        <!-- If category is locked, show a message instead of the form -->
                                        @if($category->locked)
                                            <div class="alert alert-danger">
                                                <strong>This category is locked.</strong> No further edits allowed.
                                            </div>
                                        @else
                                            <!-- Category is not locked -> show scoring form -->
                                            @if($category->criteria->count() > 0)
                                                @if($pageant->participants->count() > 0)
                                                    <!-- One form for each category -->
                                                    <form
                                                        action="{{ route('submit-scores') }}"
                                                        method="POST"
                                                        id="categoryForm{{ $category->id }}"
                                                    >
                                                        @csrf
                                                        <!-- We'll send pageant_id and category_id in hidden fields -->
                                                        <input
                                                          type="hidden"
                                                          name="pageant_id"
                                                          value="{{ $pageant->id }}"
                                                        />
                                                        <input
                                                          type="hidden"
                                                          name="category_id"
                                                          value="{{ $category->id }}"
                                                        />

                                                        <table class="table table-bordered table-hover text-center align-middle">
                                                            <thead class="table-dark">
                                                                <tr>
                                                                    <th>Rank</th>
                                                                    <th>Candidate</th>
                                                                    @foreach($category->criteria as $criterion)
                                                                        <th>
                                                                            {{ $criterion->name }}
                                                                            ({{ $criterion->weight }}%)
                                                                        </th>
                                                                    @endforeach
                                                                    <th>Category Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($pageant->participants as $participant)
                                                                    <tr>
                                                                        <td class="align-middle font-weight-bold">
                                                                            {{ $loop->iteration }}
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            {{ $participant->name }}
                                                                        </td>

                                                                        @foreach($category->criteria as $criterion)
                                                                            <td>
                                                                                <input
                                                                                    type="number"
                                                                                    name="scores[{{ $participant->id }}][{{ $criterion->id }}]"
                                                                                    class="form-control score-input"
                                                                                    min="0"
                                                                                    max="{{ $criterion->weight }}"
                                                                                    step="0.01"
                                                                                    data-participant-id="{{ $participant->id }}"
                                                                                    data-criterion-id="{{ $criterion->id }}"
                                                                                    data-weight="{{ $criterion->weight }}"
                                                                                    value="{{ old('scores.' . $participant->id . '.' . $criterion->id, '') }}"
                                                                                    required
                                                                                />
                                                                            </td>
                                                                        @endforeach

                                                                        <td>
                                                                            <input
                                                                                type="text"
                                                                                class="form-control total-score fw-bold"
                                                                                id="total-{{ $category->id }}-{{ $participant->id }}"
                                                                                value="0.00"
                                                                                disabled
                                                                            />
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                        <!-- "Save Scores" button + confirmation modal -->
                                                        <div class="text-center mt-3">
                                                            <!-- Button triggers a modal -->
                                                            <button
                                                                type="button"
                                                                class="btn btn-success px-4 save-category-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#saveCategoryModal{{ $category->id }}"
                                                            >
                                                                Save Scores for "{{ $category->name }}"
                                                            </button>
                                                        </div>

                                                        <!-- Confirmation Modal -->
                                                        <div
                                                            class="modal fade"
                                                            id="saveCategoryModal{{ $category->id }}"
                                                            tabindex="-1"
                                                            aria-labelledby="saveCategoryModalLabel{{ $category->id }}"
                                                            aria-hidden="true"
                                                        >
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5
                                                                            class="modal-title"
                                                                            id="saveCategoryModalLabel{{ $category->id }}"
                                                                        >
                                                                            Confirm Save Scores
                                                                        </h5>
                                                                        <button
                                                                            type="button"
                                                                            class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"
                                                                        ></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Are you sure you want to save (and lock) scores for category
                                                                        <strong>"{{ $category->name }}"</strong>?
                                                                        <br><br>
                                                                        Once saved, this category will be locked and you cannot change these scores again.
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button
                                                                            type="button"
                                                                            class="btn btn-secondary"
                                                                            data-bs-dismiss="modal"
                                                                        >
                                                                            Cancel
                                                                        </button>
                                                                        <button
                                                                            type="submit"
                                                                            class="btn btn-primary"
                                                                            form="categoryForm{{ $category->id }}"
                                                                        >
                                                                            Yes, Save & Lock
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                @else
                                                    <p class="text-danger">No participants found for this pageant.</p>
                                                @endif
                                            @else
                                                <p class="text-danger">No criteria found for this category.</p>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No categories found for this pageant.</p>
                        @endif
                    </div>
                @endforeach
            @else
                <p>You are not assigned to any pageants.</p>
            @endif
        </div>
    </div>
</div>

<!-- Modal for Exceeding Weight -->
<div
    class="modal fade"
    id="exceedWeightModal"
    tabindex="-1"
    aria-labelledby="exceedWeightModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">
                    Invalid Input
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                The score entered exceeds the allowed weight for this criterion.
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Negative Score -->
<div
    class="modal fade"
    id="negativeScoreModal"
    tabindex="-1"
    aria-labelledby="negativeScoreModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5
                    class="modal-title text-danger"
                    id="negativeScoreModalLabel"
                >
                    Invalid Input
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                Negative scores are not allowed.
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Handling Score Inputs and Local Storage -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scoreInputs = document.querySelectorAll('.score-input');

        // Load previously saved values from local storage (optional)
        scoreInputs.forEach(input => {
            const key = `score-${input.dataset.participantId}-${input.dataset.criterionId}`;
            const savedValue = localStorage.getItem(key);
            if (savedValue) {
                input.value = savedValue;
            }
        });

        // Save values on input change, handle negative or exceeding
        scoreInputs.forEach(input => {
            input.addEventListener('input', function() {
                const participantId = this.dataset.participantId;
                const criterionId   = this.dataset.criterionId;
                const weight        = parseFloat(this.dataset.weight);
                let value           = parseFloat(this.value) || 0;

                // Prevent negative score
                if (value < 0) {
                    this.value = 0;
                    const negativeModal = new bootstrap.Modal(document.getElementById('negativeScoreModal'));
                    negativeModal.show();
                    value = 0;
                }

                // Prevent exceeding the allowed weight
                if (value > weight) {
                    this.value = weight;
                    const exceedModal = new bootstrap.Modal(document.getElementById('exceedWeightModal'));
                    exceedModal.show();
                    value = weight;
                }

                // Save to local storage
                const key = `score-${participantId}-${criterionId}`;
                localStorage.setItem(key, this.value);

                // Recalculate total score for the participant in THIS category
                const form = this.closest('form');
                if (!form) return;

                // Find all score inputs for this participant ID within the same form
                const rowInputs = form.querySelectorAll(`.score-input[data-participant-id="${participantId}"]`);

                let total = 0;
                rowInputs.forEach(scoreInput => {
                    const sValue  = parseFloat(scoreInput.value) || 0;
                    const sWeight = parseFloat(scoreInput.dataset.weight) || 0;
                    // Weighted sum
                    total += (sValue * sWeight) / 100;
                });

                // Update the total score field
                const categoryId = form.querySelector('input[name="category_id"]').value;
                const totalField = form.querySelector(`#total-${categoryId}-${participantId}`);
                if (totalField) {
                    totalField.value = total.toFixed(2);
                }
            });
        });
    });
</script>

<!-- Bootstrap JS Bundle with Popper -->
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
></script>
</body>
</html>
