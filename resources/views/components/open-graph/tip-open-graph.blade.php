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

        /* The Tip Card Glow effect in the bottom right */
        .glow {
            position: absolute;
            bottom: -100px;
            right: -100px;
            width: 500px;
            height: 500px;
            background: #ef4444; /* Laravel Red */
            filter: blur(120px);
            opacity: 0.15;
            pointer-events: none;
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
            position: relative;
            z-index: 10;
        }

        /* Top row with Date and Tags */
        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
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
            padding: 8px 20px;
            border-radius: 99px;
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .title {
            font-size: 72px; /* Slightly larger for Tips since there is no image header */
            font-weight: 900;
            line-height: 1.1;
            letter-spacing: -0.03em;
            color: #ffffff;
            flex: 1; /* Pushes footer to bottom */
            display: flex;
            align-items: center;
        }

        /* Footer with separator line */
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

        .logo-img {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            object-fit: cover;
            background: #faf9fe;
            padding: 6px;
            margin-left: 20px;
        }

        .branding {
            display: flex;
            align-items: center;
        }

        .brand-text {
            font-family: 'JetBrains Mono', monospace;
            font-weight: 700;
            font-size: 22px;
            color: #ef4444;
            letter-spacing: 0.1em;
        }
    </style>
</head>
<body>
<div class="glow"></div>

<div class="og-card">
    <div class="header-row">
        <div class="date">
            {{ $tip->date->format('M d, Y') }}
        </div>
        <div class="tags-container">
            @foreach($tip->tags as $tag)
                <div class="badge">{{ ucwords($tag) }}</div>
            @endforeach
        </div>
    </div>

    <h1 class="title">
        {{ $tip->title }}
    </h1>

    <div class="footer">
        <div class="author-info">
            {{ $tip->author->name }} <span>&middot;</span> {{ $tip->minutes_read_text }}
        </div>

        <div class="branding">
            <span class="brand-text">TIP</span>
            <img src="{{ $logo }}" class="logo-img">
        </div>
    </div>
</div>
</body>
</html>
