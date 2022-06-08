@extends('approval.layout')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Student Proposals</div>
                    <div class="card-body">
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Proposal Status</th>
                                        <th>Proposal</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($approval as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->stud_id }}</td>
                                        <td>{{ $item->stud_name }}</td>
                                        <td>{{ $item->proposal_status }}</td>
                                        <td>{{ $item->proposal }}</td>
                                        
 
                                        <td>
                                            <a href="{{ url('approve',$item->stud_id) }}" title="Approve Proposal"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Approve</button></a>
 
                                            <form method="POST" action="{{ url('reject',$item->stud_id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Reject Proposal"><i class="fa fa-trash-o" aria-hidden="true"></i> Reject</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection