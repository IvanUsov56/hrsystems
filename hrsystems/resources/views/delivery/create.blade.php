<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
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

        <h2 class="display-6 text-center mb-4">Создать поставку</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-md-7 col-lg-8">
            <form method="POST" action="{{ route('delivery.store') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="receiptDate" class="form-label">Дата</label>
                        <input type="date" class="form-control" name="receipt_date" id="receipt_date" placeholder="" value="" required="">
                    </div>

                    <div class="col-sm-6">
                        <label for="box_count" class="form-label">Количество коробок</label>
                        <input type="text" class="form-control" id="box_count" name="box_count" placeholder="" value="" required="">
                    </div>

                    <div class="col-md-5">
                        <label for="warehouse" class="form-label">Склад</label>
                        <select class="form-select" id="warehouse" name="warehouse_id" required="">
                            <option value="">выбрать...</option>
                            @foreach($warehouse as $wr)
                                <option value="{{ $wr['id'] }}">{{ $wr['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit">создать</button>
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



</body></html>
