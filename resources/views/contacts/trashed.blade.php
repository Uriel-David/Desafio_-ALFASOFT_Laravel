<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('includes.head')
    <body>
        @include('includes.header')

        <div class="container">
            <a href="{{ route('contact.restoreAll') }}" class="btn btn-primary">Restore All Contacts</a>
            <table class="table table-dark mt-2">
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
                    @foreach($contacts as $contact)
                        <tr>
                            <th scope="row">{{ $contact->id }}</th>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->contact }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ date('d/m/Y', strtotime($contact->created_at)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($contact->updated_at)) }}</td>
                            <td>
                                <a href="{{ route('contact.restore', $contact->id) }}">Restore Contact</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('includes.footer')
        @include('includes.scripts')
    </body>
</html>
