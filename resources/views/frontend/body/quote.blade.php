
<!-- Bootstrap 5 required if not already in your layout -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    <style>
        .search-field-section .theme-btn {
    transform: translateY(-10px); /* Moves the button 10px up */
}

</style>


<section class="search-field-section">
    <div class="auto-container">
        <div class="inner-container text-center">
            <h2 class="mb-4"></h2>
            <p class="mb-4"></p>
            <!-- The button -->
            <button type="button" class="theme-btn btn-one" data-bs-toggle="modal" data-bs-target="#quoteModal">
                Request a Quote
            </button>
        </div>
    </div>
</section><!-- Quote Modal -->
<!-- Quote Modal -->

<div class="modal fade" id="quoteModal" tabindex="-1" aria-labelledby="quoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header with Cancel Button -->
            <div class="modal-header">
                <h5 class="modal-title" id="quoteModalLabel">Request a Quote</h5>
                <!-- Close Button in the Title Bar -->
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                <!-- Cancel Button in the Title Bar -->
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>

            <form action="{{ route('quote.send') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body px-4 py-3">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" name="name" placeholder="John Doe" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="+254..." required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="you@example.com">
                        </div>
                        <div class="col-md-6">
                            <label for="location" class="form-label">Project Location</label>
                            <input type="text" class="form-control" name="location" placeholder="Enter location" required>
                        </div>
                        <div class="col-md-12">
                            <label for="details" class="form-label">Project Details</label>
                            <textarea class="form-control" name="details" rows="4" placeholder="Tell us more about your land or survey needs..." required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="title_deed" class="form-label">Upload Title Deed (optional)</label>
                            <input type="file" class="form-control" name="title_deed" accept=".jpg,.png,.pdf">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="theme-btn btn-one">Send Request</button>
                    <!-- Cancel Button in the Footer -->
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
