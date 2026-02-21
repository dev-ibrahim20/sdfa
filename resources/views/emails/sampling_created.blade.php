<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تم إنشاء عينة جديدة</title>
</head>
<body>
    <h1>تم إنشاء عينة جديدة</h1>
    <p>تم إنشاء عينة جديدة بالتفاصيل التالية:</p>
    <ul>
        <li><strong>معرف العينة:</strong> {{ $sampling->id }}</li>
        <li><strong>تاريخ الإنشاء:</strong> {{ $sampling->created_at }}</li>
    </ul>
    <p>
        لعرض المزيد من التفاصيل، يرجى زيارة الرابط التالي: <br>
        <a href="{{ url(config('settings.BackendPath') . '/samplings?order_number=' . $sampling->id) }}">
            عرض تفاصيل العينة
        </a>
        
    </p>
</body>
</html>
