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
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        .og-card {
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 60px;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            z-index: 10;
            overflow: hidden;
        }

        .username-watermark {
            position: absolute;
            top: -30px;
            right: -20px;
            font-size: 200px;
            font-weight: 900;
            font-style: italic;
            text-transform: uppercase;
            letter-spacing: -0.05em;
            color: white;
            opacity: 0.03;
            white-space: nowrap;
            pointer-events: none;
        }

        .profile-layout {
            display: flex;
            align-items: center;
            gap: 60px;
        }

        .avatar-container {
            position: relative;
        }

        .avatar-glow {
            position: absolute;
            inset: -15px;
            background: #ef4444;
            opacity: 0.15;
            filter: blur(35px);
            border-radius: 50px;
        }

        .avatar-img {
            position: relative;
            width: 240px;
            height: 240px;
            border-radius: 50px;
            border: 2px solid rgba(255, 45, 32, 0.3);
            object-fit: cover;
            background: #18181b;
        }

        .identity {
            flex: 1;
        }

        .identity h1 {
            font-size: 84px;
            font-weight: 900;
            line-height: 0.9;
            margin-bottom: 15px;
            letter-spacing: -0.04em;
        }

        .username-tag {
            font-family: 'JetBrains Mono', monospace;
            color: #ef4444;
            font-size: 32px;
            font-weight: 700;
            text-transform: uppercase;
            font-style: italic;
            margin-bottom: 25px;
        }

        .bio {
            font-size: 30px;
            color: #a1a1aa;
            line-height: 1.4;
            max-width: 600px;
        }

        .footer {
            margin-top: auto;
            padding-top: 20px;
            border-top: 2px solid rgba(255, 255, 255, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .artisan-meta {
            display: flex;
            flex-direction: column;
            gap: 2px;
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
<div class="og-card">
    <div class="username-watermark">{{ $model->username }}</div>
    <div class="profile-layout">
        <div class="avatar-container">
            <div class="avatar-glow"></div>
            <img src="{{ $model->avatar }}" class="avatar-img">
        </div>

        <div class="identity">
            <h1>{{ $model->name }}</h1>
            <div class="username-tag">@<span></span>{{ $model->username }}</div>
            @if($model->bio)
                <p class="bio">{{ $model->bio }}</p>
            @endif
        </div>
    </div>

    <div class="footer">
        <div class="artisan-meta">
            @if($model->website)
                <div class="link-item">
                    {{ str_replace(['https://', 'http://', 'www.'], '', $model->website) }}
                </div>
            @endif
            @if($model->github)
                <div class="link-item">
                    {{ str_replace(['https://', 'http://', 'www.'], '', $model->github_url) }}
                </div>
            @endif
            @if($model->x)
                <div class="link-item">
                    {{ str_replace(['https://', 'http://', 'www.'], '', $model->x_url) }}
                </div>
            @endif
            @if($model->linkedin)
                <div class="link-item">
                    {{ str_replace(['https://', 'http://', 'www.'], '', $model->linkedin_url) }}
                </div>
            @endif
        </div>

        <div class="branding">
            <span class="brand-text">ARTISAN</span>
            <img src="{{ $logo }}" class="logo-img">
        </div>
    </div>
</div>
</body>
</html>
