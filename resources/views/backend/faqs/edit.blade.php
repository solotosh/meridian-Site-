@extends('dashboard')
@section('main')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">FAQ /</span> Edit FAQ
    </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.faqs.update',$faq->id) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Question</label>
                    <input type="text" name="question" class="form-control" value="{{ $faq->question }}" >
                </div>

                <div class="mb-3">
                    <label class="form-label">Answer</label>
                    <textarea name="answer" class="form-control" rows="5" required>

                        {!! $faq->answer!!}
                    </textarea>
                </div>

                <button type="submit" class="btn btn-success">Save FAQ</button>
            </form>
        </div>
    </div>
</div>

@endsection
