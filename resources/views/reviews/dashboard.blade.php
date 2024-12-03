<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Speaker</th>
            <th>Tags</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($talkProposals as $proposal)
        <tr>
            <td>{{ $proposal->title }}</td>
            <td>{{ $proposal->speaker->name }}</td>
            <td>{{ $proposal->tags }}</td>
            <td>{{ $proposal->status }}</td>
            <td>
                <a href="{{ route('reviews.create', $proposal->id) }}">Review</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>