<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('includes.head')
    <body>
        @include('includes.header')

        <div class="container">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{ $contact->id }}</th>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->contact }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ date('d/m/Y', strtotime($contact->created_at)) }}</td>
                        <td>{{ date('d/m/Y', strtotime($contact->updated_at)) }}</td>
                        <td>
                            <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-info">update</a>
                            &nbsp;|&nbsp;
                            <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" value="{{ $contact->id }}" />
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        @include('includes.footer')
        @include('includes.scripts')
    </body>
</html>
