<h1>test</h1>
<table>
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>email</th>
        <th>password</th>
        <th>team_id</th>
        <th>login</th>
        <th>role</th>
    </tr>
@foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->password }}</td>
        <td>{{ $user->team_id }}</td>
        <td>{{ $user->login }}</td>
        <td>{{ $user->role }}</td>
    </tr>
@endforeach
</table>