<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>إضافة حصة تدريب سباحة</title>
    <!-- Bootstrap 5 CSS RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Tajawal', sans-serif;
        }
        .form-container {
            max-width: 700px;
            margin: 2rem auto;
            background: white;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 0 25px rgba(0, 119, 182, 0.1);
        }
        .header {
            color: #0077b6;
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }
        .header h1 {
            font-weight: 700;
        }
        .header::after {
            content: "";
            display: block;
            width: 80px;
            height: 4px;
            background: #00b4d8;
            margin: 10px auto;
            border-radius: 2px;
        }
        .form-label {
            font-weight: 600;
            color: #0077b6;
            margin-bottom: 0.5rem;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #ced4da;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: #00b4d8;
            box-shadow: 0 0 0 0.25rem rgba(0, 180, 216, 0.25);
        }
        .btn-submit {
            background-color: #0077b6;
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s;
            width: 100%;
            margin-top: 1rem;
        }
        .btn-submit:hover {
            background-color: #023e8a;
            transform: translateY(-2px);
        }
        .error-message {
            background-color: #ffe3e3;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-right: 4px solid #dc3545;
        }
        .error-list {
            margin-bottom: 0;
            padding-right: 1rem;
        }
        .error-list li {
            color: #dc3545;
            margin-bottom: 0.5rem;
        }
        .swim-icon {
            color: #00b4d8;
            margin-left: 8px;
        }
        .input-group-text {
            background-color: #e9f7fe;
            border-color: #ced4da;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="form-container">
            <div class="header">
                <h1><i class="bi bi-water"></i> إضافة حصة تدريب جديدة</h1>
                <p class="text-muted">املأ النموذج لإضافة حصة تدريب سباحة جديدة</p>
            </div>

            @if($errors->any())
                <div class="error-message">
                    <h5 class="text-danger"><i class="bi bi-exclamation-circle-fill"></i> يوجد أخطاء في المدخلات</h5>
                    <ul class="error-list">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('product.store') }}">
                @csrf 
                @method('post')

                <div class="mb-4">
                    <label for="name" class="form-label">
                        <i class="bi bi-tag swim-icon"></i> اسم الحصة
                    </label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="أدخل اسم الحصة التدريبية" value="{{ old('name') }}">
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="qty" class="form-label">
                            <i class="bi bi-123 swim-icon"></i> عدد الحصص
                        </label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="qty" name="qty" placeholder="عدد الحصص الأسبوعية" value="{{ old('qty') }}">
                            <span class="input-group-text">حصص/أسبوع</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="form-label">
                            <i class="bi bi-currency-dollar swim-icon"></i> السعر
                        </label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="price" name="price" placeholder="سعر الحصة" value="{{ old('price') }}">
                            <span class="input-group-text">ر.س</span>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label">
                        <i class="bi bi-card-text swim-icon"></i> الوصف
                    </label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="وصف مفصل للحصة التدريبية">{{ old('description') }}</textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-submit">
                        <i class="bi bi-save"></i> حفظ الحصة الجديدة
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // إضافة تأثيرات عند التركيز على الحقول
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('.form-label').style.color = '#00b4d8';
            });
            input.addEventListener('blur', function() {
                this.parentElement.querySelector('.form-label').style.color = '#0077b6';
            });
        });
    </script>
</body>
</html>