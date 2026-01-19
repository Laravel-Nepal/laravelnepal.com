<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&family=JetBrains+Mono:wght@700&display=swap');

        * { box-sizing: border-box; margin: 0; padding: 0; }

        html {
            max-width: 1200px;
            max-height: 630px;
            overflow: hidden;
        }

        body {
            width: 1200px;
            height: 630px;
            background-color: #09090b;
            color: #fafafa;
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        .glow {
            position: absolute;
            bottom: -120px;
            right: -120px;
            width: 550px;
            height: 550px;
            background: #ef4444;
            filter: blur(130px);
            opacity: 0.12;
            pointer-events: none;
        }

        .og-card {
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 60px;
            padding: 65px;
            display: flex;
            flex-direction: column;
            position: relative;
            z-index: 10;
        }

        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .date {
            color: #71717a; /* Zinc 500 */
            font-family: 'JetBrains Mono', monospace;
            text-transform: uppercase;
            letter-spacing: 0.3em;
            font-size: 18px;
        }

        .tags-container {
            display: flex;
            gap: 12px;
        }

        .badge {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #ef4444;
            padding: 10px 22px;
            border-radius: 99px;
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .title {
            font-size: 76px;
            font-weight: 900;
            line-height: 1.05;
            letter-spacing: -0.04em;
            color: #ffffff;
            flex: 1;
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .footer {
            margin-top: 40px;
            padding-top: 40px;
            border-top: 2px solid rgba(255, 255, 255, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .author-info {
            color: #a1a1aa;
            font-size: 24px;
            font-weight: 700;
        }

        .author-info span {
            color: #3f3f46;
            margin: 0 10px;
        }

        .branding {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .brand-text {
            font-family: 'JetBrains Mono', monospace;
            font-weight: 700;
            font-size: 22px;
            color: #ef4444;
            letter-spacing: 0.1em;
        }

        .logo-img {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            object-fit: cover;
            background: #faf9fe;
            padding: 8px;
        }
    </style>
</head>
<body>
<div class="glow"></div>

<div class="og-card">
    <div class="header-row">
        <div class="date">
            {{ $model->date->format('M d, Y') }}
        </div>
        <div class="tags-container">
            @foreach($model->tags as $tag)
                <div class="badge">{{ ucwords($tag) }}</div>
            @endforeach
        </div>
    </div>

    <h1 class="title">
        {{ $model->title }}
    </h1>

    <div class="footer">
        <div class="author-info">
            {{ $model->author->name }} <span>&middot;</span> {{ $model->minutes_read_text }}
        </div>

        <div class="branding">
            <span class="brand-text">BLOG</span>
            <img src="{{ $logo }}" class="logo-img" alt="Logo">
        </div>
    </div>
</div>
</body>
</html>
