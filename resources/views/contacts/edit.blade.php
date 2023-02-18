<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('includes.head')
    <body>
        @include('includes.header')

        <div class="container" style="background-color: azure; padding: 12px; border-radius: 6px;">
            <form action="{{ route('contact.update', $contact->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" minlength="5" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Enter name" value="{{ $contact->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ $contact->email }}" required>
                </div>
                <div class="form-group">
                    <label for="contact">Contact:</label>
                    <input type="tel" maxlength="9" minlength="9" class="form-control" id="contact" name="contact" placeholder="Enter phone" value="{{ $contact->contact }}" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>

        @include('includes.footer')
        @include('includes.scripts')
    </body>
</html>