<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pricing example · Bootstrap v5.3</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>

<div class="container py-3">
    <header>
        <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
                <span class="fs-4">HRSystems</span>
            </a>

            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="/">Поставки</a>
                <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="/delivery/create">Добавить поставку</a>
            </nav>
        </div>

    </header>

    <main>

        <h2 class="display-6 text-center mb-4">Поставки</h2>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="table-responsive">
            <form method="POST" action="{{ route('delivery.destroy.selected') }}">
                @csrf

            <table class="table text-center">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Дата</th>
                    <th>
                        Кол-во коробок
                        <a href="{{ route('delivery.index', ['routeBy' => ]) }}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M3.47 7.78a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0l4.25 4.25a.751.751 0 0 1-.018 1.042.751.751 0 0 1-1.042.018L9 4.81v7.44a.75.75 0 0 1-1.5 0V4.81L4.53 7.78a.75.75 0 0 1-1.06 0Z"></path></svg></a>
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M13.03 8.22a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L3.47 9.28a.751.751 0 0 1 .018-1.042.751.751 0 0 1 1.042-.018l2.97 2.97V3.75a.75.75 0 0 1 1.5 0v7.44l2.97-2.97a.75.75 0 0 1 1.06 0Z"></path></svg></a>
                    </th>
                    <th>Склад</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <div class="list-group">
                    @foreach($deliveries as $delivery)
                    <tr>

                        <th scope="row" class="text-start">
                            <label class="list-group-item d-flex gap-2">
                                <input class="form-check-input flex-shrink-0" name="delivery_selected[]" type="checkbox" value="{{ $delivery->id }}">
                                {{ $delivery->id }}
                            </label>
                        </th>
                        <td>{{ $delivery['receipt_date'] }}</td>
                        <td>{{ $delivery['box_count'] }}</td>
                        <td>{{ $delivery->warehouse->name }}</td>
                        <td>
                            <a href="javascript:void(0);" onclick="deleteDelivery({{ $delivery->id }})">удалить</a>
                        </td>
                    </tr>
                @endforeach
                </div>
                </tbody>

            </table>

                <button type="submit">{{ __('Удалить выбранные') }}</button>
            </form>
        </div>
    </main>

    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
            <div class="col-12 col-md">
                <small class="d-block mb-3 text-body-secondary">© 2017–2023</small>
            </div>
        </div>
    </footer>
</div>



</body>
<script type="text/javascript">

    function deleteDelivery(deliveryId) {
        if (confirm('Вы уверены, что хотите удалить эту запись?')) {
            fetch('delivery/' + deliveryId, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ id: deliveryId })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log(data.message);
                        window.location.reload();
                    } else {
                        console.error('Произошла ошибка: ', data.message);
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }
    }

</script>
</html>
