<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&family=JetBrains+Mono:wght@700&display=swap');

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            width: 1200px;
            height: 630px;
            background-color: #09090b;
            color: #fafafa;
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        /* Subtle Glow - shifted to bottom-right for warmth */
        .glow {
            position: absolute;
            bottom: -150px;
            right: -150px;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(239, 68, 68, 0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        .brand-watermark {
            position: absolute;
            bottom: -50px;
            left: -20px;
            font-size: 160px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: -0.05em;
            color: white;
            opacity: 0.02;
            white-space: nowrap;
            pointer-events: none;
            z-index: 1;
        }

        .og-card {
            width: 100%;
            height: 100%;
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0.01) 100%);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 48px;
            padding: 80px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            z-index: 10;
            overflow: hidden;
        }

        .og-card::before {
            content: '';
            position: absolute;
            left: 40px;
            top: 80px;
            bottom: 80px;
            width: 4px;
            background: #ef4444;
            border-radius: 2px;
            opacity: 0.5;
        }

        .content-area {
            padding-left: 20px;
        }

        .title {
            font-size: 84px;
            font-weight: 900;
            line-height: 1.1;
            letter-spacing: -0.04em;
            color: #ffffff;
            margin-top: 24px;
            margin-bottom: 24px;
            max-width: 900px;
        }

        .description {
            font-family: 'JetBrains Mono', monospace;
            color: #919191;
            font-size: 28px;
            font-weight: 500;
            letter-spacing: 0.2em;
            padding-top: 20px;
        }

        .tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .badge {
            font-family: 'JetBrains Mono', monospace;
            color: #71717a;
            font-size: 18px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.2em;
        }

        .badge::before {
            content: '// ';
            color: #ef4444;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            padding-left: 20px;
        }

        .url-text {
            font-family: 'JetBrains Mono', monospace;
            color: #989898;
            font-size: 22px;
            letter-spacing: 0.05em;
        }

        .logo-img {
            width: 90px;
            height: 90px;
            border-radius: 24px;
            background: #ffffff;
            padding: 12px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        }
    </style>
</head>
<body>
<div class="glow"></div>

<div class="og-card">
    <div class="brand-watermark">LARAVEL NEPAL</div>
    <div class="content-area">
        <div class="tags-container">
            @foreach($model->tags as $tag)
                <div class="badge">{{ $tag }}</div>
            @endforeach
        </div>

        <h1 class="title">
            {{ $model->title }}
        </h1>

        <div class="description">
            {{ $model->description }}
        </div>
    </div>

    <div class="footer">
        <div class="url-text">laravelnepal.com</div>
        <img src="{{ $logo }}" class="logo-img" alt="Logo">
    </div>
</div>
</body>
</html>
