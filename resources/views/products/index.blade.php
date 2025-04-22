<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>إدارة حصص التدريب - سباحة</title>
    <!-- Bootstrap 5 CSS RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f0f8ff;
            font-family: 'Tajawal', sans-serif;
        }
        .header {
            background: linear-gradient(135deg, #1e90ff, #00bfff);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 10px 10px;
        }
        .table-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .btn-create {
            background-color: #1e90ff;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .btn-create:hover {
            background-color: #0066cc;
        }
        .btn-edit {
            background-color: #ffc107;
            border: none;
        }
        .btn-delete {
            background-color: #dc3545;
            border: none;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
        .table th {
            background-color: #1e90ff;
            color: white;
        }
        .swim-icon {
            color: #1e90ff;
            font-size: 1.2rem;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <div class="header text-center">
        <h1><i class="bi bi-water"></i> إدارة حصص تدريب السباحة</h1>
    </div>

    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('product.create') }}" class="btn btn-primary btn-create">
                <i class="bi bi-plus-circle"></i> إضافة حصة جديدة
            </a>
        </div>

        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الحصة <i class="bi bi-tag swim-icon"></i></th>
                            <th>عدد الحصص <i class="bi bi-123 swim-icon"></i></th>
                            <th>السعر <i class="bi bi-currency-dollar swim-icon"></i></th>
                            <th>الوصف <i class="bi bi-card-text swim-icon"></i></th>
                            <th>الإجراءات <i class="bi bi-gear swim-icon"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->qty }}</td>
                                <td>{{ $product->price }} ر.س</td>
                                <td>{{ Str::limit($product->description, 30) }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('product.edit', ['product' => $product]) }}" 
                                           class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i> تعديل
                                        </a>
                                        <form method="post" action="{{ route('product.destroy', ['product' => $product]) }}">
                                            @csrf 
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('هل أنت متأكد من حذف هذه الحصة؟')">
                                                <i class="bi bi-trash"></i> حذف
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // إغلاق التنبيه تلقائياً بعد 5 ثوان
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) {
                new bootstrap.Alert(alert).close();
            }
        }, 5000);
    </script>
</body>
</html>