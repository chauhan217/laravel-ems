<form action="{{ route('talk_proposals.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="speaker_id" value="1">
    <input type="text" name="title" placeholder="Title" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <input type="text" name="tags" placeholder="Tags" required>
    <input type="file" name="file" accept="application/pdf">
    <button type="submit">Submit Proposal</button>
</form>