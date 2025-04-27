@extends('dashboard')

@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Quotes /</span> All Quote Requests
    </h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Deed</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotes as $index => $quote)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $quote->name }}</td>
                        <td>{{ $quote->phone }}</td>
                        <td>{{ $quote->email ?? '-' }}</td>
                        <td>{{ $quote->location }}</td>
                        <td>
                            @if($quote->title_deed)
                                <a href="{{ asset($quote->title_deed) }}" target="_blank" class="btn btn-sm btn-primary">View</a>
                            @else
                                <span class="badge bg-secondary">N/A</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.quotes.show', $quote->id) }}" class="btn btn-sm btn-info">View</a>
                            
                            <!-- ✅ WhatsApp -->
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $quote->phone) }}" 
                               target="_blank" 
                               class="btn btn-sm btn-success" 
                               title="Reply via WhatsApp">
                                <i class="bx bxl-whatsapp"></i>
                            </a>
                        
                            <form action="{{ route('admin.quotes.destroy', $quote->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection