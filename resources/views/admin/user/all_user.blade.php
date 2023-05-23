<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kullanıcılar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin/user/allUser.css">
</head>

<body>

    <div class="users-area">
        <form>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="search-user-area mb-5">
                        <input type="text" class="search-user" placeholder="Kullanıcı arayın">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 header-item">ID</div>
                <div class="col-md-3 header-item">Ad</div>
                <div class="col-md-3 header-item">Email</div>
                <div class="col-md-2 header-item">Düzenle</div>
                <div class="col-md-2 header-item">Sil</div>
            </div>
            <div class="user-area mt-4">
                <div class="all-user">
                    @foreach ($users as $user)
                        <div class="user mt-2">
                            <div class="row">
                                <div class="col-md-2 mt-1">{{ $user->id }}</div>
                                <div class="col-md-3 mt-1">{{ $user->name }}</div>
                                <div class="col-md-3 mt-1">{{ $user->email }}</div>
                                <div class="col-md-2 mt-1">
                                    <button type="button" class="edit-btn editUser"
                                        value="{{ $user->id }}">Düzenle</button>
                                </div>
                                <div class="col-md-2 mt-1">
                                    <button type="button" class="delete-btn deleteUser"
                                        value="{{ $user->id }}">Sil</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="searched-user mt-2">

                </div>
            </div>
            <div class="edit-delete-area">
                <form>
                    <div class="edit-user-area">
                        <div class="close-btn-area mt-2">
                            <button type="button" class="close-btn closeEditArea">X</button>
                        </div>
                        <div class="input-area mt-2 mb-2">
                            <input name="name" type="text" id="editName" class="input-txt">
                        </div>
                        <div class="input-area mt-2 mb-2">
                            <input name="email" type="text" id="editEmail" class="input-txt">
                        </div>
                        <div class="input-area mt-2 mb-2">
                            <a href="#" class="input-txt">Kütüphaneler</a>
                        </div>
                        <div class="input-area mt-2 mb-2">
                            <button type="button" id="saveBtn" class="input-btn">Kaydet</button>
                        </div>
                    </div>
                    <div class="delete-user-area">
                        <div class="close-btn-area mt-2">
                            <button type="button" class="close-btn closeDeleteArea">X</button>
                        </div>
                        <div class="input-area mt-2 mb-2">
                            <input name="name" type="text" id="deleteName" class="input-txt userName">
                        </div>
                        <div class="input-area mt-2 mb-2">
                            <input name="email" type="text" id="deleteEmail" class="input-txt userEmail">
                        </div>
                        <div class="input-area mt-2 mb-2">
                            <button type="button" id="deleteBtn" class="delete-btn">Sil</button>
                        </div>
                    </div>
                </form>
            </div>
        </form>
    </div>
    @if ($users->lastPage() > 1)
        <ul class="pagination">
            <li class="{{ $users->currentPage() == 1 ? ' disabled' : '' }}">
                <a href="{{ $users->url(1) }}">First</a>
            </li>
            @for ($i = 1; $i <= $users->lastPage(); $i++)
                <li class="{{ $users->currentPage() == $i ? ' active' : '' }}">
                    <a href="{{ $users->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="{{ $users->currentPage() == $users->lastPage() ? ' disabled' : '' }}">
                <a href="{{ $users->url($users->currentPage() + 1) }}">Next</a>
            </li>
            <li>
                <a href="{{ $users->url($users->lastPage()) }}">Last</a>
            </li>
        </ul>
    @endif



    <!--SCRIPT SECTION-->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script src="/js/admin/user/crudUser.js"></script>

    <script src="/js/admin/user/searchUser.js"></script>
</body>

</html>
