<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        /* Standard Inter Font for UI and JetBrains for Code-like elements */
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
            padding: 20px;
        }

        .og-card {
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 60px;
            padding: 50px;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }

        .card-header {
            max-height: 240px;
            border-radius: 30px;
            margin-bottom: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            position: relative;
        }

        .badge {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #ef4444;
            padding: 8px 20px;
            border-radius: 99px;
            font-size: 18px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .date {
            color: #a1a1aa;
            font-family: 'JetBrains Mono', monospace;
            text-transform: uppercase;
            letter-spacing: 0.3em;
            font-size: 18px;
            margin-bottom: 15px;
        }

        .title {
            font-size: 64px;
            font-weight: 900;
            line-height: 1.1;
            letter-spacing: -0.02em;
            margin-top: 25px;
            margin-bottom: 25px;
            color: #ffffff;
        }

        .footer {
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .author-info {
            color: #a1a1aa;
            font-size: 22px;
            font-weight: 700;
        }

        .author-info span {
            color: #71717a;
            margin: 0 10px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-img {
            width: 70px;
            height: 70px;
            border-radius: 15px;
            object-fit: cover;
            background: #faf9fe;
            padding: 8px;
        }

        .brand-name {
            font-family: 'JetBrains Mono', monospace;
            font-weight: 700;
            font-size: 24px;
            color: #ef4444;
        }
    </style>
</head>
<body>
<div class="og-card">
    <div class="card-header">
        @foreach($post->tags as $tag)
            <div class="badge">{{ ucwords($tag) }}</div>
        @endforeach
    </div>

    <div class="date">
        {{ $post->date->format('M d, Y') }}
    </div>

    <h1 class="title">
        {{ $post->title }}
    </h1>

    <div class="footer">
        <div class="author-info">
            {{ $post->author->name }} <span>&middot;</span> {{ $post->minutes_read_text }}
        </div>

        <div class="logo-container">
            <img src="{{ $logo }}" class="logo-img" alt="{{ config('app.name') }} Logo">
        </div>
    </div>
</div>
</body>
</html>
