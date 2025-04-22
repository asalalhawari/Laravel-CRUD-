<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تعديل حصة تدريب سباحة</title>
    <!-- Bootstrap 5 CSS RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #0066cc;
            --secondary-color: #00b4d8;
            --light-blue: #e6f2ff;
        }
        body {
            background-color: #f8f9fa;
            font-family: 'Tajawal', sans-serif;
        }
        .edit-container {
            max-width: 700px;
            margin: 3rem auto;
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0, 102, 204, 0.1);
        }
        .page-header {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 2.5rem;
            position: relative;
            padding-bottom: 1rem;
        }
        .page-header h1 {
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .page-header h1:after {
            content: "";
            display: inline-block;
            width: 40px;
            height: 3px;
            background: var(--secondary-color);
            margin-right: 15px;
            margin-left: 15px;
            position: relative;
            top: -3px;
        }
        .form-label {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #ced4da;
            transition: all 0.3s;
            background-color: #f8f9fa;
        }
        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(0, 180, 216, 0.15);
            background-color: white;
        }
        .btn-update {
            background-color: var(--primary-color);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s;
            width: 100%;
            margin-top: 1.5rem;
            border-radius: 8px;
        }
        .btn-update:hover {
            background-color: #004d99;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 102, 204, 0.2);
        }
        .error-container {
            background-color: #fff3f3;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-right: 4px solid #dc3545;
        }
        .error-title {
            color: #dc3545;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }
        .error-list {
            padding-right: 1.5rem;
            margin-bottom: 0;
        }
        .error-list li {
            color: #dc3545;
            margin-bottom: 0.5rem;
            position: relative;
            padding-right: 1.5rem;
        }
        .error-list li:before {
            content: "";
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 8px;
            height: 8px;
            background-color: #dc3545;
            border-radius: 50%;
        }
        .input-icon {
            color: var(--secondary-color);
            margin-left: 8px;
            font-size: 1.1rem;
        }
        .input-group-text {
            background-color: var(--light-blue);
            border-color: #ced4da;
            color: var(--primary-color);
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="edit-container">
            <div class="page-header">
                <h1>
                    <i class="bi bi-pencil-square"></i>
                    تعديل حصة تدريب السباحة
                    <i class="bi bi-water"></i>
                </h1>
                <p class="text-muted">قم بتعديل بيانات حصة التدريب حسب الحاجة</p>
            </div>

            @if($errors->any())
                <div class="error-container">
                    <h5 class="error-title">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        يرجى تصحيح الأخطاء التالية
                    </h5>
                    <ul class="error-list">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('product.update', ['product' => $product]) }}">
                @csrf 
                @method('put')

                <div class="mb-4">
                    <label for="name" class="form-label">
                        <i class="bi bi-tag input-icon"></i>
                        اسم الحصة التدريبية
                    </label>
                    <input type="text" class="form-control" id="name" name="name" 
                           placeholder="أدخل اسم الحصة التدريبية" value="{{ old('name', $product->name) }}">
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="qty" class="form-label">
                            <i class="bi bi-123 input-icon"></i>
                            عدد الحصص
                        </label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="qty" name="qty" 
                                   placeholder="عدد الحصص الأسبوعية" value="{{ old('qty', $product->qty) }}">
                            <span class="input-group-text">حصص/أسبوع</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="form-label">
                            <i class="bi bi-currency-dollar input-icon"></i>
                            سعر الحصة
                        </label>
                        <div class="input-group">
                            <input type="number" step="0.01" class="form-control" id="price" name="price" 
                                   placeholder="سعر الحصة" value="{{ old('price', $product->price) }}">
                            <span class="input-group-text">ر.س</span>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label">
                        <i class="bi bi-card-text input-icon"></i>
                        وصف الحصة
                    </label>
                    <textarea class="form-control" id="description" name="description" 
                              rows="4" placeholder="وصف مفصل للحصة التدريبية">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('product.index') }}" class="btn btn-outline-secondary" style="width: 48%;">
                        <i class="bi bi-arrow-right"></i> رجوع
                    </a>
                    <button type="submit" class="btn btn-primary btn-update" style="width: 48%;">
                        <i class="bi bi-check-circle"></i> حفظ التعديلات
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // تأثيرات عند التركيز على الحقول
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.parentElement.querySelector('.form-label').style.color = 'var(--secondary-color)';
            });
            input.addEventListener('blur', function() {
                this.parentElement.parentElement.querySelector('.form-label').style.color = 'var(--primary-color)';
            });
        });
    </script>
</body>
</html>