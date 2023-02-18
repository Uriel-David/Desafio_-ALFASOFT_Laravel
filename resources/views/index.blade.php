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
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <th scope="row">{{ $contact->id }}</th>
                            <td><a href="{{ route('contact.show', $contact->id) }}">{{ $contact->name }}</a></td>
                            <td>{{ $contact->contact }}</td>
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
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('includes.footer')
        @include('includes.scripts')
    </body>
</html>
