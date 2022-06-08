<!DOCTYPE html>
<html lang="en">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Project list</h2>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Proposal</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($approval as $approval)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $approval->stud_id }}</td>
            <td>{{ $approval->stud_name }}</td>
            <td>{{ $approval->stud_proposal }}</td>
            <td>{{ $approval->proposal_status }}</td>
            <td>
                <form action="{{ route('approval.reject',$approval->stud_id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('approval.approve',$approval->stud_id) }}">Approve</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Reject</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $approval->links() !!}
    </html>