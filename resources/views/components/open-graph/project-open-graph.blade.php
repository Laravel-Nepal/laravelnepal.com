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
            bottom: -150px;
            left: -150px;
            width: 600px;
            height: 600px;
            background: #ef4444;
            filter: blur(140px);
            opacity: 0.12;
            pointer-events: none;
        }

        .og-card {
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 60px;
            padding: 70px;
            display: flex;
            flex-direction: column;
            position: relative;
            z-index: 10;
        }

        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .tags-container {
            display: flex;
            flex-wrap: wrap;
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
            font-size: 82px;
            font-weight: 900;
            line-height: 1.05;
            letter-spacing: -0.05em;
            color: #ffffff;
            margin-top: 30px;
            flex: 1;
            display: flex;
            align-items: center;
        }

        .footer {
            margin-top: 40px;
            padding-top: 40px;
            border-top: 2px solid rgba(255, 255, 255, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .project-meta {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .author-name {
            color: #71717a;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .link-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #ffffff;
            font-family: 'JetBrains Mono', monospace;
            font-size: 18px;
            opacity: 0.8;
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
        <div class="project-meta">
            <div class="author-name">by {{ $model->author->name }}</div>

            @if($model->website)
                <div class="link-item">
                    {{ str_replace(['https://', 'http://'], '', $model->website) }}
                </div>
            @endif

            @if($model->github)
                <div class="link-item">
                    {{ str_replace(['https://', 'http://', 'www.'], '', $model->github_url) }}
                </div>
            @endif
        </div>

        <div class="branding">
            <span class="brand-text">PROJECT</span>
            <img src="{{ $logo }}" class="logo-img" alt="Logo">
        </div>
    </div>
</div>
</body>
</html>
